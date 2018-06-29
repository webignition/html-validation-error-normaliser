<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\QuotedParameters;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {

    public function testIdAltreadyDefinedOne() {
        $htmlErrorString = 'ID "\"playerbox_"+playerid+"\"" already defined';
        $expectedNormalForm = 'ID "%0" already defined';

        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }

    public function testIdAltreadyDefinedTwo() {
        $htmlErrorString = 'ID "\"contenedor_ayuda\"" already defined';
        $expectedNormalForm = 'ID "%0" already defined';

        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }

    public function testCharacterBlankIsNotAllowedInTheValueOfAttributeXOne() {
        $htmlErrorString = 'character """ is not allowed in the value of attribute "id"';
        $expectedNormalForm = 'character "%0" is not allowed in the value of attribute "%1"';

        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }

    public function testCharacterBlankIsNotAllowedInTheValueOfAttributeXTwo() {
        $htmlErrorString = 'character "a" is not allowed in the value of attribute "foo"';
        $expectedNormalForm = 'character "%0" is not allowed in the value of attribute "%1"';

        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }

    public function testElementXUndefined() {
        $htmlErrorString = 'Element "Variable" undefined';
        $expectedNormalForm = 'Element "%0" undefined';

        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }
}