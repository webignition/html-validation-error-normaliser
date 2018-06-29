<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\NonSgmlCharacterNumberX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function test135() {        
        $this->normalFormTest(
            'non SGML character number 135'
        );     
    }    
    
    public function test3() {        
        $this->normalFormTest(
            'non SGML character number 3'
        );     
    }    
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'non SGML character number %0') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}