<?php

namespace webignition\HtmlValidationErrorNormaliser;

/**
 * Take a raw HTML validation error and return a normal form
 *
 * W3C html error reference: http://validator.w3.org/docs/errors.html
 */
class HtmlValidationErrorNormaliser
{
    /**
     * @param string $htmlErrorString
     *
     * @return Result
     */
    public function normalise($htmlErrorString)
    {
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

        if (($normalisedError = $this->getQuotedParameterNormalisedError($htmlErrorString)) !== null) {
            $result->setNormalisedError($normalisedError);
            return $result;
        }

        return $result;
    }

    /**
     * @param string $htmlErrorString
     *
     * @return NormalisedError|null
     */
    private function getQuotedParameterNormalisedError($htmlErrorString)
    {
        $parameterMatches = [];
        $matchCount = preg_match_all('/"([^"]?)+"/', $htmlErrorString, $parameterMatches);

        if ($matchCount === 0) {
            return null;
        }

        $normalisedError = new NormalisedError();
        $normalisedErrorString = $htmlErrorString;

        foreach ($parameterMatches[0] as $parameterIndex => $parameterMatch) {
            $normalisedErrorString = preg_replace(
                '/' . PregQuoter::quote($parameterMatch) . '/',
                '"%'.$parameterIndex.'"',
                $normalisedErrorString,
                1
            );
            $normalisedError->addParameter(trim($parameterMatch, '"'));
        }

        $normalisedError->setNormalForm($normalisedErrorString);

        return $normalisedError;
    }

    /**
     * @param $htmlErrorString
     *
     * @return NormalisedError|bool
     */
    private function processSpecialCase($htmlErrorString)
    {
        if (substr_count($htmlErrorString, 'I am unable to validate this document')) {
            $normalForm = 'Unable to interpret %0 as %1 on line %2';

            $normalisedError = new NormalisedError();
            $normalisedError->setNormalForm($normalForm);

            $byteMatches = [];
            preg_match('/".+"/', $htmlErrorString, $byteMatches);

            $normalisedError->addParameter($byteMatches[0]);

            $encodingMatches = [];
            preg_match('/<code>.+<\/code>/', $htmlErrorString, $encodingMatches);

            $normalisedError->addParameter(str_replace([
                '<code>',
                '</code>'
            ], '', $encodingMatches[0]));

            $lineMatches = [];
            preg_match('/<strong>[0-9]+<\/strong>/', $htmlErrorString, $lineMatches);

            $normalisedError->addParameter(str_replace([
                '<strong>',
                '</strong>'
            ], '', $lineMatches[0]));

            return $normalisedError;
        }

        return false;
    }
}
