<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\XhtmlElementXNotAllowedAsChildOfXhtmlelementYInThisContext;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       
    
    public function testMetaAndMeta() {
        $this->normalFormTest(
            'XHTML element meta not allowed as child of XHTML element meta in this context. (Suppressing further errors from this subtree.)'
        );         
    }
    
    public function testBaseAndMeta() {
        $this->normalFormTest(
            'XHTML element base not allowed as child of XHTML element meta in this context. (Suppressing further errors from this subtree.)'
        );         
    }
    
    public function testLinkAndMeta() {
        $this->normalFormTest(
            'XHTML element link not allowed as child of XHTML element meta in this context. (Suppressing further errors from this subtree.)'
        );         
    }
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'XHTML element %0 not allowed as child of XHTML element %1 in this context. (Suppressing further errors from this subtree.)') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}