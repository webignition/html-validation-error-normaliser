<?php

namespace webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;

/**
 * Take a raw HTML validation error and return a normal form
 * 
 * W3C html error reference: http://validator.w3.org/docs/errors.html
 */
class HtmlValidationErrorNormaliser {   
    
    
    /**
     * 
     * @param string $htmlErrorString
     * @return array
     */
    public function normalise($htmlErrorString) {        
        $result = new Result();
        $result->setRawError($htmlErrorString);       
        
        $patternBasedNormaliser = new PatternBasedNormaliser();
        if (($normalisedError = $patternBasedNormaliser->normalise($htmlErrorString)) !== false) {                        
            $result->setNormalisedError($normalisedError);               
            return $result;            
        }
        
        if (($normalisedError = $this->getQuotedParameterNormalisedError($htmlErrorString)) !== false) {            
            $result->setNormalisedError($normalisedError);               
            return $result;               
        }         
        
        return $result;
    }
    
    
    private function getQuotedParameterNormalisedError($htmlErrorString) {        
        $parameterMatches = array();
        $matchCount = preg_match_all('/"([^"]?)+"/', $htmlErrorString, $parameterMatches);
        
        if ($matchCount === 0) {
            return false;
        }

        $normalisedError = new NormalisedError();
        $normalisedErrorString = $htmlErrorString;        

        foreach ($parameterMatches[0] as $parameterIndex => $parameterMatch) {          
            $normalisedErrorString = preg_replace('/'.$this->preg_quote($parameterMatch).'/', '"%'.$parameterIndex.'"', $normalisedErrorString, 1);
            $normalisedError->addParameter(trim($parameterMatch, '"'));
        }
        
        $normalisedError->setNormalForm($normalisedErrorString);
        
        return $normalisedError;
    }
    
    private function preg_quote($value) {
        $escapedValue = preg_quote($value);
        if (substr_count($escapedValue, '/') && !substr_count($escapedValue, '\/')) {
            $escapedValue = str_replace('/', '\/', $escapedValue);
        }
        
        return $escapedValue;
    }
    
    
    
}