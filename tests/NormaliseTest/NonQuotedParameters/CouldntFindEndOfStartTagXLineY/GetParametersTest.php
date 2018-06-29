<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\CouldntFindEndOfStartTagXLineY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {      
    
    public function testBodyAnd65() {        
       $this->parametersTest(
            "Couldn't find end of Start Tag body line 65",
             array(
                'body',
                 '65'
            )
        );    
    }    
    
    public function testAAnd210() {        
       $this->parametersTest(
            "Couldn't find end of Start Tag a line 210",
             array(
                'a',
                 '210'
            )
        );   
    }       
    
}