<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\RequiredCharacterFoundXExpectedY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {      
    
    public function testEqualsAndSemicolon() {        
       $this->parametersTest(
            'required character (found =) (expected ;)',
             array(
                '=',
                ';'
            )
        );    
    }    
    
    public function testMandL() {        
       $this->parametersTest(
            'required character (found m) (expected l)',
             array(
                'm',
                'l'
            )
        );   
    }
    
    public function testBlankAndGt() {
       $this->parametersTest(
            'required character (found  ) (expected >)',
             array(
                ' ',
                '>'
            )
        );       
    }    
    
}