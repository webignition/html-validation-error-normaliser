<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\XhtmlElementXNotAllowedAsChildOfXhtmlelementYInThisContext;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {    
    
    public function testMetaAndMeta() {
        $this->parametersTest(
            'XHTML element meta not allowed as child of XHTML element meta in this context. (Suppressing further errors from this subtree.)',
             array(
                 'meta',
                 'meta'
            )
        );        
    }
    
    public function testBaseAndMeta() {
        $this->parametersTest(
            'XHTML element base not allowed as child of XHTML element meta in this context. (Suppressing further errors from this subtree.)',
             array(
                 'base',
                 'meta'
            )
        );        
    }
    
    public function testLinkAndMeta() {
        $this->parametersTest(
            'XHTML element link not allowed as child of XHTML element meta in this context. (Suppressing further errors from this subtree.)',
             array(
                 'link',
                 'meta'
            )
        );        
    }    
    
}