<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ForbiddenCodePointX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testOne() {        
        $this->normalFormTest(
            "Forbidden code point U+0080."
        );     
    }    
    
    public function testTwo() {        
        $this->normalFormTest(
            "Forbidden code point U+009d."
        );     
    }    
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = "Forbidden code point %0.") {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }
}