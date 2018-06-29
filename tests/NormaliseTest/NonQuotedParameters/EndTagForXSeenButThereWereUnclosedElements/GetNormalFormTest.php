<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\EndTagForXSeenButThereWereUnclosedElements;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       
    
    public function testDoubleSpaceBeforeBody() {
        $this->normalFormTest(
            'End tag for  body seen, but there were unclosed elements.'
        );         
    }
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'End tag for  %0 seen, but there were unclosed elements.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}