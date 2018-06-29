<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ReferenceToUndeclaredGeneralEntityX;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {        
    
    public function testNbsp() {        
       $this->parametersTest(
            'reference to undeclared general entity nbsp',
             array(
                'nbsp'
            )
        );     
    }    
    
    public function testCopy() {        
       $this->parametersTest(
            'reference to undeclared general entity copy',
             array(
                'copy'
            )
        );     
    }    
    
}