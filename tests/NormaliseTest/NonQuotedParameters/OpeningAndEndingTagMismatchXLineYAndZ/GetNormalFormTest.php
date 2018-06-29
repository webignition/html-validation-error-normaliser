<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\OpeningAndEndingTagMismatchXLineYAndZ;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testHtmlAnd2AndBody() {        
        $this->normalFormTest(
            "Opening and ending tag mismatch: html line 2 and body"
        );     
    }    
    
    public function testDivAnd331AndTable() {        
        $this->normalFormTest(
            "Opening and ending tag mismatch: div line 331 and table"
        );     
    }    
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = "Opening and ending tag mismatch: %0 line %1 and %2") {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}