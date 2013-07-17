<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\GeneralEntityNotDefinedAndNoDefaultEntity;

use webignition\HtmlValidationErrorNormaliser\ErrorType\Normaliser as AbstractNormaliser;
use webignition\HtmlValidationErrorNormaliser\ErrorType\GeneralEntityNotDefinedAndNoDefaultEntity\ErrorType as TargetErrorType;

class Normaliser extends AbstractNormaliser {
    
    /**
     *
     * @var string
     */
    private $normalForm = null;
    
    /**
     *
     * @var array
     */
    private $parameters = null;
   
    protected function getNormalForm() {
        if (is_null($this->normalForm)) {
            $this->performNormalisation();
        }
        
        return $this->normalForm;
    }

    protected function getParameters() {
        if (is_null($this->parameters)) {
            $this->performNormalisation();
        }
        
        return $this->parameters;        
    }

    protected function isCorrectErrorType() {
        return $this->errorType instanceof TargetErrorType;      
    }  
    
    private function performNormalisation() {        
        $parameter = str_replace(array(
            $this->errorType->getPlaceholderPrefix(),
            $this->errorType->getPlaceholderPostfix()
        ), '', $this->htmlErrorString);
        
        $this->normalForm = $this->errorType->getPlaceholderPrefix() . '%0' . $this->errorType->getPlaceholderPostfix();
        $this->parameters = array(
            $parameter
        );       
    }
}