<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\Result;

use webignition\HtmlValidationErrorNormaliser\Result;
use webignition\HtmlValidationErrorNormaliser\NormalisedError;

class IsNormalisedTest extends \PHPUnit_Framework_TestCase {    

    public function testResultWithNormalisedErrorIsNormalised() {        
        $result = new Result();
        $result->setNormalisedError(new NormalisedError());
        
        $this->assertTrue($result->isNormalised());     
    }
    
    public function testResultWithoutNormalisedErrorIsNotNormalised() {        
        $result = new Result();        
        $this->assertFalse($result->isNormalised());     
    }    
    
}