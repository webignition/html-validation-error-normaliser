<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\CouldntFindEndOfStartTagXLineY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testBodyAnd65() {        
        $this->normalFormTest(
            "Couldn't find end of Start Tag body line 65"
        );     
    }    
    
    public function testAAnd210() {        
        $this->normalFormTest(
            "Couldn't find end of Start Tag a line 210"
        );     
    }    
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = "Couldn't find end of Start Tag %0 line %1") {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}