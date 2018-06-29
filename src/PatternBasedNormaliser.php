<?php

namespace webignition\HtmlValidationErrorNormaliser;

class PatternBasedNormaliser
{
    /**
     * @var array
     */
    private $html5ErrorPatterns = [
        [
            'Attribute ',
            '{{token_0}}',
            ' not allowed on element ',
            '{{token_1}}',
            ' at this point.'
        ],
        [
            'document type does not allow element "',
            '{{token_0}}"',
            '" here; missing one of ',
            '{{token_1}}',
            ' start-tag'
        ],
        [
            'Element ',
            '{{token_0}}',
            ' not allowed as child of element ',
            '{{token_1}}',
            ' in this context. (Suppressing further errors from this subtree.)'
        ],
        [
            'Bad value ',
            '{{token_0}}',
            ' for attribute ',
            '{{token_1}}',
            ' on element ',
            '{{token_2}}',
            ': ',
            '{{token_3}}'
        ],
        [
            'ID "',
            '{{token_0}}"',
            '" already defined'
        ],
        [
            'The ',
            '{{token_0}}',
            ' attribute on the ',
            '{{token_1}}',
            ' element is obsolete. Use CSS instead.'
        ],
        [
            'No ',
            '{{token_0}}',
            ' element in scope but a ',
            '{{token_1}}',
            ' end tag seen.'
        ],
        [
            'Duplicate ID ',
            '{{token_0}}',
            '.'
        ],
        [
            'Duplicate attribute ',
            '{{token_0}}',
            '.'
        ],
        [
            'Stray end tag ',
            '{{token_0}}',
            '.'
        ],
        [
            'character "',
            '{{token_0}}"',
            '" is not allowed in the value of attribute "',
            '{{token_1}}',
            '"'
        ],
        [
            'value of attribute "',
            '{{token_0}}',
            '" cannot be "',
            '{{token_1}}',
            '"; must be one of ',
            '{{token_2}}'
        ],
        [
            'Bad value ',
            '{{token_0}}',
            ' for attribute ',
            '{{token_1}}',
            ' on element ',
            '{{token_2}}',
            '.'
        ],
        [
            'Element ',
            '{{token_0}}',
            ' must not have attribute ',
            '{{token_1}}',
            ' unless attribute ',
            '{{token_2}}',
            ' is also specified.'
        ],
        [
            'The ',
            '{{token_0}}',
            ' element is obsolete. Use CSS instead.',
        ],
        [
            'Element ',
            '{{token_0}}',
            ' is missing required attribute ',
            '{{token_1}}',
            '.'
        ],
        [
            'Unclosed element ',
            '{{token_0}}',
            '.'
        ],
        [
            'End tag ',
            '{{token_0}}',
            ' seen, but there were open elements.'
        ],
        [
            'End tag for  ',
            '{{token_0}}',
            ' seen, but there were unclosed elements.'
        ],
        [
            'An ',
            '{{token_0}}',
            ' start tag seen but an element of the same type was already open.'
        ],
        [
            'Bad value ',
            '{{token_0}}',
            ' for attribute ',
            '{{token_1}}',
            ' on XHTML element ',
            '{{token_2}}',
            ': ',
            '{{token_3}}'
        ],
        [
            'Bad value ',
            '{{token_0}}',
            ' for attribute ',
            '{{token_1}}',
            ' on XHTML element ',
            '{{token_2}}',
            '.'
        ],
        [
            'Element ',
            '{{token_0}}',
            ' is missing a required instance of child element ',
            '{{token_1}}',
            '.'
        ],
        [
            'XHTML element ',
            '{{token_0}}',
            ' not allowed as child of XHTML element ',
            '{{token_1}}',
            ' in this context. (Suppressing further errors from this subtree.)'
        ],
        [
            'End tag ',
            '{{token_0}}',
            '.'
        ],
        [
            'Attribute ',
            '{{token_0}}',
            ' not allowed here.'
        ],
        [
            'Stray start tag ',
            '{{token_0}}',
            '.'
        ],
        [
            'Couldn\'t find end of Start Tag ',
            '{{token_0}}',
            ' line ',
            '{{token_1}}',
        ],
        [
            'Opening and ending tag mismatch: ',
            '{{token_0}}',
            ' line ',
            '{{token_1}}',
            ' and ',
            '{{token_2}}',
        ],
        [
            'Forbidden code point ',
            '{{token_0}}',
            '.'
        ],
        [
            'non SGML character number ',
            '{{token_0}}'
        ],
        [
            'required character (found ',
            '{{token_0}}',
            ') (expected ',
            '{{token_1}}',
            ')'
        ],
        [
            'Bad start tag in ',
            '{{token_0}}',
            ' in ',
            '{{token_1}}',
            '.'
        ],
        [
            'Not a name start character, ',
            '{{token_0}}'
        ],
        [
            'Element ',
            '{{token_0}}',
            ' is missing one or more of the following attributes: ',
            '{{token_1}}',
            '.'
        ],
        [
            'Row ',
            '{{token_0}}',
            ' of a row group established by a tbody element has no cells beginning on it.'
        ],
        [
            'Start tag ',
            '{{token_0}}',
            ' seen in ',
            '{{token_1}}',
            '.'
        ],
        [
            'The element ',
            '{{token_0}}',
            ' must not appear as a descendant of the ',
            '{{token_1}}',
            ' element.'
        ],
        [
            'Text not allowed in element ',
            '{{token_0}}',
            ' in this context.'
        ],
        [
            'reference to undeclared general entity ',
            '{{token_0}}'
        ],
        [
            'The name attribute on the ',
            '{{token_0}}',
            ' element is obsolete. Use the id attribute instead.'
        ],
        [
            'Attribute ',
            '{{token_0}}',
            ' not allowed on XHTML element ',
            '{{token_1}}',
            ' at this point.',
        ],
        [
            'Bad character ',
            '{{token_0}}',
            ' after <. Probable cause: Unescaped <. Try escaping it as &lt;.',
        ],
    ];

