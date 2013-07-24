<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\TextNotAllowedInElementXInThisContext;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testUl() {        
        $this->normalFormTest(
            'Text not allowed in element ul in this context.'
        );     
    }    
    
    public function testSelect() {        
        $this->normalFormTest(
            'Text not allowed in element select in this context.'
        );     
    } 
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Text not allowed in element %0 in this context.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}