<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\StartTagXSeenInY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {        
    
    public function testH3AndTable() {        
       $this->parametersTest(
            'Start tag h3 seen in table.',
             array(
                'h3',
                'table',
            )
        );     
    }    
    
    public function testDivAndTable() {        
       $this->parametersTest(
            'Start tag div seen in table.',
             array(
                'div',
                'table',
            )
        );     
    }
    
}