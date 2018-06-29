<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\TheXElementIsObsoluteUseCssIntead;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testTt() {        
        $this->normalFormTest(
            'The tt element is obsolete. Use CSS instead.'
        );     
    }      
    
    public function testFont() {        
        $this->normalFormTest(
            'The font element is obsolete. Use CSS instead.'
        );     
    }  
    
    public function testCenter() {        
        $this->normalFormTest(
            'The center element is obsolete. Use CSS instead.'
        );     
    } 
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'The %0 element is obsolete. Use CSS instead.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}