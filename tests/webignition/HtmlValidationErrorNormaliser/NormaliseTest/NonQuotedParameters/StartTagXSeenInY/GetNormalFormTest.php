<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\StartTagXSeenInY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testH3AndTable() {        
        $this->normalFormTest(
            'Start tag h3 seen in table.'
        );     
    }    
    
    public function testDivAndTable() {        
        $this->normalFormTest(
            'Start tag div seen in table.'
        );     
    } 
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Start tag %0 seen in %1.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}