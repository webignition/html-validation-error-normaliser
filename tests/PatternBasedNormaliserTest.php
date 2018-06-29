<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;
use webignition\HtmlValidationErrorNormaliser\PatternBasedNormaliser;
use webignition\HtmlValidationErrorNormaliser\Tests\DataProvider\NoNormalFormDataProviderTrait;
use webignition\HtmlValidationErrorNormaliser\Tests\DataProvider\PatternBasedNormalisedFormDataProviderTrait;

class PatternBasedNormaliserTest extends \PHPUnit_Framework_TestCase
{
    use NoNormalFormDataProviderTrait;
    use PatternBasedNormalisedFormDataProviderTrait;

    /**
     * @var PatternBasedNormaliser
     */
    private $patternBasedNormaliser;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->patternBasedNormaliser = new PatternBasedNormaliser();
    }

    /**
     * @dataProvider normaliseHasNoNormalisedFormDataProvider
     *
     * @param string $htmlErrorString
     */
    public function testNormaliseHasNoNormalisedForm($htmlErrorString)
    {
        $this->assertNull($this->patternBasedNormaliser->normalise($htmlErrorString));
    }

    /**
     * @dataProvider normaliseHasPatternBasedNormalisedFormDataProvider
     *
     * @param string $htmlErrorString
     * @param NormalisedError $expectedNormalisedError
     */
    public function testNormaliseHasNormalisedForm($htmlErrorString, NormalisedError $expectedNormalisedError)
    {
        $this->assertEquals($expectedNormalisedError, $this->patternBasedNormaliser->normalise($htmlErrorString));
    }
}
