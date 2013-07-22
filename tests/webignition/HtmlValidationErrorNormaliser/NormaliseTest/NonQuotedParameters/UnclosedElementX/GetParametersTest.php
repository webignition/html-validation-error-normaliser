<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\UnclosedElementX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {    
    
    public function testSpan() {        
       $this->parametersTest(
            'Unclosed element span.',
             array(
                'span'
            )
        );    
    } 
    
    public function testB() {        
       $this->parametersTest(
            'Unclosed element b.',
             array(
                'b'
            )
        );   
    } 
    
    public function testBlockquote() {        
       $this->parametersTest(
            'Unclosed element blockquote.',
             array(
                'blockquote'
            )
        );     
    }     
    
}