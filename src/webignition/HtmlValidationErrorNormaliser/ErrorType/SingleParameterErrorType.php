<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType;


abstract class SingleParameterErrorType extends ErrorType {
    
    abstract protected function getPlaceholderPrefix();
    abstract protected function getPlaceholderPostfix();
    
}