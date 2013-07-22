<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\NoXElementInScopeButAYElementEndTagSeen;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {     
    
    public function testPandP() {        
       $this->parametersTest(
            'No p element in scope but a p end tag seen.',
             array(
                'p',
                'p'
            )
        );    
    }      
    
    public function testLiAndLi() {        
       $this->parametersTest(
            'No li element in scope but a li end tag seen.',
             array(
                'li',
                'li'
            )
        );  
    }     
    
}