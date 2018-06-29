<?php

namespace webignition\HtmlValidationErrorNormaliser;

/**
 * Stores a normalised HTML validation error
 */
class NormalisedError
{
    /**
     * @var string
     */
    private $normalForm;

    /**
     * Collection of parameters to place into the normal form
     * placeholders to generate the non-normal form.
     *
     * @var array
     */
    private $parameters = [];

    /**
     * @param string $normalForm
     */
    public function setNormalForm($normalForm)
    {
        $this->normalForm = $normalForm;
    }

    /**
     * @return string
     */
    public function getNormalForm()
    {
        return $this->normalForm;
    }

    /**
     * @param string $value
     */
    public function addParameter($value)
    {
        $this->parameters[] = $value;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }
}
