<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\GeneralEntityNotDefinedAndNoDefaultEntity;

use webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter\ErrorType as BaseErrorType;

class ErrorType extends BaseErrorType {
    
    const PATTERN = '/general entity "[a-z0-9]+" not defined and no default entity/';
    const PLACEHOLDER_PREFIX = 'general entity "';
    CONST PLACEHOLDER_POSTFIX = '" not defined and no default entity';
    
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