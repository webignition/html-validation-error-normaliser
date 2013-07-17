<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests;

use webignition\HtmlValidationErrorNormaliser\HtmlValidationErrorNormaliser;

class TestTest extends \PHPUnit_Framework_TestCase {    

    public function testNormaliseGeneralEntityDefinedAndNoDefaultEntity() {        
        $htmlErrorString = 'general entity "t" not defined and no default entity';
        
        $htmlValidationNormaliser = new HtmlValidationErrorNormaliser();
        $htmlValidationNormaliser->addErrorType('webignition\HtmlValidationErrorNormaliser\ErrorType\GeneralEntityNotDefinedAndNoDefaultEntity');
        
        $normalisedError = $htmlValidationNormaliser->normalise($htmlErrorString);
        $this->assertEquals('general entity "%0" not defined and no default entity', $normalisedError['normal-form']);
        $this->assertEquals(array(
            't'
        ), $normalisedError['parameters']);        
    }  
    
    
    
}