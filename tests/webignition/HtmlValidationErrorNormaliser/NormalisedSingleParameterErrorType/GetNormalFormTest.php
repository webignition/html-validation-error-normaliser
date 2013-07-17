<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormalisedSingleParameterErrorType;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {    

    public function testNormaliseGeneralEntityDefinedAndNoDefaultEntity() {        
        $htmlErrorString = 'general entity "t" not defined and no default entity';
        $normalForm = 'general entity "%0" not defined and no default entity';
        
        $this->assertEquals(
            $normalForm,
            $this->getNormaliser()->normalise($htmlErrorString)->getNormalisedError()->getNormalForm()
        );     
    }
    
}