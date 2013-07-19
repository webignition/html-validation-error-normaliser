<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ElementXNotAllowedAsChildOfElementYInThisContext;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {    
    
    public function testPandH2() {        
       $this->parametersTest(
            'Element p not allowed as child of element h2 in this context. (Suppressing further errors from this subtree.)',
             array(
                 'p',
                 'h2'
            )
        );    
    }
    
    public function testStyleAndBody() {                
       $this->parametersTest(
            'Element style not allowed as child of element body in this context. (Suppressing further errors from this subtree.)',
             array(
                 'style',
                 'body'
            )
        );         
    }
    
    public function testSuColonBadgeAndDiv() {                
       $this->parametersTest(
            'Element su:badge not allowed as child of element div in this context. (Suppressing further errors from this subtree.)',
             array(
                 'su:badge',
                 'div'
            )
        );         
    }    
    
}