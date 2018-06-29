<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ForbiddenCodePointX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {           
    
    public function testOne() {        
       $this->parametersTest(
            "Forbidden code point U+0080.",
             array(
                 'U+0080',
            )
        );     
    }    
    
    public function testTwo() {        
       $this->parametersTest(
            "Forbidden code point U+009d.",
             array(
                 'U+009d',
            )
        );    
    }    
    
}