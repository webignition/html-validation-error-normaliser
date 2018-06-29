<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\UnclosedElementX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testSpan() {        
        $this->normalFormTest(
            'Unclosed element span.'
        );     
    } 
    
    public function testB() {        
        $this->normalFormTest(
            'Unclosed element b.'
        );     
    } 
    
    public function testBlockquote() {        
        $this->normalFormTest(
            'Unclosed element blockquote.'
        );     
    }     
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Unclosed element %0.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}