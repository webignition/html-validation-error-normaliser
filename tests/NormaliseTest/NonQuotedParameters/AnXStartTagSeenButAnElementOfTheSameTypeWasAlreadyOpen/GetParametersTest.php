<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\AnXStartTagSeenButAnElementOfTheSameTypeWasAlreadyOpen;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {    
    
    public function testA() {        
       $this->parametersTest(
            'An a start tag seen but an element of the same type was already open.',
             array(
                'a'
            )
        );    
    }    
    
}