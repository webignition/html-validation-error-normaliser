<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\DocumentTypeDoesNotAllowElementHere;

use webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter\Normaliser as BaseNormaliser;
use webignition\HtmlValidationErrorNormaliser\ErrorType\DocumentTypeDoesNotAllowElementHere\ErrorType as TargetErrorType;

class Normaliser extends BaseNormaliser {

    protected function isCorrectErrorType() {
        return $this->errorType instanceof TargetErrorType;      
    }      

}