<?php

namespace webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;

/**
 * Take a raw HTML validation error and return a normal form
 *
 * W3C html error reference: http://validator.w3.org/docs/errors.html
 */
class HtmlValidationErrorNormaliser {


    /**
     *
     * @param string $htmlErrorString
     * @return array
     */
    public function normalise($htmlErrorString) {
        $result = new Result();
        $result->setRawError(trim($htmlErrorString));

        if (($normalisedError = $this->processSpecialCase($htmlErrorString)) !== false) {
            $result->setNormalisedError($normalisedError);
            return $result;
        }

        $patternBasedNormaliser = new PatternBasedNormaliser();
        if (($normalisedError = $patternBasedNormaliser->normalise($htmlErrorString)) !== null) {
            $result->setNormalisedError($normalisedError);
            return $result;
        }

        if (($normalisedError = $this->getQuotedParameterNormalisedError($htmlErrorString)) !== false) {
            $result->setNormalisedError($normalisedError);
            return $result;
        }

        return $result;
    }


    private function getQuotedParameterNormalisedError($htmlErrorString) {
        $parameterMatches = array();
        $matchCount = preg_match_all('/"([^"]?)+"/', $htmlErrorString, $parameterMatches);

        if ($matchCount === 0) {
            return false;
        }

        $normalisedError = new NormalisedError();
        $normalisedErrorString = $htmlErrorString;

        foreach ($parameterMatches[0] as $parameterIndex => $parameterMatch) {
            $normalisedErrorString = preg_replace('/'.$this->preg_quote($parameterMatch).'/', '"%'.$parameterIndex.'"', $normalisedErrorString, 1);
            $normalisedError->addParameter(trim($parameterMatch, '"'));
        }

        $normalisedError->setNormalForm($normalisedErrorString);

        return $normalisedError;
    }

    private function preg_quote($value) {
        $escapedValue = preg_quote($value);
        if (substr_count($escapedValue, '/') && !substr_count($escapedValue, '\/')) {
            $escapedValue = str_replace('/', '\/', $escapedValue);
        }

        return $escapedValue;
    }


    /**
     *
     * @param string $htmlErrorString
     * @return boolean
     */
    private function isSpecialCase($htmlErrorString) {
        if (substr_count($htmlErrorString, 'I am unable to validate this document')) {
            return true;
        }

        return false;
    }

    private function processSpecialCase($htmlErrorString) {
        if (substr_count($htmlErrorString, 'I am unable to validate this document')) {
            $normalForm = 'Unable to interpret %0 as %1 on line %2';

            $normalisedError = new NormalisedError();
            $normalisedError->setNormalForm($normalForm);

            $byteMatches = array();
            preg_match('/".+"/', $htmlErrorString, $byteMatches);

            $normalisedError->addParameter($byteMatches[0]);

            $encodingMatches = array();
            preg_match('/<code>.+<\/code>/', $htmlErrorString, $encodingMatches);

            $normalisedError->addParameter(str_replace(array(
                '<code>',
                '</code>'
            ), '', $encodingMatches[0]));

            $lineMatches = array();
            preg_match('/<strong>[0-9]+<\/strong>/', $htmlErrorString, $lineMatches);

            $normalisedError->addParameter(str_replace(array(
                '<strong>',
                '</strong>'
            ), '', $lineMatches[0]));

            return $normalisedError;
        }

        return false;
    }



}