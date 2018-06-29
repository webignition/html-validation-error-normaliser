<?php

namespace webignition\HtmlValidationErrorNormaliser;

/**
 * Models the result of trying to normalise a HTML validation error
 */
class Result
{
    /**
     * Original HTML validation error non-normalised
     *
     * @var string
     */
    private $rawError;

    /**
     * @var NormalisedError
     */
    private $normalisedError;

    /**
     * @return bool
     */
    public function isNormalised()
    {
        return !is_null($this->normalisedError);
    }

    /**
     * @param string $rawError
     */
    public function setRawError($rawError)
    {
        $this->rawError = $rawError;
    }

    /**
     * @return string
     */
    public function getRawError()
    {
        return $this->rawError;
    }

    /**
     * @param NormalisedError $normalisedError
     */
    public function setNormalisedError(NormalisedError $normalisedError)
    {
        $this->normalisedError = $normalisedError;
    }

    /**
     * @return NormalisedError
     */
    public function getNormalisedError()
    {
        return $this->normalisedError;
    }
}
