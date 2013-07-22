<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\BadValueXForAttributeYOnXhtmlElementZ;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {
    
    public function testContentTypeAndHttpEquivAndMeta() {        
        $this->parametersTest(
            'Bad value Content-Type for attribute http-equiv on XHTML element meta.',
             array(
                 'Content-Type',
                 'http-equiv',
                 'meta'                 
            )
        );    
    }
    
    public function testXUACompatibleAndHttpEquivAndMeta() {        
        $this->parametersTest(
            'Bad value X-UA-Compatible for attribute http-equiv on XHTML element meta.',
             array(
                 'X-UA-Compatible',
                 'http-equiv',
                 'meta'
            )                
        );    
    }   
    
}