    /**
     * @var array
     */
    private $preg_cache = [];

    /**
     * @param string $htmlErrorString
     *
     * @return NormalisedError|null
     */
    public function normalise($htmlErrorString)
    {
        foreach ($this->html5ErrorPatterns as $pattern) {
            if (($normalisedError = $this->getFromHtml5Pattern($htmlErrorString, $pattern)) !== null) {
                return $normalisedError;
            }
        }

        return null;
    }

    /**
     * @param string $htmlErrorString
     * @param string[] $pattern
     *
     * @return NormalisedError|null
     */
    private function getFromHtml5Pattern($htmlErrorString, $pattern)
    {
        if ($this->matches($htmlErrorString, $pattern)) {
            $matches = $this->pregMatch($htmlErrorString, $pattern);
            if ($matches === false) {
                return null;
            }

            $parameters = $this->getParametersFromMatchString($matches[0], $pattern);

            $normalisedError = new NormalisedError();
            $normalisedError->setNormalForm($this->getNormalForm($pattern));
            foreach ($parameters as $parameter) {
                $normalisedError->addParameter($parameter);
            }

            return $normalisedError;
        }

        return null;
    }

    /**
     * @param string[] $pattern
     *
     * @return string
     */
    private function getNormalForm($pattern)
    {
        $normalForm = '';
        $parameterIndex = 0;

        foreach ($pattern as $part) {
            if ($this->isTokenPatternPart($part)) {
                $normalForm .= '%' . $parameterIndex;
                $parameterIndex++;
            } else {
                $normalForm .= $part;
            }
        }

        return $normalForm;
    }

    /**
     * @param string $matchString
     * @param string[] $pattern
     *
     * @return array
     */
    private function getMatchStringParameterIndices($matchString, $pattern)
    {
        $indices = array();

        foreach ($pattern as $part) {
            if (!$this->isTokenPatternPart($part)) {
                $offset = 0;

                foreach ($indices as $currentIndex) {
                    if ($currentIndex['prefix'] == $part || substr_count($currentIndex['prefix'], $part) || substr_count($part, $currentIndex['prefix'])) {
                        $offset = $currentIndex['index'];
                    }
                }

                $indices[] = array(
                    'prefix' => $part,
                    'index' => strpos($matchString, $part, $offset) + strlen($part)
                );
            }
        }

        return $indices;
    }

    /**
     * @param string $matchString
     * @param string[] $pattern
     *
     * @return string[]
     */
    private function getParametersFromMatchString($matchString, $pattern)
    {
        $parameters = [];
        $parameterIndices = $this->getMatchStringParameterIndices($matchString, $pattern);

        foreach ($parameterIndices as $position => $parameterIndex) {
            $start = $parameterIndex['index'];
            $foo = $position + 1;

            if (isset($parameterIndices[$position + 1])) {
                $length = $parameterIndices[$foo]['index'] - $start - strlen($parameterIndices[$foo]['prefix']);

                $parameters[] = substr($matchString, $start, $length);
            } else {
                $parameter = substr($matchString, $start);
                if ($parameter !== false) {
                    $parameters[] = $parameter;
                }
            }
        }

        return $parameters;
    }

    /**
     * @param string $htmlErrorString
     * @param string[] $pattern
     *
     * @return bool|mixed
     */
    private function matches($htmlErrorString, $pattern)
    {
        if ($this->simpleMatchRejection($htmlErrorString, $pattern) === false) {
            return false;
        }

        return $this->pregMatch($htmlErrorString, $pattern);
    }

    /**
     * @param string $htmlErrorString
     * @param string[] $pattern
     *
     * @return mixed
     */
    private function pregMatch($htmlErrorString, $pattern)
    {
        $key = md5($htmlErrorString . implode('', $pattern));

        if (!isset($this->preg_cache[$key])) {
            $matches = array();
            $matchCount = preg_match($this->getRegexPatternFromHtmlErrorPattern($pattern), $htmlErrorString, $matches);

            $this->preg_cache[$key] = ($matchCount === 0) ? false : $matches;
        }

        return $this->preg_cache[$key];
    }

    /**
     * @param string $htmlErrorString
     * @param string[] $pattern
     *
     * @return bool|null
     */
    private function simpleMatchRejection($htmlErrorString, $pattern)
    {
        foreach ($pattern as $part) {
            if (!$this->isTokenPatternPart($part)) {
                if (substr_count($htmlErrorString, $part) === 0) {
                    return false;
                }
            }
        }

        return null;
    }

    /**
     * @param string[] $pattern
     *
     * @return string
     */
    private function getRegexPatternFromHtmlErrorPattern($pattern)
    {
        $regexPattern = '';

        foreach ($pattern as $part) {
            if ($this->isTokenPatternPart($part)) {
                $regexPattern .= '.*';
            } else {
                $regexPattern .= PregQuoter::quote($part);
            }
        }

        return '/' . $regexPattern . '/is';
    }

    /**
     * @param string $part
     *
     * @return bool
     */
    private function isTokenPatternPart($part)
    {
        return preg_match('/{{(token)_[0-9]+}}/', $part) > 0;
    }
}
