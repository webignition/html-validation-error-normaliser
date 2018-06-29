<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ReferenceToUndeclaredGeneralEntityX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testNbsp() {        
        $this->normalFormTest(
            'reference to undeclared general entity nbsp'
        );     
    }    
    
    public function testCopy() {        
        $this->normalFormTest(
            'reference to undeclared general entity copy'
        );     
    } 
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'reference to undeclared general entity %0') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}