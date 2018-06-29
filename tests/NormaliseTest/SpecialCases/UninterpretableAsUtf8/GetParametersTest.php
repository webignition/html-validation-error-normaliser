<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\SpecialCases\UninterpretableAsUtf8;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {      
    
    public function testXF8() {        
       $this->parametersTest(
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

      </p>',
             array(
                '"\xF8"',
                 'utf-8',
                 '225'
            )
        );    
    }    
    
    public function testXBA() {        
       $this->parametersTest(
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

      </p>',
             array(
                '"\xBA"',
                 'utf-8',
                 '316'
            )
        );   
    }  
    
}