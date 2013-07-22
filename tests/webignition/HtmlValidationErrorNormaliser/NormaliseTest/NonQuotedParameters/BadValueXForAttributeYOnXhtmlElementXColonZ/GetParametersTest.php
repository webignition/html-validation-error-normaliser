<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\BadValueXForAttributeYOnXhtmlElementXColonZ;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {

    public function testTwitterColonImageAndNameAndMetaAndAnything() {        
        $this->parametersTest(
            'Bad value twitter:image for attribute name on XHTML element meta: Keyword twitter:image is not registered.',
             array(
                 'twitter:image',
                 'name',
                 'meta',
                 'Keyword twitter:image is not registered.'
            )
        );   
    }
    
    public function testNewsKeywordsAndNameAndMetaAndAnything() {        
        $this->parametersTest(
            'Bad value news_keywords for attribute name on XHTML element meta: Keyword news_keywords is not registered.',
             array(
                 'news_keywords',
                 'name',
                 'meta',
                 'Keyword news_keywords is not registered.'
            )
        );   
    }  
    
}