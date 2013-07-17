<?php

namespace webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\ErrorHandler\ErrorHandler;
//use webignition\HtmlValidationErrorNormaliser\ErrorType\Normaliser;


/**
 * Take a raw HTML validation error and return a normal form
 * 
 * e.g. normalise('reference to entity "order" for which no system identifier could be generated') 
 *      returns array(
 *          'normal-form' => 'reference to entity "%0" for which no system identifier could be generated'
 *          'parameters' => array(
 *              'order'
             )
 *      )
 * 
 * W3C html error reference: http://validator.w3.org/docs/errors.html
 */
class HtmlValidationErrorNormaliser {
    
    /**
     *
     * @var array
     */
    private $errorHandlers = array();
    
    
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