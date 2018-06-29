<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\BadStartTagXInY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {        
    
    public function testImgAndHead() {        
       $this->parametersTest(
            'Bad start tag in img in head.',
             array(
                'img',
                'head'
            )
        );     
    }    
    
    public function testDivAndHead() {        
       $this->parametersTest(
            'Bad start tag in div in head.',
             array(
                'div',
                'head'
            )
        );    
    }   
    
}