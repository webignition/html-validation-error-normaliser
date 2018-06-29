<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\AttributeXNotAllowedHere;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testXmlnsColonFb() {        
        $this->normalFormTest(
            'Attribute xmlns:fb not allowed here.'
        );     
    } 
    
    public function testXmlnsColonOg() {        
        $this->normalFormTest(
            'Attribute xmlns:og not allowed here.'
        );     
    }  
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Attribute %0 not allowed here.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}