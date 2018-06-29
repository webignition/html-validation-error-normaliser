<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\TheXElementIsObsoluteUseCssIntead;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {     

    
    public function testTt() {        
       $this->parametersTest(
            'The tt element is obsolete. Use CSS instead.',
             array(
                 'tt',
            )
        );   
    }      
    
    public function testFont() {        
       $this->parametersTest(
            'The font element is obsolete. Use CSS instead.',
             array(
                 'font',
            )
        );     
    }  
    
    public function testCenter() {        
       $this->parametersTest(
            'The center element is obsolete. Use CSS instead.',
             array(
                 'center',
            )
        );   
    }     
    
}