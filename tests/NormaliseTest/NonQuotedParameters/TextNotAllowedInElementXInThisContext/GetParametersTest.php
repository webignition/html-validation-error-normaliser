<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\TextNotAllowedInElementXInThisContext;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {        
    
    public function testUl() {        
       $this->parametersTest(
            'Text not allowed in element ul in this context.',
             array(
                'ul'
            )
        );     
    }    
    
    public function testSelect() {        
       $this->parametersTest(
            'Text not allowed in element select in this context.',
             array(
                'select'
            )
        );     
    }   
    
}