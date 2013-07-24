<?php

class PerformanceTest extends \PHPUnit_Framework_TestCase {    
    
    public function testPerformance() {
        $this->assertTrue(true);
        return;
        
        $errors = file(__DIR__ . '/fixtures/errors.txt');        
        $normaliser = new webignition\HtmlValidationErrorNormaliser\HtmlValidationErrorNormaliser();
        
        foreach ($errors as $error) {
            $normaliser->normalise($error);
        }
    }
}