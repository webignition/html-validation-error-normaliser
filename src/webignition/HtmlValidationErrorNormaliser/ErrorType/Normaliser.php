<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;

abstract class Normaliser {
    
    /**
     *
     * @var string
     */
    protected $htmlErrorString;
    
    /**
     *
     * @var \webignition\HtmlValidationErrorNormaliser\ErrorType\ErrorType 
     */
    protected $errorType;
    
    abstract protected function getNormalForm();
    abstract protected function getParameters();
    abstract protected function isCorrectErrorType();    
    
    /**
     * 
     * @param string $htmlErrorString
     * @param \webignition\HtmlValidationErrorNormaliser\ErrorType\ErrorType $errorType
     * @return null|\webignition\HtmlValidationErrorNormaliser\NormalisedError
     */
    public function normalise($htmlErrorString, ErrorType $errorType) {
        $this->htmlErrorString = $htmlErrorString;
        $this->errorType = $errorType;
        
        if (!$this->isCorrectErrorType()) {
            return null;
        }
        
        $normalisedError = new NormalisedError();
        $normalisedError->setNormalForm($this->getNormalForm());
        
        $parameters = $this->getParameters();
        foreach ($parameters as $parameter) {
            $normalisedError->addParameter($parameter);
        }
        
        return $normalisedError;
    }
    
}