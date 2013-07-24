<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\ElementXIsMissingOneOrMoreOfTheFollowingAttributesY;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {        
    
    public function testObjectAndDataType() {        
       $this->parametersTest(
            'Element object is missing one or more of the following attributes: data, type.',
             array(
                'object',
                'data, type',
            )
        );     
    }    
    
    public function testLinkAndItemPropPropertyRel() {        
       $this->parametersTest(
            'Element link is missing one or more of the following attributes: itemprop, property, rel.',
             array(
                'link',
                'itemprop, property, rel',
            )
        );     
    }
    
    public function testMetaAndMany() {        
       $this->parametersTest(
            'Element meta is missing one or more of the following attributes: charset, content, http-equiv, itemprop, name, property.',
             array(
                'meta',
                'charset, content, http-equiv, itemprop, name, property',
            )
        );     
    }   
    
}