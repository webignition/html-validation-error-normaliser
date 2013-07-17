<?php

namespace webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\ErrorHandler\ErrorHandler;
use webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter\ErrorType as SingleParameterErrorType;
use webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter\Normaliser as SingleParameterNormaliser;
use webignition\HtmlValidationErrorNormaliser\ErrorType\DocumentTypeDoesNotAllowElementHereMissingOneOf\ErrorType as DocumentTypeDoesNotAllowElementHereMissingOneOfErrorType;
use webignition\HtmlValidationErrorNormaliser\ErrorType\DocumentTypeDoesNotAllowElementHereMissingOneOf\Normaliser as DocumentTypeDoesNotAllowElementHereMissingOneOfNormaliser;

/**
 * Take a raw HTML validation error and return a normal form
 * 
 * W3C html error reference: http://validator.w3.org/docs/errors.html
 */
class HtmlValidationErrorNormaliser {    
    
    /**
     *
     * @var array
     */
    private $errorHandlers = array();
    
    
    public function __construct() {
        $this->addErrorHandler(new ErrorHandler(new SingleParameterErrorType(
            '/general entity "[a-z0-9]+" not defined and no default entity/',
            'general entity "',
            '" not defined and no default entity'
        ), new SingleParameterNormaliser()));
        
        $this->addErrorHandler(new ErrorHandler(new SingleParameterErrorType(
            '/unknown declaration type ".+"/',
            'unknown declaration type "',
            '"'
        ), new SingleParameterNormaliser()));        
        
        $this->addErrorHandler(new ErrorHandler(new SingleParameterErrorType(
            '/document type does not allow element ".+" here$/',
            'document type does not allow element "',
            '" here'
        ), new SingleParameterNormaliser()));            
        
        $this->addErrorHandler(new ErrorHandler(new SingleParameterErrorType(
            '/end tag for ".+" omitted, but its declaration does not permit this/',
            'end tag for "',
            '" omitted, but its declaration does not permit this'
        ), new SingleParameterNormaliser()));    
        
        // end tag for "FONT" omitted, but its declaration does not permit this
        
// end tag for X omitted, but its declaration does not permit this        
        
        $this->addErrorHandler(new ErrorHandler(
            new DocumentTypeDoesNotAllowElementHereMissingOneOfErrorType,
            new DocumentTypeDoesNotAllowElementHereMissingOneOfNormaliser
        ));           
    }
    
    /**
     * 
     * @param ErrorHandler $errorHandler
     */
    public function addErrorHandler(ErrorHandler $errorHandler) {
        $this->errorHandlers[] = $errorHandler;
    }
    
    
    /**
     * 
     * @param string $htmlErrorString
     * @return array
     */
    public function normalise($htmlErrorString) {
        $result = new Result();
        $result->setRawError($htmlErrorString);
        
        foreach ($this->errorHandlers as $errorHandler) {
            /* @var $errorHandler ErrorHandler */            
            if ($errorHandler->getErrorType()->is($htmlErrorString)) {
                $normalisedError = $errorHandler->getNormaliser()->normalise($htmlErrorString, $errorHandler->getErrorType());
                $result->setNormalisedError($normalisedError);               
                return $result;
            }
        }

        return $result;
    }
    
}