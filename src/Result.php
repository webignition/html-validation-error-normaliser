<?php

namespace webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\ErrorType\ErrorType;
use webignition\HtmlValidationErrorNormaliser\ErrorType\Normaliser;


/**
 * Models the result of trying to normalise a HTML validation error
 */
class Result {    
    
    /**
     * Original HTML validation error unnormalised
     * 
     * @var string
     */
    private $rawError;
    
   
    /**
     *
     * @var NormalisedError 
     */
    private $normalisedError;
    
    
    /**
     * 
     * @return boolean
     */
    public function isNormalised() {
        return !is_null($this->normalisedError);
    }
    
    
    /**
     * 
     * @param string $rawError
     */
    public function setRawError($rawError) {
        $this->rawError = $rawError;
    }
    
    
    /**
     * 
     * @return string
     */
    public function getRawError() {
        return $this->rawError;
    }
    
    
    /**
     * 
     * @param \webignition\HtmlValidationErrorNormaliser\NormalisedError $normalisedError
     */
    public function setNormalisedError(NormalisedError $normalisedError) {
        $this->normalisedError = $normalisedError;
    }
    
    /**
     * 
     * @return NormalisedError
     */
    public function getNormalisedError() {
        return $this->normalisedError;
    }
    
}