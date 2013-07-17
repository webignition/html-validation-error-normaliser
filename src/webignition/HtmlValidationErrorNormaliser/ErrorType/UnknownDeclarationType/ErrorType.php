<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\UnknownDeclarationType;

use webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter\ErrorType as BaseErrorType;

class ErrorType extends BaseErrorType {
    
    const PATTERN = '/unknown declaration type ".+"/';
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