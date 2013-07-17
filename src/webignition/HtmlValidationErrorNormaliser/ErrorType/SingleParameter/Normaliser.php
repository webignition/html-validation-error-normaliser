<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter;

use webignition\HtmlValidationErrorNormaliser\ErrorType\Normaliser as AbstractNormaliser;

abstract class Normaliser extends AbstractNormaliser {
    
    /**
     *
     * @var string
     */
    protected $normalForm = null;
    
    /**
     *
     * @var array
     */
    protected $parameters = null;
   
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
    
    protected function performNormalisation() {
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