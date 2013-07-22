<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\EndTagXSeenButThereWereOpenElements;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {    
    
    public function testH3() {        
        $this->parametersTest(
            'End tag h3 seen, but there were open elements.',
             array(
                'h3'
            )
        );    
    } 
    
    public function testP() {        
        $this->parametersTest(
            'End tag p seen, but there were open elements.',
             array(
                'p'
            )
        );  
    }      
    
}