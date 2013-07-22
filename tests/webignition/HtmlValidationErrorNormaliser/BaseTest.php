<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\HtmlValidationErrorNormaliser;


abstract class BaseTest extends \PHPUnit_Framework_TestCase {    

    protected function getNormaliser() {
        $normaliser = new HtmlValidationErrorNormaliser();        
        return $normaliser;
    }
    
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm) {
        $result = $this->getNormaliser()->normalise($htmlErrorString);
        
        $this->assertTrue($result->isNormalised());        
        $this->assertEquals(
            $expectedNormalForm,
            $result->getNormalisedError()->getNormalForm()
        );            
    } 
    
    
    protected function parametersTest($htmlErrorString, $expectedParmaters) {        
        $result = $this->getNormaliser()->normalise($htmlErrorString);
        
        $this->assertTrue($result->isNormalised()); 
        $this->assertEquals(
            $expectedParmaters,
            $result->getNormalisedError()->getParameters()
        );        
    }
    
}