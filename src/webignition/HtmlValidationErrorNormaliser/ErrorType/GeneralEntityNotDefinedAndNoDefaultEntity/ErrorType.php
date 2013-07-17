<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\GeneralEntityNotDefinedAndNoDefaultEntity;

use webignition\HtmlValidationErrorNormaliser\ErrorType\ErrorType as AbstractErrorType;

class ErrorType extends AbstractErrorType {
    
    const PATTERN = '/general entity "[a-z0-9]+" not defined and no default entity/';
    const PLACEHOLDER_PREFIX = 'general entity "';
    CONST PLACEHOLDER_POSTFIX = '" not defined and no default entity';
    
    
    /**
     * 
     * @return string
     */
    public function getPattern() {
        return self::PATTERN;
    }    
}