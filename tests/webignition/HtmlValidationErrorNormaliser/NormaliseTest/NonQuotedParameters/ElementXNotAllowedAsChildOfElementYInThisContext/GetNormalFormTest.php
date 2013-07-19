<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ElementXNotAllowedAsChildOfElementYInThisContext;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {         

    public function testPandH2() {        
        $this->normalFormTest(
            'Element p not allowed as child of element h2 in this context. (Suppressing further errors from this subtree.)',
            'Element %0 not allowed as child of element %1 in this context. (Suppressing further errors from this subtree.)'
        );     
    }
    
    public function testStyleAndBody() {        
        $this->normalFormTest(
            'Element style not allowed as child of element body in this context. (Suppressing further errors from this subtree.)',
            'Element %0 not allowed as child of element %1 in this context. (Suppressing further errors from this subtree.)'
        );     
    }
    
    public function testSuColonBadgeAndDiv() {        
        $this->normalFormTest(
            'Element su:badge not allowed as child of element div in this context. (Suppressing further errors from this subtree.)',
            'Element %0 not allowed as child of element %1 in this context. (Suppressing further errors from this subtree.)'
        );     
    }
}