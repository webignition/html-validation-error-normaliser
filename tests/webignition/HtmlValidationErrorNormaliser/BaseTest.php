<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\HtmlValidationErrorNormaliser;


abstract class BaseTest extends \PHPUnit_Framework_TestCase {    

    protected function getNormaliser() {
        $normaliser = new HtmlValidationErrorNormaliser();        
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