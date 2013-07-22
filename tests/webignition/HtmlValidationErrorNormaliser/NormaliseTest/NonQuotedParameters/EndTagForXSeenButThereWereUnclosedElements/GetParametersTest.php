<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\EndTagForXSeenButThereWereUnclosedElements;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {    
    
    public function testDoubleSpaceBeforeBody() {        
        $this->parametersTest(
            'End tag for  body seen, but there were unclosed elements.',
             array(
                'body'
            )
        );    
    }      
    
}