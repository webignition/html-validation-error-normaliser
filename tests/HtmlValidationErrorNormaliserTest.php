<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests;

use webignition\HtmlValidationErrorNormaliser\HtmlValidationErrorNormaliser;
use webignition\HtmlValidationErrorNormaliser\NormalisedError;
use webignition\HtmlValidationErrorNormaliser\Result;
use webignition\HtmlValidationErrorNormaliser\Tests\DataProvider\NoNormalFormDataProviderTrait;
use webignition\HtmlValidationErrorNormaliser\Tests\DataProvider\PatternBasedNormalisedFormDataProviderTrait;

class HtmlValidationErrorNormaliserTest extends \PHPUnit_Framework_TestCase
{
    use NoNormalFormDataProviderTrait;
    use PatternBasedNormalisedFormDataProviderTrait;

    /**
     * @var HtmlValidationErrorNormaliser
     */
    private $htmlValidationErrorNormaliser;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->htmlValidationErrorNormaliser = new HtmlValidationErrorNormaliser();
    }

    /**
     * @dataProvider normaliseHasNoNormalisedFormDataProvider
     *
     * @param string $htmlErrorString
     */
    public function testNormaliseHasNoNormalisedForm($htmlErrorString)
    {
        $result = $this->htmlValidationErrorNormaliser->normalise($htmlErrorString);

        $this->assertInstanceOf(Result::class, $result);
        $this->assertFalse($result->isNormalised());
        $this->assertNull($result->getNormalisedError());
    }


    /**
     * @dataProvider normaliseHasPatternBasedNormalisedFormDataProvider
     *
     * @param string $htmlErrorString
     * @param NormalisedError $expectedNormalisedError
     */
    public function testNormaliseHasNormalisedForm($htmlErrorString, NormalisedError $expectedNormalisedError)
    {
        $result = $this->htmlValidationErrorNormaliser->normalise($htmlErrorString);

        $this->assertInstanceOf(Result::class, $result);
        $this->assertTrue($result->isNormalised());

        $this->assertEquals($expectedNormalisedError, $result->getNormalisedError());
    }
}
