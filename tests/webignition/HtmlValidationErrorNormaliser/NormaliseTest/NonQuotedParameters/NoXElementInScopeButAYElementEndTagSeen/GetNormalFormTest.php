<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\NoXElementInScopeButAYElementEndTagSeen;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testPandP() {        
        $this->normalFormTest(
            'No p element in scope but a p end tag seen.'
        );     
    }      
    
    public function testLiAndLi() {        
        $this->normalFormTest(
            'No li element in scope but a li end tag seen.'
        );     
    }  
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'No %0 element in scope but a %1 end tag seen.') {                
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}