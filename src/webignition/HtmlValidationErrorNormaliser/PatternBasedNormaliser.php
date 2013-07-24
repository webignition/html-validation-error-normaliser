<?php

namespace webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;

class PatternBasedNormaliser {
    
    private $html5ErrorPatterns = array(
        array(
            'Attribute ',
            '{{token_0}}',
            ' not allowed on element ',
            '{{token_1}}',
            ' at this point.'
        ), 
        array(
            'document type does not allow element "',
            '{{token_0}}"',
            '" here; missing one of ',
            '{{token_1}}',
            ' start-tag'
        ),        
        array(
            'Element ',
            '{{token_0}}',
            ' not allowed as child of element ',
            '{{token_1}}',
            ' in this context. (Suppressing further errors from this subtree.)'
        ), 
        array(
            'Bad value ',
            '{{token_0}}',
            ' for attribute ',
            '{{token_1}}',
            ' on element ',
            '{{token_2}}',
            ': ',
            '{{token_3}}'
        ),   
        array(
            'Bad value ',
            '{{blank_token_0}}',
            ' for attribute ',
            '{{token_1}}',
            ' on element ',
            '{{token_2}}',
            ': ',
            '{{token_3}}'
        ),
        array(
            'ID "',
            '{{token_0}}"',
            '" already defined'
        ),        
        array(
            'The ',
            '{{token_0}}',
            ' attribute on the ',
            '{{token_1}}',
            ' element is obsolete. Use CSS instead.'
        ),
        array(
            'No ',
            '{{token_0}}',
            ' element in scope but a ',
            '{{token_1}}',
            ' end tag seen.'
        ),         
        
        
        array(
            'Duplicate ID ',
            '{{token_0}}',
            '.'
        ),
        array(
            'Duplicate ID ',
            '{{blank_token_0}}',
            '.'
        ),        
        array(
            'Duplicate attribute ',
            '{{token_0}}',
            '.'
        ),
        array(
            'Stray end tag ',
            '{{token_0}}',
            '.'
        ),             
        array(
            'character "',
            '{{token_0}}"',
            '" is not allowed in the value of attribute "',
            '{{token_1}}',
            '"'
        ),
        array(
            'value of attribute "',
            '{{token_0}}',
            '" cannot be "',
            '{{token_1}}',
            '"; must be one of ',
            '{{token_2}}'
        ),
        array(
            'value of attribute "',
            '{{token_0}}',
            '" cannot be "',
            '{{blank_token_1}}',
            '"; must be one of ',
            '{{token_2}}'
        ),        
        array(
            'Bad value ',
            '{{token_0}}',
            ' for attribute ',
            '{{token_1}}',
            ' on element ',
            '{{token_2}}',
            '.'
        ),         
        array(
            'Element ',
            '{{token_0}}',
            ' must not have attribute ',
            '{{token_1}}',
            ' unless attribute ',
            '{{token_2}}',
            ' is also specified.'
        ),                
        array(
            'The ',
            '{{token_0}}',
            ' element is obsolete. Use CSS instead.',
        ),         
        array(
            'Element ',
            '{{token_0}}',
            ' is missing required attribute ',
            '{{token_1}}',
            '.'
        ),            
        array(
            'Unclosed element ',
            '{{token_0}}',
            '.'
        ),         
        array(
            'End tag ',
            '{{token_0}}',
            ' seen, but there were open elements.'
        ),          
        array(
            'End tag for  ',
            '{{token_0}}',
            ' seen, but there were unclosed elements.'
        ),        
        array(
            'An ',
            '{{token_0}}',
            ' start tag seen but an element of the same type was already open.'
        ),  
        array(
            'Bad value ',
            '{{token_0}}',
            ' for attribute ',
            '{{token_1}}',
            ' on XHTML element ',
            '{{token_2}}',
            ': ',
            '{{token_3}}'
        ),
        array(
            'Bad value ',
            '{{token_0}}',
            ' for attribute ',
            '{{token_1}}',
            ' on XHTML element ',
            '{{token_2}}',
            '.'       
        ),
        array(
            'Element ',
            '{{token_0}}',
            ' is missing a required instance of child element ',
            '{{token_1}}',
            '.'
        ), 
        array(
            'XHTML element ',
            '{{token_0}}',
            ' not allowed as child of XHTML element ',
            '{{token_1}}',
            ' in this context. (Suppressing further errors from this subtree.)'            
        ),
        array(
            'End tag ',
            '{{token_0}}',
            '.'       
        ),
        array(
            'Attribute ',
            '{{token_0}}',
            ' not allowed here.'
        ),
        array(
            'Stray start tag ',
            '{{token_0}}',
            '.'
        ),
        array(
            'Couldn\'t find end of Start Tag ',
            '{{token_0}}',
            ' line ',
            '{{token_1}}',
        ),
        array(
            'Opening and ending tag mismatch: ',
            '{{token_0}}',
            ' line ',
            '{{token_1}}',
            ' and ',
            '{{token_2}}',
        ),
        array(
            'Forbidden code point ',
            '{{token_0}}',
            '.'
        ),
        array(
            'non SGML character number ',
            '{{token_0}}'
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
    
    private function getMatchStringParameterIndices($matchString, $pattern) {
        $indices = array();
        
        foreach ($pattern as $part) {
            if (!$this->isTokenPatternPart($part)) {
                $offset = 0;
                
                foreach ($indices as $currentIndex) {
                    if ($currentIndex['prefix'] == $part || substr_count($currentIndex['prefix'], $part) || substr_count($part, $currentIndex['prefix'])) {
                        $offset = $currentIndex['index'];
                    }
                }
                
                $indices[] = array(
                    'prefix' => $part,
                    'index' => strpos($matchString, $part, $offset) + strlen($part)
                );
            }
        }
        
        return $indices;
    }
    
    private function getParametersFromMatchString($matchString, $pattern) {        
        $parameterIndices = $this->getMatchStringParameterIndices($matchString, $pattern);
        
        foreach ($parameterIndices as $position => $parameterIndex) {            
            $start = $parameterIndex['index'];
            
            if (isset($parameterIndices[$position + 1])) {
                $length = $parameterIndices[$position + 1]['index'] - $start - strlen($parameterIndices[$position + 1]['prefix']);
                
                $parameters[] = substr($matchString, $start, $length);
            } else {
                $parameter = substr($matchString, $start);
                if ($parameter !== false) {
                    $parameters[] = $parameter;
                }
            }
            
        }
        
        return $parameters;
    }
    
    private function matches($htmlErrorString, $pattern) {        
        return preg_match($this->getRegexPatternFromHtmlErrorPattern($pattern), $htmlErrorString) > 0;
    }
    
    
    private function getRegexPatternFromHtmlErrorPattern($pattern) {
        $regexPattern = '';
        
        foreach ($pattern as $part) {
            if ($this->isTokenPatternPart($part)) {
                if ($this->isFilledTokenPatternPart($part)) {
                    $regexPattern .= '.+';
                } else {
                    $regexPattern .= '';
                }                
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
    
    
    private function isBlankTokenPatternPart($part) {
        return preg_match('/{{blank_token_[0-9]+}}/', $part) > 0;
    }     
    
    private function isFilledTokenPatternPart($part) {
        return preg_match('/{{token_[0-9]+}}/', $part) > 0;
    }    
    
    private function isTokenPatternPart($part) {
        return preg_match('/{{(blank_token|token)_[0-9]+}}/', $part) > 0;
    }        
    
}