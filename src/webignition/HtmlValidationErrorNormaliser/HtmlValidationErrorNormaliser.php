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
        if (($normalisedError = $this->getDocumentDoesNotAllowElementXHereMissingOneOfYError($htmlErrorString)) !== false) {            
            return $normalisedError;            
        }     
        
        if (($normalisedError = $this->getValueOfAttributeXCannotBeYMustBeOneOfZError($htmlErrorString)) !== false) {            
            return $normalisedError;            
        };       
        
        $parameterMatches = array();
        $matchCount = preg_match_all('/"([^"]?)+"/', $htmlErrorString, $parameterMatches);
        
        if ($matchCount === 0) {
            return false;
        }        

        $normalisedError = new NormalisedError();
        $normalisedErrorString = $htmlErrorString;

        foreach ($parameterMatches[0] as $parameterIndex => $parameterMatch) {
            $normalisedErrorString = preg_replace('/'.preg_quote($parameterMatch).'/', '"%'.$parameterIndex.'"', $normalisedErrorString, 1);          
            $normalisedError->addParameter(trim($parameterMatch, '"'));
        }
        
        $normalisedError->setNormalForm($normalisedErrorString);
        
        return $normalisedError;
    }    
    
    private function getValueOfAttributeXCannotBeYMustBeOneOfZError($htmlErrorString) {                
        if (preg_match('/value of attribute ".+" cannot be ".+"; must be one of/i', $htmlErrorString)) {            
            $primaryErrorParts = explode('; must be one of ', $htmlErrorString);            
            $errorParts = array_merge(explode(' cannot be ', $primaryErrorParts[0]), array($primaryErrorParts[1]));

            $normalisedError = new NormalisedError();            
            $normalisedError->setNormalForm('value of attribute "%0" cannot be "%1"; must be one of %2');
      
            
            $normalisedError->addParameter(trim(str_replace('value of attribute ', '', $errorParts[0]), '"'));
            $normalisedError->addParameter(trim($errorParts[1], '"'));            
            $normalisedError->addParameter($errorParts[2]);
            
            return $normalisedError;
        }
        
        return false;
    }
    
    
    private function getDocumentDoesNotAllowElementXHereMissingOneOfYError($htmlErrorString) {        
        if (preg_match('/document type does not allow element ".+" here; missing one of/i', $htmlErrorString)) {            
            $errorParts = explode('; missing one of ', $htmlErrorString);
            
            $normalisedError = new NormalisedError();            
            $normalisedError->setNormalForm('Document type does not allow element "%0" here; missing one of %1 start-tag');
            
            $normalisedError->addParameter(str_replace(array(
                'Document type does not allow element "',
                'document type does not allow element "',
                '" here'
            ), '', $errorParts[0]));
            $normalisedError->addParameter(str_replace(' start-tag', '', $errorParts[1]));
            
            return $normalisedError;
        }
        
        return false;
    }    
    
    
    private function getNonQuotedParameterNormalisedError($htmlErrorString) {
        if (($normalisedError = $this->getAttributeXNotAllowedOnElementYNormalisedError($htmlErrorString)) !== false) {
            return $normalisedError;             
        }        
        
        return false;
    }
    
    private function getAttributeXNotAllowedOnElementYNormalisedError($htmlErrorString) {
        if (preg_match('/Attribute .+ not allowed on element .+ at this point\./i', $htmlErrorString)) {
            $errorParts = explode(' not allowed on element ', $htmlErrorString);
            
            $normalisedError = new NormalisedError();            
            $normalisedError->setNormalForm('Attribute %0 not allowed on element %1 at this point.');
            
            $normalisedError->addParameter(str_replace(array('Attribute ', 'attribute '), '', $errorParts[0]));
            $normalisedError->addParameter(str_replace(' at this point.', '', $errorParts[1]));
            
            return $normalisedError;
        }        
        
        return false;
    }
    
}