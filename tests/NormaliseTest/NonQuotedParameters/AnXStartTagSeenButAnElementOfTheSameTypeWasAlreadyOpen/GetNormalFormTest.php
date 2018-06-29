<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\AnXStartTagSeenButAnElementOfTheSameTypeWasAlreadyOpen;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testA() {        
        $this->normalFormTest(
            'An a start tag seen but an element of the same type was already open.'
        );     
    }    
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'An %0 start tag seen but an element of the same type was already open.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}