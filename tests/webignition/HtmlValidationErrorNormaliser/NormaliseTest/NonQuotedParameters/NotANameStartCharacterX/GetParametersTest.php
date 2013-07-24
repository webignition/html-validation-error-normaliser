<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\NotANameStartCharacterX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {        
    
    public function testOne() {        
       $this->parametersTest(
            'Not a name start character, U+5c',
             array(
                'U+5c'
            )
        );     
    }    
    
    public function testTwo() {        
       $this->parametersTest(
            'Not a name start character, U+21',
             array(
                'U+21'
            )
        );    
    }   
    
}