<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\AttributeXNotAllowedOnXhtmlElementYAtThisPoint;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {        
    
    public function testValueAndMeta() {        
       $this->parametersTest(
            'Attribute value not allowed on XHTML element meta at this point.',
             array(
                'value',
                 'meta'
            )
        );     
    }    
    
    public function testAboutAndMeta() {        
       $this->parametersTest(
            'Attribute about not allowed on XHTML element meta at this point.',
             array(
                'about',
                 'meta'
            )
        );     
    }    
    
}