<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType;

abstract class Normaliser {
    
    
    abstract public function normalise($htmlErrorString, ErrorType $errorType);
    
}