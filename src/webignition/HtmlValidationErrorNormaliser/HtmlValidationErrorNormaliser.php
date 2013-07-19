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
        if (($normalisedError = $this->getCharacterXIsNotAllowedInTheValueOfAttributeY($htmlErrorString)) !== false) {            
            return $normalisedError;            
        }        
        
        if (($normalisedError = $this->getIdAlreadyDefinedError($htmlErrorString)) !== false) {            
            return $normalisedError;            
        }            
        
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
    
    private function getIdAlreadyDefinedError($htmlErrorString) {                        
        if (preg_match('/ID .+ already defined/i', $htmlErrorString)) {
            $normalisedError = new NormalisedError();            
            $normalisedError->setNormalForm('ID "%0" already defined');            
            $normalisedError->addParameter(str_replace(array(
                'ID "',
                '" already defined'
            ), '', $htmlErrorString));
            
            return $normalisedError;
        }
        
        return false;
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
    
    private function getCharacterXIsNotAllowedInTheValueOfAttributeY($htmlErrorString) {        
        if (preg_match('/character ".+" is not allowed in the value of attribute ".+"/i', $htmlErrorString)) {                        
            $errorParts = explode(' is not allowed in the value of attribute ', $htmlErrorString);


            $normalisedError = new NormalisedError();            
            $normalisedError->setNormalForm('character "%0" is not allowed in the value of attribute "%1"');
            
            if (substr_count($errorParts[0], '"""')) {
                $normalisedError->addParameter('"');
            } else {
                $normalisedError->addParameter(trim(str_replace('character ', '', $errorParts[0]), '"'));
            }
            
            $normalisedError->addParameter(trim($errorParts[1], '"'));
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
        if (($normalisedError = $this->getDuplicatePropertyX($htmlErrorString)) !== false) {
            return $normalisedError;             
        }         
        
        if (($normalisedError = $this->getStrayEndTagError($htmlErrorString)) !== false) {
            return $normalisedError;             
        }          
        
        if (($normalisedError = $this->getAttributeXNotAllowedOnElementYNormalisedError($htmlErrorString)) !== false) {
            return $normalisedError;             
        }        
        
        if (($normalisedError = $this->getElementXNotAllowedAsChildOfElementYInThisContextError($htmlErrorString)) !== false) {
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
    
    private function getElementXNotAllowedAsChildOfElementYInThisContextError($htmlErrorString) {
        if (preg_match('/Element .+ not allowed as child of element .+ in this context\./i', $htmlErrorString)) {
            $errorParts = explode(' not allowed as child of element ', $htmlErrorString);
            
            $parameter0Parts = explode(' ', $errorParts[0], 2);
            $parameter1Parts = explode(' ', $errorParts[1], 2);
            
            $normalisedError = new NormalisedError();            
            $normalisedError->setNormalForm('Element %0 not allowed as child of element %1 in this context. (Suppressing further errors from this subtree.)');
            
            $normalisedError->addParameter($parameter0Parts[1]);
            $normalisedError->addParameter($parameter1Parts[0]);
            
            return $normalisedError;
        }        
        
        return false;        
    }
    
    private function getStrayEndTagError($htmlErrorString) {
        $identifier = 'Stray end tag ';
        $prefix = 'Stray end tag ';
        $suffix = '.';
        
        if (substr($htmlErrorString, 0, strlen($identifier)) !== $identifier) {
            return false;
        }
        
        $parameter = str_replace(array(
            $prefix,
            $suffix
        ), '', $htmlErrorString);
        
        $normalisedError = new NormalisedError();            
        $normalisedError->setNormalForm($prefix . '%0' . $suffix);

        $normalisedError->addParameter($parameter);
        return $normalisedError;
    }
    
    
    private function getDuplicatePropertyX($htmlErrorString) {
        $parts = explode(' ', $htmlErrorString);
        if (count($parts) !== 3) {
            return false;
        }
        
        if ($parts[0] !== 'Duplicate') {
            return false;
        }
        
        $normalisedError = new NormalisedError();            
        $normalisedError->setNormalForm('Duplicate '. $parts[1] .' %0.');

        $normalisedError->addParameter(trim($parts[2], '.'));
        
        return $normalisedError;
    }

    
    // Unclosed element div.
    // Unclosed element %0
    // 
    // 
    // End tag h3 seen, but there were open elements
    // End tag %0 seen, but there were open elements
    // 
    // 
    // Bad value 100% for attribute width on element img: Expected a digit but saw % instead.
    // Bad value %0 for attribute %1 on element %2: %3
    //
    
    
}