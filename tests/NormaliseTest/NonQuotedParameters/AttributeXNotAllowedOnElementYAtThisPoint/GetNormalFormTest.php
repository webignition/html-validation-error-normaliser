<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\AttributeXNotAllowedOnElementYAtThisPoint;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testValignAndImg() {        
        $this->normalFormTest(
            'Attribute valign not allowed on element img at this point.',
            'Attribute %0 not allowed on element %1 at this point.'
        );     
    }
    
    public function testAllowfullscreenAndIframe() {        
        $this->normalFormTest(
            'Attribute allowfullscreen not allowed on element iframe at this point.',
            'Attribute %0 not allowed on element %1 at this point.'
        );     
    }
    
    public function testPubdateAndTime() {        
        $this->normalFormTest(
            'Attribute pubdate not allowed on element time at this point.',
            'Attribute %0 not allowed on element %1 at this point.'
        );     
    }
    
    public function testMessyAttributeOne() {
        $this->normalFormTest(
            'Attribute sans-serif";" not allowed on element span at this point.',
            'Attribute %0 not allowed on element %1 at this point.'
        );     
    } 
    
    public function testMessyAttributeTwo() {
        $this->normalFormTest(
            'Attribute penalty". not allowed on element meta at this point.',
            'Attribute %0 not allowed on element %1 at this point.'
        );     
    }       
}