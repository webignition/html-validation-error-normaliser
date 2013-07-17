<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType;

abstract class ErrorType {
    
    
    /**
     * 
     * @return string
     */    
    abstract public function getPattern();
    
    
    /**
     * 
     * @return boolean
     */    
    public function is($htmlErrorString) {
       return preg_match($this->getPattern(), $htmlErrorString) > 0;
    }
    
    
}