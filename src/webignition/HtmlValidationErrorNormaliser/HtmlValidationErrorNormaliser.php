<?php

namespace webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;

/**
 * Take a raw HTML validation error and return a normal form
 * 
 * W3C html error reference: http://validator.w3.org/docs/errors.html
 * // Attribute x not allowed on element meta at this point
 */
class HtmlValidationErrorNormaliser {  
    
    /**
     * 
     * @param string $htmlErrorString
     * @return array
     */
    public function normalise($htmlErrorString) {
        //$htmlErrorString = 'Attribute x not allowed on element meta at this point';
        
        $result = new Result();
        $result->setRawError($htmlErrorString);
        
        if (($normalisedError = $this->getNonQuotedParameterNormalisedError($htmlErrorString)) !== false) {
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
        $matchCount = preg_match_all('/"[^"]+"/', $htmlErrorString, $parameterMatches);
        
        if ($matchCount === 0) {
            return false;
        }        

        $normalisedError = new NormalisedError();
        $normalisedErrorString = $htmlErrorString;

        foreach ($parameterMatches[0] as $parameterIndex => $parameterMatch) {
            $normalisedErrorString = str_replace($parameterMatch, '"%'.$parameterIndex.'"', $normalisedErrorString);            
            $normalisedError->addParameter(trim($parameterMatch, '"'));
        }
        
        $normalisedError->setNormalForm($normalisedErrorString);
        return $normalisedError;
    }
    
    
    private function getNonQuotedParameterNormalisedError($htmlErrorString) {
        if (($normalisedError = $this->getAttributeXNotAllowedOnElementYNormalisedError($htmlErrorString)) !== false) {
            return $normalisedError;             
        }        
        
        return false;
    }
    
    private function getAttributeXNotAllowedOnElementYNormalisedError($htmlErrorString) {
        if (preg_match('/Attribute .+ not allowed on element .+ at this point\./', $htmlErrorString)) {
            $errorParts = explode(' not allowed on element ', $htmlErrorString);
            
            $normalisedError = new NormalisedError();            
            $normalisedError->setNormalForm('Attribute %0 not allowed on element %1 at this point.');
            
            $normalisedError->addParameter(str_replace('Attribute ', '', $errorParts[0]));
            $normalisedError->addParameter(str_replace(' at this point.', '', $errorParts[1]));
            
            return $normalisedError;
        }        
        
        return false;
    }
    
}