<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\BadCharacterXAfterLt;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testSpace() {        
        $this->normalFormTest(
            'Bad character   after <. Probable cause: Unescaped <. Try escaping it as &lt;.'
        );     
    }    
    
    public function testLt() {        
        $this->normalFormTest(
            'Bad character < after <. Probable cause: Unescaped <. Try escaping it as &lt;.'
        );     
    } 
    
    public function testGlyph() {        
        $this->normalFormTest(
            'Bad character 越 after <. Probable cause: Unescaped <. Try escaping it as &lt;.'
        );     
    }    
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Bad character %0 after <. Probable cause: Unescaped <. Try escaping it as &lt;.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}