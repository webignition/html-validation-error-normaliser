<?php

namespace webignition\HtmlValidationErrorNormaliser;

class PregQuoter
{
    /**
     * @param string $value
     *
     * @return string
     */
    public static function quote($value)
    {
        $escapedValue = preg_quote($value);
        if (substr_count($escapedValue, '/') && !substr_count($escapedValue, '\/')) {
            $escapedValue = str_replace('/', '\/', $escapedValue);
        }

        return $escapedValue;
    }
}
