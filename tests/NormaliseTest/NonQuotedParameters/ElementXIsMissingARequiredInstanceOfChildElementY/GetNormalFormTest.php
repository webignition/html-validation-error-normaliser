<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ElementXIsMissingARequiredInstanceOfChildElementY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testDlAndDd() {        
        $this->normalFormTest(
            'Element dl is missing a required instance of child element dd.'
        );     
    }
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Element %0 is missing a required instance of child element %1.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}