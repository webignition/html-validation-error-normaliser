<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\BadStartTagXInY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testImgAndHead() {        
        $this->normalFormTest(
            'Bad start tag in img in head.'
        );     
    }    
    
    public function testDivAndHead() {        
        $this->normalFormTest(
            'Bad start tag in div in head.'
        );     
    }
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Bad start tag in %0 in %1.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}