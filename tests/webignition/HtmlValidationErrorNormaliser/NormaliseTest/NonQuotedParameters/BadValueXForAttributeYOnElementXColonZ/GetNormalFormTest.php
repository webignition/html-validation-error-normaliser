<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\BadValueXForAttributeYOnElementXColonZ;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testArchivesAndRelAndLinkAndAnything() {        
        $this->normalFormTest(
            'Bad value archives for attribute rel on element link: Not an absolute IRI. The string archives is not a registered keyword or absolute URL.'
        );     
    } 
    
    public function testUtf8AndCharsetAndScriptAndAnything() {        
        $this->normalFormTest(
            'Bad value utf-8 for attribute charset on element script: utf-8 is not a valid character encoding name.'
        );     
    }     
    
    public function testCategoryTagAndRelAndAAndAnything() {        
        $this->normalFormTest(
            'Bad value category tag for attribute rel on element a: The string category is not a registered keyword or absolute URL. Whitespace in path component. Use %20 in place of spaces.'
        );     
    }
    
    public function testGarbageAndContentAndMetaAndAnything() {        
        $this->normalFormTest(
            'Bad value text/html; charset=UTF-8 for attribute content on element meta: utf-8 is not a valid character encoding name.'
        );     
    } 
    
    public function testTwitterColonSiteAndAttributeAndMetaAndAnything() {        
        $this->normalFormTest(
            'Bad value twitter:site for attribute name on element meta: Keyword twitter:site is not registered.'
        );     
    }    
    
    public function testBlankAndActionAndFormAndAnything() {        
        $this->normalFormTest(
            'Bad value  for attribute action on element form: Must be non-empty.'
        );     
    } 
    
    public function testBlankAndIdAndAAndAnything() {        
        $this->normalFormTest(
            'Bad value  for attribute id on element a: An ID must not be the empty string.'
        );     
    }
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Bad value %0 for attribute %1 on element %2: %3') {                
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }     
    
}