<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\TheXAttributeOnTheYElementIsObsoluteUseCssInstead;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testFrameborderAndIframe() {        
        $this->normalFormTest(
            'The frameborder attribute on the iframe element is obsolete. Use CSS instead.'
        );     
    }      
    
    public function testScrollingAndIframe() {        
        $this->normalFormTest(
            'The scrolling attribute on the iframe element is obsolete. Use CSS instead.'
        );     
    }  
    
    public function testAlignAndP() {        
        $this->normalFormTest(
            'The align attribute on the p element is obsolete. Use CSS instead.'
        );     
    } 
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'The %0 attribute on the %1 element is obsolete. Use CSS instead.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}