<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\DocumentTypeDoesNotAllowElementHereMissingOneOf;

use webignition\HtmlValidationErrorNormaliser\ErrorType\ErrorType as BaseErrorType;

class ErrorType extends BaseErrorType {
    
    const PATTERN = '/document type does not allow element ".+" here; missing one of ".+" start-tag/';

    public function getPattern() {
        return self::PATTERN;
    }    
}