<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter;

use webignition\HtmlValidationErrorNormaliser\ErrorType\ErrorType as BaseErrorType;

class ErrorType extends BaseErrorType {
    
    private $pattern;
    private $placeholderPrefix;
    private $placeholderPostfix;
    
    public function __construct($pattern, $placeholderPrefix, $placeholderPostfix) {
        $this->setPattern($pattern);
        $this->setPlaceholderPrefix($placeholderPrefix);
        $this->setPlaceholderPostfix($placeholderPostfix);
    }

    public function getPattern() {
        return $this->pattern;
    }
    
    public function setPattern($pattern) {
        $this->pattern = $pattern;
    }
    
    public function getPlaceholderPrefix() {
        return $this->placeholderPrefix;
    }
    
    public function setPlaceholderPrefix($placeholderPrefix) {
        $this->placeholderPrefix = $placeholderPrefix;
    }
    
    public function getPlaceholderPostfix() {
        return $this->placeholderPostfix;        
    }  
    
    public function setPlaceholderPostfix($placeholderPostfix) {
        $this->placeholderPostfix = $placeholderPostfix;
    }
  
}