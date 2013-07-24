<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\SpecialCases\UninterpretableAsUtf8;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function testXF8() {        
        $this->normalFormTest(
            '<p>
        Sorry, I am unable to validate this document because on line
        <strong>225</strong>
        it contained one or more bytes that I cannot interpret as
        <code>utf-8</code>
        (in other words, the bytes found are not valid values in the specified
        Character Encoding). Please check both the content of the file and the
        character encoding indication.
      </p>
<p>The error was: 
        utf8 "\xF8" does not map to Unicode

      </p>'
        );     
    }    
    
    public function testXBA() {        
        $this->normalFormTest(
            '<p>
        Sorry, I am unable to validate this document because on line
        <strong>316</strong>
        it contained one or more bytes that I cannot interpret as
        <code>utf-8</code>
        (in other words, the bytes found are not valid values in the specified
        Character Encoding). Please check both the content of the file and the
        character encoding indication.
      </p>
<p>The error was: 
        utf8 "\xBA" does not map to Unicode

      </p>'
        );     
    }    
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = "Unable to interpret %0 as %1 on line %2") {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}