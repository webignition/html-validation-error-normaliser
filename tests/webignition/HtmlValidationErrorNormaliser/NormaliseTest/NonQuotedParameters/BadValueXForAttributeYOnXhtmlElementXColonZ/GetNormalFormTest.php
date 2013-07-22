<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\BadValueXForAttributeYOnXhtmlElementXColonZ;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testTwitterColonImageAndNameAndMetaAndAnything() {        
        $this->normalFormTest(
            'Bad value twitter:image for attribute name on XHTML element meta: Keyword twitter:image is not registered.'
        );     
    }
    
    public function testNewsKeywordsAndNameAndMetaAndAnything() {        
        $this->normalFormTest(
            'Bad value news_keywords for attribute name on XHTML element meta: Keyword news_keywords is not registered.'
        );     
    }
    
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Bad value %0 for attribute %1 on XHTML element %2: %3') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }     
    
}