<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests;

use webignition\HtmlValidationErrorNormaliser\HtmlValidationErrorNormaliser;

class TestTest extends \PHPUnit_Framework_TestCase {    

    public function testTest() {
        $htmlValidationNormaliser = new HtmlValidationErrorNormaliser();
        $this->assertInstanceOf('webignition\HtmlValidationErrorNormaliser\HtmlValidationErrorNormaliser', $htmlValidationNormaliser);
    }    
    
}