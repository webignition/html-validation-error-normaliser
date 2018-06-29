<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\StrayStartTagX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {    
    
    public function testHtml() {        
       $this->parametersTest(
            'Stray start tag html.',
             array(
                'html'
            )
        );    
    } 
    
    public function testTd() {        
       $this->parametersTest(
            'Stray start tag td.',
             array(
                'td'
            )
        );   
    } 
    
    public function testScript() {        
       $this->parametersTest(
            'Stray start tag script.',
             array(
                'script'
            )
        );     
    }     
    
}