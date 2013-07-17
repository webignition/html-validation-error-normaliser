<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormalisedMultipleParameterErrorType;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {    
    
    public function testNormaliseGeneralEntityDefinedAndNoDefaultEntity() {        
        $htmlErrorString = 'general entity "t" not defined and no default entity';
        
        $this->assertEquals(
            array(
                't'
            ),
            $this->getNormaliser()->normalise($htmlErrorString)->getNormalisedError()->getParameters()
        );
    }
    
}