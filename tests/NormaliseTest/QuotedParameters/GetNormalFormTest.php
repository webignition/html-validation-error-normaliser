<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\QuotedParameters;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {

    public function testElementXUndefined() {
        $htmlErrorString = 'Element "Variable" undefined';
        $expectedNormalForm = 'Element "%0" undefined';

        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }
}