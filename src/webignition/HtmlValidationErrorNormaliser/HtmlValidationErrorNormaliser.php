<?php

namespace webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\ErrorType\ErrorType;
use webignition\HtmlValidationErrorNormaliser\ErrorType\Normaliser;


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
    private $errorTypes = array();
    
    
    /**
     * 
     * @param string $errorType
     */
    public function addErrorType($errorType) {
        $this->errorTypes[] = $errorType;
    }
    
    
    /**
     * 
     * @param string $htmlErrorString
     * @return array
     */
    public function normalise($htmlErrorString) {
        $htmlErrorString;
        
        foreach ($this->errorTypes as $errorTypeName) {
            /* @var $errorType Error */
            $errorClassName = $errorTypeName . '\ErrorType';            
            $errorType = new $errorClassName;
            if ($errorType->is($htmlErrorString)) {                
                $normaliserClassName = $errorTypeName . '\Normaliser';
                $normaliser = new $normaliserClassName;
                return $normaliser->normalise($htmlErrorString, $errorType);
            }
        } 
        
        return array(
            'normal-form' => $htmlErrorString
        );
    }
    
}