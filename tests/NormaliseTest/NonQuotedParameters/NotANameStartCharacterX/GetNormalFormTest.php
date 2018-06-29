<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\NotANameStartCharacterX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testOne() {        
        $this->normalFormTest(
            'Not a name start character, U+5c'
        );     
    }    
    
    public function testTwo() {        
        $this->normalFormTest(
            'Not a name start character, U+21'
        );     
    }
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Not a name start character, %0') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}