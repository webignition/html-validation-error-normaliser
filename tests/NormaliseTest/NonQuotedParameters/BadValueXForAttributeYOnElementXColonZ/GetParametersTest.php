<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\BadValueXForAttributeYOnElementXColonZ;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {
    
    public function testArchivesAndRelAndLinkAndAnything() {        
        $this->parametersTest(
            'Bad value archives for attribute rel on element link: Not an absolute IRI. The string archives is not a registered keyword or absolute URL.',
             array(
                 'archives',
                 'rel',
                 'link',
                 'Not an absolute IRI. The string archives is not a registered keyword or absolute URL.'
            )
        );   
    } 
    
    public function testUtf8AndCharsetAndScriptAndAnything() {        
        $this->parametersTest(
            'Bad value utf-8 for attribute charset on element script: utf-8 is not a valid character encoding name.',
             array(
                 'utf-8',
                 'charset',
                 'script',
                 'utf-8 is not a valid character encoding name.'
            )
        );   
    }     
    
    public function testCategoryTagAndRelAndAAndAnything() {        
        $this->parametersTest(
            'Bad value category tag for attribute rel on element a: The string category is not a registered keyword or absolute URL. Whitespace in path component. Use %20 in place of spaces.',
             array(
                 'category tag',
                 'rel',
                 'a',
                 'The string category is not a registered keyword or absolute URL. Whitespace in path component. Use %20 in place of spaces.'
            )
        );  
    }
    
    public function testGarbageAndContentAndMetaAndAnything() {        
        $this->parametersTest(
            'Bad value text/html; charset=UTF-8 for attribute content on element meta: utf-8 is not a valid character encoding name.',
             array(
                 'text/html; charset=UTF-8',
                 'content',
                 'meta',
                 'utf-8 is not a valid character encoding name.'
            )
        );   
    } 
    
    public function testTwitterColonSiteAndAttributeAndMetaAndAnything() {        
        $this->parametersTest(
            'Bad value twitter:site for attribute name on element meta: Keyword twitter:site is not registered.',
             array(
                 'twitter:site',
                 'name',
                 'meta',
                 'Keyword twitter:site is not registered.'
            )
        );    
    } 
    
    
    public function testBlankAndActionAndFormAndAnything() {        
        $this->parametersTest(
            'Bad value  for attribute action on element form: Must be non-empty.',
             array(
                 '',
                 'action',
                 'form',
                 'Must be non-empty.'
            )
        );     
    } 
    
    public function testBlankAndIdAndAAndAnything() {        
        $this->parametersTest(
            'Bad value  for attribute id on element a: An ID must not be the empty string.',
             array(
                 '',
                 'id',
                 'a',
                 'An ID must not be the empty string.'
            )
        );     
    } 
    
    public function testUrlAndSrcAndImgAndAnything() {        
        $this->parametersTest(
            "Bad value //googleads.g.doubleclick.net/pagead/viewthroughconversion/1024448116/?value=0&label=KY1O\nCKz58AIQ9Ky_6AM&guid=ON&script=0 for attribute src on element img: Control character in query component.",
             array(
                 "//googleads.g.doubleclick.net/pagead/viewthroughconversion/1024448116/?value=0&label=KY1O\nCKz58AIQ9Ky_6AM&guid=ON&script=0",
                 'src',
                 'img',
                 'Control character in query component.'
            )
        );     
    }  
    
}