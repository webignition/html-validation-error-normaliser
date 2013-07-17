<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\GeneralEntityNotDefinedAndNoDefaultEntity;

use webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter\Normaliser as BaseNormaliser;
use webignition\HtmlValidationErrorNormaliser\ErrorType\GeneralEntityNotDefinedAndNoDefaultEntity\ErrorType as TargetErrorType;

class Normaliser extends BaseNormaliser {

    protected function isCorrectErrorType() {
        return $this->errorType instanceof TargetErrorType;      
    }  

}