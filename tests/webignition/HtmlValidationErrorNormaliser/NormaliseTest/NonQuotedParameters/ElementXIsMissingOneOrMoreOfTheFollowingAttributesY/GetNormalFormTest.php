<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ElementXIsMissingOneOrMoreOfTheFollowingAttributesY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testObjectAndDataType() {        
        $this->normalFormTest(
            'Element object is missing one or more of the following attributes: data, type.'
        );     
    }    
    
    public function testLinkAndItemPropPropertyRel() {        
        $this->normalFormTest(
            'Element link is missing one or more of the following attributes: itemprop, property, rel.'
        );     
    }
    
    public function testMetaAndMany() {        
        $this->normalFormTest(
            'Element meta is missing one or more of the following attributes: charset, content, http-equiv, itemprop, name, property.'
        );     
    }    
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Element %0 is missing one or more of the following attributes: %1.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}