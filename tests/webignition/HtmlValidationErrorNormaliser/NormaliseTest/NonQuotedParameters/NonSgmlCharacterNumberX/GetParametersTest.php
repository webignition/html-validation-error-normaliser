<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\NonSgmlCharacterNumberX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {      
    
    public function test135() {        
       $this->parametersTest(
            'non SGML character number 135',
             array(
                '135'
            )
        );    
    }    
    
    public function test3() {        
       $this->parametersTest(
            'non SGML character number 3',
             array(
                '3'
            )
        );   
    }    
    
}