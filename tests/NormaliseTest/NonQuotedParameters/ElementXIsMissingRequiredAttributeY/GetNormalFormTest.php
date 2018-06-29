<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ElementXIsMissingRequiredAttributeY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testImgAndSrc() {        
        $this->normalFormTest(
            'Element img is missing required attribute src.'
        );     
    }      
    
    public function testInputAndAlt() {        
        $this->normalFormTest(
            'Element input is missing required attribute alt.'
        );     
    }
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Element %0 is missing required attribute %1.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}