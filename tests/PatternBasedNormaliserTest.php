<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;
use webignition\HtmlValidationErrorNormaliser\PatternBasedNormaliser;
use webignition\HtmlValidationErrorNormaliser\Tests\DataProvider\PatternBasedNormalisedFormDataProviderTrait;

class PatternBasedNormaliserTest extends \PHPUnit_Framework_TestCase
{
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
     * @return array
     */
    public function normaliseHasNoNormalisedFormDataProvider()
    {
        return [
            'empty' => [
                'htmlErrorString' => '',
            ],
            'no normalisation needed [0]' => [
                'htmlErrorString' => 'unterminated comment: found end of entity inside comment',
            ],
            'no normalisation needed [1]' => [
                'htmlErrorString' => 'literal is missing closing delimiter',
            ],
            'no normalisation needed [2]' => [
                'htmlErrorString' => 'character data is not allowed here',
            ],
        ];
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
