<?php

namespace webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;

class PatternBasedNormaliser {
    
    private $html5ErrorPatterns = array(
        array(
            'Duplicate ID ',
            '{{ token_0 }}',
            '.'
        ),
        array(
            'Duplicate attribute ',
            '{{ token_0 }}',
            '.'
        ),
        array(
            'Stray end tag ',
            '{{ token_0 }}',
            '.'
        ),        
        array(
            'Attribute ',
            '{{ token_0 }}',
            ' not allowed on element ',
            '{{ token_1 }}',
            ' at this point.'
        ),        
        array(
            'Element ',
            '{{ token_0 }}',
            ' not allowed as child of element ',
            '{{ token_1 }}',
            ' in this context. (Suppressing further errors from this subtree.)'
        ),
        array(
            'character "',
            '{{ token_0 }}"',
            '" is not allowed in the value of attribute "',
            '{{ token_1 }}',
            '"'
        ),
        array(
            'ID "',
            '{{ token_0 }}"',
            '" already defined'
        ),
        array(
            'document type does not allow element "',
            '{{ token_0 }}"',
            '" here; missing one of ',
            '{{ token_1 }}',
            ' start-tag'
        ),
        array(
            'value of attribute "',
            '{{ token_0 }}',
            '" cannot be "',
            '{{ token_1 }}',
            '"; must be one of ',
            '{{ token_2 }}'
        ),
        array(
            'Bad value ',
            '{{ token_0 }}',
            ' for attribute ',
            '{{ token_1 }}',
            ' on element ',
            '{{ token_2 }}',
            ': ',
            '{{ token_3 }}'
        ),   
        array(
            'No ',
            '{{ token_0 }}',
            ' element in scope but a ',
            '{{ token_1 }}',
            ' end tag seen.'
        ), 
        array(
            'Element ',
            '{{ token_0 }}',
            ' must not have attribute ',
            '{{ token_1 }}',
            ' unless attribute ',
            '{{ token_2 }}',
            ' is also specified.'
        ),        
    );
    
    
    /**
     * 
     * @param string $htmlErrorString
     * @return NormalisedError
     */
    public function normalise($htmlErrorString) {
        foreach ($this->html5ErrorPatterns as $pattern) {
            if (($normalisedError = $this->getFromHtml5Pattern($htmlErrorString, $pattern)) !== false) {
                return $normalisedError;             
            }
        }
        
        return false;
    }
    
    private function getFromHtml5Pattern($htmlErrorString, $pattern) {                
        if ($this->matches($htmlErrorString, $pattern)) {            
            $matches = array();
            
            if (preg_match_all($this->getRegexPatternFromHtmlErrorPattern($pattern), $htmlErrorString, $matches) === 0) {
                return false;
            }
            
            foreach ($matches[0] as $matchString) {
                $parameters = $this->getParametersFromMatchString($matchString, $pattern);
            }
            
            $normalisedError = new NormalisedError();
            $normalisedError->setNormalForm($this->getNormalForm($pattern));
            foreach ($parameters as $parameter) {
                $normalisedError->addParameter($parameter);
            } 
            
            return $normalisedError;
        }   

        return false;
    }
    
    
    private function getNormalForm($pattern) {
        $normalForm = '';
        $parameterIndex = 0;
        
        foreach ($pattern as $part) {
            if ($this->isTokenPatternPart($part)) {
                $normalForm .= '%' . $parameterIndex;
                $parameterIndex++;
            } else {
                $normalForm .= $part;
            }
        }
        
        return $normalForm;
    }
    
    private function getParametersFromMatchString($matchString, $pattern) {        
        $modifiedMatchString = $matchString;
        $parameters = array();
        
        $patternTokenCount = $this->getPatternTokenCount($pattern);
        $patternPartCount = count($pattern);
        
        foreach ($pattern as $partIndex => $part) {            
            if ($this->isTokenPatternPart($part)) {
                if ($partIndex == $patternPartCount - 1 && count($parameters) < $patternTokenCount) {
                    $parameters[] = $modifiedMatchString;
                }
            } else {
                $tokenSeparatedParts = explode($part, $modifiedMatchString);
                
                if (count($tokenSeparatedParts) === 1) {                    
                    return $parameters;
                }                
                
                if ($tokenSeparatedParts[0] !== '') {
                    $parameters[] = $tokenSeparatedParts[0];
                }
                
                $modifiedMatchString = $tokenSeparatedParts[1];                
            }
        }
        
        return $parameters;
    }
    
    private function getPatternTokenCount($pattern) {
        $tokenCount = 0;
        
        foreach ($pattern as $part) {
            if ($this->isTokenPatternPart($part)) {
                $tokenCount++;
            }
        }
        
        return $tokenCount;
    }
    
    private function matches($htmlErrorString, $pattern) {        
        return preg_match($this->getRegexPatternFromHtmlErrorPattern($pattern), $htmlErrorString) > 0;
    }
    
    
    private function getRegexPatternFromHtmlErrorPattern($pattern) {
        $regexPattern = '';
        
        foreach ($pattern as $part) {
            if ($this->isTokenPatternPart($part)) {
                $regexPattern .= '.+';
            } else {
                $regexPattern .= $this->preg_quote($part);
            }
        }
        
        return '/' . $regexPattern . '/i';
    }
    
    
    private function preg_quote($value) {
        $escapedValue = preg_quote($value);
        if (substr_count($escapedValue, '/') && !substr_count($escapedValue, '\/')) {
            $escapedValue = str_replace('/', '\/', $escapedValue);
        }
        
        return $escapedValue;
    }    
    
    private function isTokenPatternPart($part) {
        return preg_match('/{{ token_[0-9]+ }}/', $part) > 0;
    }    
    
}