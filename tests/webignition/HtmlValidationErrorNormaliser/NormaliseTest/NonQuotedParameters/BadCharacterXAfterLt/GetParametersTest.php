<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\BadCharacterXAfterLt;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {        
    
    public function testSpace() {        
       $this->parametersTest(
            'Bad character   after <. Probable cause: Unescaped <. Try escaping it as &lt;.',
             array(
                ' '
            )
        );     
    }    
    
    public function testLt() {        
       $this->parametersTest(
            'Bad character < after <. Probable cause: Unescaped <. Try escaping it as &lt;.',
             array(
                '<'
            )
        );     
    } 
    
    
    public function testGlyph() {        
       $this->parametersTest(
            'Bad character 越 after <. Probable cause: Unescaped <. Try escaping it as &lt;.',
             array(
                '越'
            )
        );     
    }    
    
}