<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\DuplicatePropertyX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {     
    
    public function testDuplicateIdFbRoot() {        
       $this->parametersTest(
            'Duplicate ID fb-root.',
             array(
                'fb-root'
            )
        );    
    }      
    
    public function testDuplicateAttributeClass() {        
       $this->parametersTest(
            'Duplicate attribute class.',
             array(
                'class'
            )
        );  
    }
    
    public function testDuplicateIdBlank() {        
       $this->parametersTest(
            'Duplicate ID .',
             array(
                ''
            )
        );    
    }     
    
}