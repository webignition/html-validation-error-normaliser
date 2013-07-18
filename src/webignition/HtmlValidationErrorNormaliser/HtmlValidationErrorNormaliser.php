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
        
        $parameterMatches = array();
        $matchCount = preg_match_all('/"[^"]+"/', $htmlErrorString, $parameterMatches);
        
        if ($matchCount === 0) {
            return $result;
        }
        
        $normalisedError = new NormalisedError();
        $normalisedErrorString = $htmlErrorString;

        foreach ($parameterMatches[0] as $parameterIndex => $parameterMatch) {
            $normalisedErrorString = str_replace($parameterMatch, '"%'.$parameterIndex.'"', $normalisedErrorString);            
            $normalisedError->addParameter(trim($parameterMatch, '"'));
        }
        
        $normalisedError->setNormalForm($normalisedErrorString);
        $result->setNormalisedError($normalisedError);               
        return $result;
    }
    
}