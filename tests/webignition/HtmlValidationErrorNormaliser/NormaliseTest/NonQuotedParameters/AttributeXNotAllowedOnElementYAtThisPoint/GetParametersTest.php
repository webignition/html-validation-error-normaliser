<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\AttributeXNotAllowedOnElementYAtThisPoint;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {    
    
    public function testValignAndImg() {        
       $this->parametersTest(
            'Attribute valign not allowed on element img at this point.',
             array(
                'valign',
                 'img'
            )
        );   
    }
    
    public function testAllowfullscreenAndIframe() {        
       $this->parametersTest(
            'Attribute allowfullscreen not allowed on element iframe at this point.',
             array(
                'allowfullscreen',
                 'iframe'
            )
        );    
    }
    
    public function testPubdateAndTime() {        
       $this->parametersTest(
            'Attribute pubdate not allowed on element time at this point.',
             array(
                'pubdate',
                'time'
            )
        );    
    }    
    
}