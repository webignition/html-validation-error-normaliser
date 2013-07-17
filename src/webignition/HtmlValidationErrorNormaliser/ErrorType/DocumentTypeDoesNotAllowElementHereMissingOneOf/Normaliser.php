<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\DocumentTypeDoesNotAllowElementHereMissingOneOf;

use webignition\HtmlValidationErrorNormaliser\ErrorType\Normaliser as AbstractNormaliser;
use webignition\HtmlValidationErrorNormaliser\ErrorType\ErrorType as TargetErrorType;

class Normaliser extends AbstractNormaliser {
    
    const PART_0_PLACEHOLDER_PREFIX = 'document type does not allow element "';
    const PART_0_PLACEHOLDER_POSTFIX = '" here';
    const PART_1_PLACEHOLDER_PREFIX = 'missing one of ';
    const PART_1_PLACEHOLDER_POSTFIX = ' start-tag';    
    
    /**
     *
     * @var string
     */
    protected $normalForm = null;
    
    /**
     *
     * @var array
     */
    protected $parameters = null;
   
    protected function getNormalForm() {
        if (is_null($this->normalForm)) {
            $this->performNormalisation();
        }
        
        return $this->normalForm;
    }

    protected function getParameters() {
        if (is_null($this->parameters)) {
            $this->performNormalisation();
        }
        
        return $this->parameters;        
    }
    
    protected function performNormalisation() {
        $parts = explode('; ', $this->htmlErrorString);
        
        $this->parameters[] = str_replace(array(
            self::PART_0_PLACEHOLDER_PREFIX,
            self::PART_0_PLACEHOLDER_POSTFIX
        ), '', $parts[0]);
        
        $this->parameters = array_merge($this->parameters, $this->getPart1Parameters($parts[1]));        
        $this->normalForm = self::PART_0_PLACEHOLDER_PREFIX . '%0' . self::PART_0_PLACEHOLDER_POSTFIX . '; ' .self::PART_1_PLACEHOLDER_PREFIX . implode(', ', $this->getNormalFormPart1ParameterPlaceholders()) . self::PART_1_PLACEHOLDER_POSTFIX;     
    }
    
    
    private function getNormalFormPart1ParameterPlaceholders() {
        $placeholders = array();
        
        $part1parameters = array_slice($this->parameters, 1);
        for ($placeholderIndex = 0; $placeholderIndex < count($part1parameters); $placeholderIndex++) {
            $placeholders[] = '"%' . ($placeholderIndex + 1) . '"';
        }
        
        return $placeholders;
    }
    
    private function getPart1Parameters($part1) {
        $part1ParameterString = str_replace(array(
            self::PART_1_PLACEHOLDER_PREFIX,
            self::PART_1_PLACEHOLDER_POSTFIX
        ), '', $part1);
        
        $part1parameterParts = explode(',', $part1ParameterString);        
        
        $parameters = array();
        
        foreach ($part1parameterParts as $parameterPart) {
            $parameters[] = str_replace('"', '', trim($parameterPart));
        }
        
        return $parameters;
    }

    
    /**
     * 
     * @return boolean
     */
    protected function isCorrectErrorType() {
        return $this->errorType instanceof TargetErrorType;
    }    
}