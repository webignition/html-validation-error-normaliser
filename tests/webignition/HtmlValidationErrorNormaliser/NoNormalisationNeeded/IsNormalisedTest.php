<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NoNormalisationNeeded;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class IsNormalisedTest extends BaseTest {    

    public function testUnterminatedCommentFound() {        
        $htmlErrorString = 'unterminated comment: found end of entity inside comment';
        
        $this->assertFalse(
            $this->getNormaliser()->normalise($htmlErrorString)->isNormalised()
        );     
    }    
    
    public function testLiteralIsMissingClosingDelimiter() {        
        $htmlErrorString = 'literal is missing closing delimiter';
        
        $this->assertFalse(
            $this->getNormaliser()->normalise($htmlErrorString)->isNormalised()
        );     
    }
    
}