<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\AttributeXNotAllowedOnXhtmlElementYAtThisPoint;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testValueAndMeta() {        
        $this->normalFormTest(
            'Attribute value not allowed on XHTML element meta at this point.'
        );     
    }    
    
    public function testAboutAndMeta() {        
        $this->normalFormTest(
            'Attribute about not allowed on XHTML element meta at this point.'
        );     
    } 
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Attribute %0 not allowed on XHTML element %1 at this point.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}