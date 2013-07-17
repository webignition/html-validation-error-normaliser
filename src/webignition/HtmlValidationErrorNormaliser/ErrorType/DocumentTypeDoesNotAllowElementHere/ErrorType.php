<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\DocumentTypeDoesNotAllowElementHere;

use webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter\ErrorType as BaseErrorType;

class ErrorType extends BaseErrorType {
    
    const PATTERN = '/document type does not allow element ".+" here$/';
    const PLACEHOLDER_PREFIX = 'document type does not allow element "';
    CONST PLACEHOLDER_POSTFIX = '" here';
    
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