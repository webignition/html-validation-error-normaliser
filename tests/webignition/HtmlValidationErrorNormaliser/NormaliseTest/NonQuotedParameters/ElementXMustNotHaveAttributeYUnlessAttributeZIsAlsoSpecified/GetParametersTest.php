<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ElementXMustNotHaveAttributeYUnlessAttributeZIsAlsoSpecified;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {     
    
    public function testScriptAndCharsetAndSrc() {        
       $this->parametersTest(
            'Element script must not have attribute charset unless attribute src is also specified.',
             array(
                 'script',
                 'charset',
                 'src'
            )
        );    
    }      
    
    public function testScriptAndAsyncAndSrc() {        
       $this->parametersTest(
            'Element script must not have attribute async unless attribute src is also specified.',
             array(
                 'script',
                 'async',
                 'src'
            )
        );  
    }    
    
}