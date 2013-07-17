<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorHandler;

use webignition\HtmlValidationErrorNormaliser\ErrorType\ErrorType;
use webignition\HtmlValidationErrorNormaliser\ErrorType\Normaliser;

class ErrorHandler  {
    
    
    /**
     *
     * @var ErrorType
     */
    private $errorType;
    
    /**
     *
     * @var Normaliser
     */
    private $normaliser;

    public function __construct(ErrorType $errorType, Normaliser $normaliser) {
        $this->errorType = $errorType;
        $this->normaliser = $normaliser;
    }
    
    public function getErrorType() {
        return $this->errorType;
    }
    
    public function getNormaliser() {
        return $this->normaliser;
    }
}