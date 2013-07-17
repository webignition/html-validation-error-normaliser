<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\UnknownDeclarationType;

use webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter\Normaliser as BaseNormaliser;
use webignition\HtmlValidationErrorNormaliser\ErrorType\UnknownDeclarationType\ErrorType as TargetErrorType;

class Normaliser extends BaseNormaliser {

    protected function isCorrectErrorType() {
        return $this->errorType instanceof TargetErrorType;      
    }      

}