<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\HtmlValidationErrorNormaliser;
use webignition\HtmlValidationErrorNormaliser\ErrorHandler\ErrorHandler;
use webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter\ErrorType as SingleParameterErrorType;
use webignition\HtmlValidationErrorNormaliser\ErrorType\SingleParameter\Normaliser as SingleParameterNormaliser;
use webignition\HtmlValidationErrorNormaliser\ErrorType\DocumentTypeDoesNotAllowElementHereMissingOneOf\ErrorType as DocumentTypeDoesNotAllowElementHereMissingOneOfErrorType;
use webignition\HtmlValidationErrorNormaliser\ErrorType\DocumentTypeDoesNotAllowElementHereMissingOneOf\Normaliser as DocumentTypeDoesNotAllowElementHereMissingOneOfNormaliser;

abstract class BaseTest extends \PHPUnit_Framework_TestCase {    

    protected function getNormaliser() {
        $normaliser = new HtmlValidationErrorNormaliser();
        
        $normaliser->addErrorHandler(new ErrorHandler(new SingleParameterErrorType(
            '/general entity "[a-z0-9]+" not defined and no default entity/',
            'general entity "',
            '" not defined and no default entity'
        ), new SingleParameterNormaliser()));
        
        $normaliser->addErrorHandler(new ErrorHandler(new SingleParameterErrorType(
            '/unknown declaration type ".+"/',
            'unknown declaration type "',
            '"'
        ), new SingleParameterNormaliser()));        
        
        $normaliser->addErrorHandler(new ErrorHandler(new SingleParameterErrorType(
            '/document type does not allow element ".+" here$/',
            'document type does not allow element "',
            '" here'
        ), new SingleParameterNormaliser()));            
        
        $normaliser->addErrorHandler(new ErrorHandler(
            new DocumentTypeDoesNotAllowElementHereMissingOneOfErrorType,
            new DocumentTypeDoesNotAllowElementHereMissingOneOfNormaliser
        ));        
        
        return $normaliser;
    }
    
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm) {        
        $this->assertEquals(
            $expectedNormalForm,
            $this->getNormaliser()->normalise($htmlErrorString)->getNormalisedError()->getNormalForm()
        );            
    } 
    
    
    protected function parametersTest($htmlErrorString, $expectedParmaters) {        
        $this->assertEquals(
            $expectedParmaters,
            $this->getNormaliser()->normalise($htmlErrorString)->getNormalisedError()->getParameters()
        );        
    }
    
}