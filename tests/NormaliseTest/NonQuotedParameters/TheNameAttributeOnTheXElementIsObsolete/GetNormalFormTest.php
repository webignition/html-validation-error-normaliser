<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\TheNameAttributeOnTheXElementIsObsolete;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testImg() {        
        $this->normalFormTest(
            'The name attribute on the img element is obsolete. Use the id attribute instead.'
        );     
    }    
    
    public function testOption() {        
        $this->normalFormTest(
            'The name attribute on the option element is obsolete. Use the id attribute instead.'
        );     
    } 
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'The name attribute on the %0 element is obsolete. Use the id attribute instead.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}