<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NoNormalisationNeeded;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class IsNormalisedTest extends BaseTest {    

    public function testUnterminatedCommentFound() {        
        $this->noNormalisationNeededTest('unterminated comment: found end of entity inside comment'); 
    }    
    
    public function testLiteralIsMissingClosingDelimiter() {        
        $this->noNormalisationNeededTest('literal is missing closing delimiter');
    }
    

    public function testCharacterDataIsNotAllowedHere() {        
        $this->noNormalisationNeededTest('character data is not allowed here');     
    }   
    
    private function noNormalisationNeededTest($htmlErrorString) {        
        $this->assertFalse(
            $this->getNormaliser()->normalise($htmlErrorString)->isNormalised()
        );            
    }
    
}