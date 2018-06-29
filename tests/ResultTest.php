<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;
use webignition\HtmlValidationErrorNormaliser\Result;

class ResultTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Result
     */
    private $result;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $this->result = new Result();
    }

    public function testGetRawErrorSetRawError()
    {
        $rawError = 'foo';

        $this->assertNull($this->result->getRawError());

        $this->result->setRawError($rawError);
        $this->assertEquals($rawError, $this->result->getRawError());
    }

    public function testGetNormalisedErrorSetNormalisedError()
    {
        $normalisedError = new NormalisedError();

        $this->assertNull($this->result->getNormalisedError());

        $this->result->setNormalisedError($normalisedError);
        $this->assertEquals($normalisedError, $this->result->getNormalisedError());
    }

    public function testIsNormalised()
    {
        $normalisedError = new NormalisedError();

        $this->assertFalse($this->result->isNormalised());

        $this->result->setNormalisedError($normalisedError);
        $this->assertTrue($this->result->isNormalised());
    }
}
