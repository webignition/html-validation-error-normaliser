<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\StrayStartTagX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testHtml() {        
        $this->normalFormTest(
            'Stray start tag html.'
        );     
    } 
    
    public function testTd() {        
        $this->normalFormTest(
            'Stray start tag td.'
        );     
    } 
    
    public function testScript() {        
        $this->normalFormTest(
            'Stray start tag script.'
        );     
    }     
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Stray start tag %0.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}