<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\EndTagXSeenButThereWereOpenElements;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testH3() {        
        $this->normalFormTest(
            'End tag h3 seen, but there were open elements.'
        );     
    } 
    
    public function testP() {        
        $this->normalFormTest(
            'End tag p seen, but there were open elements.'
        );     
    }
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'End tag %0 seen, but there were open elements.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}