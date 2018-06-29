<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\BadValueXForAttributeYOnElementZ;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testXUACompatibleAndHttpEquivAndMeta() {        
        $this->normalFormTest(
            'Bad value X-UA-Compatible for attribute http-equiv on element meta.'
        );     
    }
    
    public function testCleartypeAndHttpEquivAndMeta() {        
        $this->normalFormTest(
            'Bad value cleartype for attribute http-equiv on element meta.'
        );     
    }
    
    public function testBlankAndMethodAndForm() {        
        $this->normalFormTest(
            'Bad value  for attribute method on element form.'
        );     
    }
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Bad value %0 for attribute %1 on element %2.') {                
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }     
    
}