<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ElementXMustNotHaveAttributeYUnlessAttributeZIsAlsoSpecified;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testScriptAndCharsetAndSrc() {        
        $this->normalFormTest(
            'Element script must not have attribute charset unless attribute src is also specified.'
        );     
    }      
    
    public function testScriptAndAsyncAndSrc() {        
        $this->normalFormTest(
            'Element script must not have attribute async unless attribute src is also specified.'
        );     
    }  
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Element %0 must not have attribute %1 unless attribute %2 is also specified.') {                
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}