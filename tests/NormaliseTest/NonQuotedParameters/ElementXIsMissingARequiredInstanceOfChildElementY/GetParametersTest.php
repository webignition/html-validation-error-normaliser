<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ElementXIsMissingARequiredInstanceOfChildElementY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {     
    
    public function testDlAndDd() {        
       $this->parametersTest(
            'Element dl is missing a required instance of child element dd.',
             array(
                 'dl',
                 'dd'
            )
        );   
    }   
    
}