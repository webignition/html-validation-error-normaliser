<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;

class NormalisedErrorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var NormalisedError
     */
    private $normalisedError;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->normalisedError = new NormalisedError();
    }

    public function testConstruct()
    {
        $normalForm = 'foo %0 bar %1 foobar %3';
        $parameters = ['a', '!', '123'];

        $normalisedError = new NormalisedError($normalForm, $parameters);

        $this->assertEquals($normalForm, $normalisedError->getNormalForm());
        $this->assertEquals($parameters, $normalisedError->getParameters());
    }

    public function testGetNormalFormSetNormalForm()
    {
        $normalForm = 'foo';

        $this->assertNull($this->normalisedError->getNormalForm());

        $this->normalisedError->setNormalForm($normalForm);
        $this->assertEquals($normalForm, $this->normalisedError->getNormalForm());
    }

    /**
     * @dataProvider addParametersGetParametersDataProvider
     *
     * @param array $parameters
     */
    public function testAddParameterGetParameters(array $parameters)
    {
        foreach ($parameters as $parameter) {
            $this->normalisedError->addParameter($parameter);
        }

        $this->assertEquals($parameters, $this->normalisedError->getParameters());
    }

    /**
     * @return array
     */
    public function addParametersGetParametersDataProvider()
    {
        return [
            'none' => [
                'parameters' => [],
            ],
            'non-empty' => [
                'parameters' => [
                    'foo',
                    'bar',
                ],
            ],
        ];
    }
}
