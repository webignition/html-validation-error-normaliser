<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\TheXAttributeOnTheYElementIsObsoluteUseCssInstead;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {     

    public function testFrameborderAndIframe() {        
       $this->parametersTest(
            'The frameborder attribute on the iframe element is obsolete. Use CSS instead.',
             array(
                 'frameborder',
                 'iframe'
            )
        );    
    }
    
    public function testScrollingAndIframe() {        
       $this->parametersTest(
            'The scrolling attribute on the iframe element is obsolete. Use CSS instead.',
             array(
                 'scrolling',
                 'iframe'
            )
        );    
    }    
    
    public function testAlignAndP() {        
       $this->parametersTest(
            'The align attribute on the p element is obsolete. Use CSS instead.',
             array(
                 'align',
                 'p'
            )
        );    
    }    
    
}