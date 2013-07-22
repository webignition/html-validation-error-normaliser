<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\AttributeXNotAllowedHere;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {    
    
    public function testSpan() {        
   
    } 
    
    public function testXmlnsColonFb() {        
       $this->parametersTest(
            'Attribute xmlns:fb not allowed here.',
             array(
                'xmlns:fb'
            )
        );         
          
    } 
    
    public function testXmlnsColonOg() {        
       $this->parametersTest(
            'Attribute xmlns:og not allowed here.',
             array(
                'xmlns:og'
            )
        );   
    }    
    
}