<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter;

use webignition\HtmlValidationErrorNormaliser\ErrorType\ErrorType as BaseErrorType;

abstract class ErrorType extends BaseErrorType {
    
    abstract protected function getPlaceholderPrefix();
    abstract protected function getPlaceholderPostfix();   
    
}