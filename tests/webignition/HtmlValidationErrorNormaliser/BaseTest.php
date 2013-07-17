<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\HtmlValidationErrorNormaliser;

abstract class BaseTest extends \PHPUnit_Framework_TestCase {    
    
    private $errorTypes = array(
        'webignition\HtmlValidationErrorNormaliser\ErrorType\GeneralEntityNotDefinedAndNoDefaultEntity',
        'webignition\HtmlValidationErrorNormaliser\ErrorType\UnknownDeclarationType',
        'webignition\HtmlValidationErrorNormaliser\ErrorType\DocumentTypeDoesNotAllowElementHere',
        'webignition\HtmlValidationErrorNormaliser\ErrorType\DocumentTypeDoesNotAllowElementHereMissingOneOf'
        
    );


    protected function getNormaliser() {
        $normaliser = new HtmlValidationErrorNormaliser();
        
        foreach ($this->errorTypes as $errorType) {
            $normaliser->addErrorType($errorType);        
        }
        
        return $normaliser;
    }
    
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm) {        
        $this->assertEquals(
            $expectedNormalForm,
            $this->getNormaliser()->normalise($htmlErrorString)->getNormalisedError()->getNormalForm()
        );            
    }    
    
}