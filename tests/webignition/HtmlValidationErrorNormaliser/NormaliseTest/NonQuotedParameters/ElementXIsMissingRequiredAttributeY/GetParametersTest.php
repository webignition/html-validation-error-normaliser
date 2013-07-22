<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ElementXIsMissingRequiredAttributeY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {
    
    public function testImgAndSrc() {        
       $this->parametersTest(
            'Element img is missing required attribute src.',
             array(
                 'img',
                 'src',
            )
        );    
    }      
    
    public function testInputAndAlt() {        
       $this->parametersTest(
            'Element input is missing required attribute alt.',
             array(
                 'input',
                 'alt',
            )
        );    
    }   
    
}