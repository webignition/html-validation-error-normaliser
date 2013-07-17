<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\UnknownDeclarationType;

use webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameterErrorType;

class ErrorType extends SingleParameterErrorType {
    
    const PATTERN = '/unknown declaration type "[a-z0-9]+"/';
    const PLACEHOLDER_PREFIX = 'unknown declaration type "';
    CONST PLACEHOLDER_POSTFIX = '"';
    
    public function getPlaceholderPrefix() {
        return self::PLACEHOLDER_PREFIX;
    }  
    
    public function getPlaceholderPostfix() {
        return self::PLACEHOLDER_POSTFIX;
    }    
    
    /**
     * 
     * @return string
     */
    public function getPattern() {
        return self::PATTERN;
    }

  
}