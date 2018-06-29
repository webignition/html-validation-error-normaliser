<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\BadValueXForAttributeYOnElementZ;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {
    
    public function testXUACompatibleAndHttpEquivAndMeta() {        
        $this->parametersTest(
            'Bad value X-UA-Compatible for attribute http-equiv on element meta.',
             array(
                 'X-UA-Compatible',
                 'http-equiv',
                 'meta'
            )
        );    
    }
    
    public function testCleartypeAndHttpEquivAndMeta() {        
        $this->parametersTest(
            'Bad value cleartype for attribute http-equiv on element meta.',
             array(
                 'cleartype',
                 'http-equiv',
                 'meta'                 
            )
        );    
    }   
    
    public function testBlankAndMethodAndForm() {        
        $this->parametersTest(
            'Bad value  for attribute method on element form.',
             array(
                 '',
                 'method',
                 'form'                 
            )
        );   
    }    
    
}