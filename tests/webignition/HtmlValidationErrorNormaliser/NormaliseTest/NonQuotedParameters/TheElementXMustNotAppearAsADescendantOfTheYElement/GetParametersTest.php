<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\TheElementXMustNotAppearAsADescendantOfTheYElement;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {        
    
    public function testFooterAndFooter() {        
       $this->parametersTest(
            'The element footer must not appear as a descendant of the footer element.',
             array(
                'footer',
                'footer',
            )
        );     
    }    
    
    public function testH1AndAddress() {        
       $this->parametersTest(
            'The element h1 must not appear as a descendant of the address element.',
             array(
                'h1',
                'address',
            )
        );     
    }   
    
}