<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\RequiredCharacterFoundXExpectedY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testEqualsAndSemicolon() {        
        $this->normalFormTest(
            'required character (found =) (expected ;)'
        );     
    }    
    
    public function testMandL() {        
        $this->normalFormTest(
            'required character (found m) (expected l)'
        );     
    }
    
    public function testBlankAndGt() {
        $this->normalFormTest(
            'required character (found  ) (expected >)'
        );        
    }
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'required character (found %0) (expected %1)') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}