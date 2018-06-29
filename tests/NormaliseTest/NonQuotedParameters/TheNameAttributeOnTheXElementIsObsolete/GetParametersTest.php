<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\TheNameAttributeOnTheXElementIsObsolete;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {        
    
    public function testImg() {        
       $this->parametersTest(
            'The name attribute on the img element is obsolete. Use the id attribute instead.',
             array(
                'img'
            )
        );     
    }    
    
    public function testOption() {        
       $this->parametersTest(
            'The name attribute on the option element is obsolete. Use the id attribute instead.',
             array(
                'option'
            )
        );     
    }    
    
}