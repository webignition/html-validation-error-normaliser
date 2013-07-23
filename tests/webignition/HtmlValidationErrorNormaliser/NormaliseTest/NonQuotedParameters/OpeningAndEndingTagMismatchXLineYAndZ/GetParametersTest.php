<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\OpeningAndEndingTagMismatchXLineYAndZ;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {          
    
    public function testHtmlAnd2AndBody() {        
       $this->parametersTest(
            "Opening and ending tag mismatch: html line 2 and body",
             array(
                 'html',
                 '2',
                 'body'
            )
        );    
    }    
    
    public function testDivAnd331AndTable() {        
       $this->parametersTest(
            "Opening and ending tag mismatch: div line 331 and table",
             array(
                 'div',
                 '331',
                 'table'
            )
        );    
    }     
    
}