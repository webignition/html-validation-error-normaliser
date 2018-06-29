<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\TheElementXMustNotAppearAsADescendantOfTheYElement;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testFooterAndFooter() {        
        $this->normalFormTest(
            'The element footer must not appear as a descendant of the footer element.'
        );     
    }    
    
    public function testH1AndAddress() {        
        $this->normalFormTest(
            'The element h1 must not appear as a descendant of the address element.'
        );     
    } 
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'The element %0 must not appear as a descendant of the %1 element.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}