<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\BadValueXForAttributeYOnXhtmlElementZ;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testContentTypeAndHttpEquivAndMeta() {        
        $this->normalFormTest(
            'Bad value Content-Type for attribute http-equiv on XHTML element meta.'
        );     
    }
    
    public function testXUACompatibleAndHttpEquivAndMeta() {        
        $this->normalFormTest(
            'Bad value X-UA-Compatible for attribute http-equiv on XHTML element meta.'
        );     
    }
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Bad value %0 for attribute %1 on XHTML element %2.') {                
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }     
    
}