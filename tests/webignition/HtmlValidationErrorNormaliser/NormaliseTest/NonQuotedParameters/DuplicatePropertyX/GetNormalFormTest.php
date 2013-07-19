<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\DuplicatePropertyX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testDuplicateIdFbRoot() {        
        $this->normalFormTest(
            'Duplicate ID fb-root.',
            'Duplicate ID %0.'
        );     
    }      
    
    public function testDuplicateAttributeClass() {        
        $this->normalFormTest(
            'Duplicate attribute class.',
            'Duplicate attribute %0.'
        );     
    }  
}