<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;
use webignition\HtmlValidationErrorNormaliser\PatternBasedNormaliser;

class PatternBasedNormaliserTest extends \PHPUnit_Framework_TestCase
{
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
     * @dataProvider normaliseHasNormalisedFormDataProvider
     *
     * @param string $htmlErrorString
     * @param NormalisedError $expectedNormalisedError
     */
    public function testNormaliseHasNormalisedForm($htmlErrorString, NormalisedError $expectedNormalisedError)
    {
        $this->assertEquals($expectedNormalisedError, $this->patternBasedNormaliser->normalise($htmlErrorString));
    }

    /**
     * @return array
     */
    public function normaliseHasNormalisedFormDataProvider()
    {
        return [
            'Attribute %0 not allowed on element %1 at this point. [0]' => [
                'htmlErrorString' => 'Attribute rel not allowed on element img at this point.',
                'expectedNormalisedError' => new NormalisedError(
                    'Attribute %0 not allowed on element %1 at this point.',
                    [
                        'rel',
                        'img',
                    ]
                ),
            ],
            'Attribute %0 not allowed on element %1 at this point. [1]' => [
                'htmlErrorString' => 'Attribute serif\? not allowed on element font at this point.',
                'expectedNormalisedError' => new NormalisedError(
                    'Attribute %0 not allowed on element %1 at this point.',
                    [
                        'serif\?',
                        'font',
                    ]
                ),
            ],
            'document type does not allow element "%0" here; missing one of %1 start-tag' => [
                'htmlErrorString' => 'document type does not allow element "p" here; '
                    .'missing one of "object", "ins", "del", "map", "button" start-tag',
                'expectedNormalisedError' => new NormalisedError(
                    'document type does not allow element "%0" here; missing one of %1 start-tag',
                    [
                        'p',
                        '"object", "ins", "del", "map", "button"',
                    ]
                ),
            ],
            'Element %0 not allowed as child of element %1 in this context. [0]' => [
                'htmlErrorString' => 'Element g:plus not allowed as child of element div in this context. '
                    .'(Suppressing further errors from this subtree.)',
                'expectedNormalisedError' => new NormalisedError(
                    'Element %0 not allowed as child of element %1 in this context. '
                    .'(Suppressing further errors from this subtree.)',
                    [
                        'g:plus',
                        'div',
                    ]
                ),
            ],
            'Element %0 not allowed as child of element %1 in this context. [1]' => [
                'htmlErrorString' => 'Element li not allowed as child of element nav in this context. '
                    .'(Suppressing further errors from this subtree.)',
                'expectedNormalisedError' => new NormalisedError(
                    'Element %0 not allowed as child of element %1 in this context. '
                    .'(Suppressing further errors from this subtree.)',
                    [
                        'li',
                        'nav',
                    ]
                ),
            ],
            'Bad value %0 for attribute %1 on element %2: %3 [0]' => [
                'htmlErrorString' => 'Bad value twipsy for attribute rel on element a: '
                    .'The string twipsy is not a registered keyword or absolute URL.',
                'expectedNormalisedError' => new NormalisedError(
                    'Bad value %0 for attribute %1 on element %2: %3',
                    [
                        'twipsy',
                        'rel',
                        'a',
                        'The string twipsy is not a registered keyword or absolute URL.',
                    ]
                ),
            ],
            'Bad value %0 for attribute %1 on element %2: %3 [1]' => [
                'htmlErrorString' => 'Bad value 180px for attribute width on element img: '
                    .'Expected a digit but saw p instead.',
                'expectedNormalisedError' => new NormalisedError(
                    'Bad value %0 for attribute %1 on element %2: %3',
                    [
                        '180px',
                        'width',
                        'img',
                        'Expected a digit but saw p instead.',
                    ]
                ),
            ],
            'ID "%0" already defined' => [
                'htmlErrorString' => 'ID "nav" already defined',
                'expectedNormalisedError' => new NormalisedError(
                    'ID "%0" already defined',
                    [
                        'nav',
                    ]
                ),
            ],
            'The %0 attribute on the %1 element is obsolete. Use CSS instead.' => [
                'htmlErrorString' => 'The width attribute on the hr element is obsolete. Use CSS instead.',
                'expectedNormalisedError' => new NormalisedError(
                    'The %0 attribute on the %1 element is obsolete. Use CSS instead.',
                    [
                        'width',
                        'hr',
                    ]
                ),
            ],
            'No %0 element in scope but a %1 end tag seen.' => [
                'htmlErrorString' => 'No dt element in scope but a dt end tag seen.',
                'expectedNormalisedError' => new NormalisedError(
                    'No %0 element in scope but a %1 end tag seen.',
                    [
                        'dt',
                        'dt',
                    ]
                ),
            ],
            'Duplicate ID %0' => [
                'htmlErrorString' => 'Duplicate ID logo.',
                'expectedNormalisedError' => new NormalisedError(
                    'Duplicate ID %0.',
                    [
                        'logo',
                    ]
                ),
            ],
            'Duplicate attribute %0' => [
                'htmlErrorString' => 'Duplicate attribute rel.',
                'expectedNormalisedError' => new NormalisedError(
                    'Duplicate attribute %0.',
                    [
                        'rel',
                    ]
                ),
            ],
            'Stray end tag %0' => [
                'htmlErrorString' => 'Stray end tag div.',
                'expectedNormalisedError' => new NormalisedError(
                    'Stray end tag %0.',
                    [
                        'div',
                    ]
                ),
            ],
            'character "%0" is not allowed in the value of attribute "%1"' => [
                'htmlErrorString' => 'character "/" is not allowed in the value of attribute "id"',
                'expectedNormalisedError' => new NormalisedError(
                    'character "%0" is not allowed in the value of attribute "%1"',
                    [
                        '/',
                        'id',
                    ]
                ),
            ],
            'value of attribute "%0" cannot be "%1"; must be one of %2' => [
                'htmlErrorString' => 'value of attribute "method" cannot be "POST"; must be one of "get", "post"',
                'expectedNormalisedError' => new NormalisedError(
                    'value of attribute "%0" cannot be "%1"; must be one of %2',
                    [
                        'method',
                        'POST',
                        '"get", "post"',
                    ]
                ),
            ],
            'Bad value %0 for attribute %1 on element %2.' => [
                'htmlErrorString' => 'Bad value X-UA-Compatible for attribute http-equiv on element meta.',
                'expectedNormalisedError' => new NormalisedError(
                    'Bad value %0 for attribute %1 on element %2.',
                    [
                        'X-UA-Compatible',
                        'http-equiv',
                        'meta',
                    ]
                ),
            ],
            'Element %0 must not have attribute %1 unless attribute %2 is also specified.' => [
                'htmlErrorString' => 'Element script must not have attribute charset unless attribute src is '
                    .'also specified.',
                'expectedNormalisedError' => new NormalisedError(
                    'Element %0 must not have attribute %1 unless attribute %2 is also specified.',
                    [
                        'script',
                        'charset',
                        'src',
                    ]
                ),
            ],
            'The %0 element is obsolete. Use CSS instead.' => [
                'htmlErrorString' => 'The center element is obsolete. Use CSS instead.',
                'expectedNormalisedError' => new NormalisedError(
                    'The %0 element is obsolete. Use CSS instead.',
                    [
                        'center',
                    ]
                ),
            ],
            'Element %0 is missing required attribute %1.' => [
                'htmlErrorString' => 'Element link is missing required attribute href.',
                'expectedNormalisedError' => new NormalisedError(
                    'Element %0 is missing required attribute %1.',
                    [
                        'link',
                        'href',
                    ]
                ),
            ],
            'Unclosed element %0.' => [
                'htmlErrorString' => 'Unclosed element font.',
                'expectedNormalisedError' => new NormalisedError(
                    'Unclosed element %0.',
                    [
                        'font',
                    ]
                ),
            ],
            'End tag for  %0 seen, but there were unclosed elements.' => [
                'htmlErrorString' => 'End tag for  html seen, but there were unclosed elements.',
                'expectedNormalisedError' => new NormalisedError(
                    'End tag for  %0 seen, but there were unclosed elements.',
                    [
                        'html',
                    ]
                ),
            ],
            'An %0 start tag seen but an element of the same type was already open.' => [
                'htmlErrorString' => 'An head start tag seen but an element of the same type was already open.',
                'expectedNormalisedError' => new NormalisedError(
                    'An %0 start tag seen but an element of the same type was already open.',
                    [
                        'head',
                    ]
                ),
            ],
            'Bad value %0 for attribute %1 on XHTML element %2.' => [
                'htmlErrorString' => 'Bad value X-UA-Compatible for attribute http-equiv on XHTML element meta.',
                'expectedNormalisedError' => new NormalisedError(
                    'Bad value %0 for attribute %1 on XHTML element %2.',
                    [
                        'X-UA-Compatible',
                        'http-equiv',
                        'meta',
                    ]
                ),
            ],
            'Bad value %0 for attribute %1 on XHTML element %2: Keyword %3 is not registered.' => [
                'htmlErrorString' => 'Bad value omni_page for attribute name on XHTML element meta: '
                    .'Keyword omni_page is not registered.',
                'expectedNormalisedError' => new NormalisedError(
                    'Bad value %0 for attribute %1 on XHTML element %2: %3',
                    [
                        'omni_page',
                        'name',
                        'meta',
                        'Keyword omni_page is not registered.',
                    ]
                ),
            ],
            'Element %0 is missing a required instance of child element %1.' => [
                'htmlErrorString' => 'Element dl is missing a required instance of child element dd.',
                'expectedNormalisedError' => new NormalisedError(
                    'Element %0 is missing a required instance of child element %1.',
                    [
                        'dl',
                        'dd',
                    ]
                ),
            ],
            'XHTML element %0 not allowed as child of XHTML element %1 in this context.' => [
                'htmlErrorString' => 'XHTML element p not allowed as child of XHTML element br in this context. '
                    .'(Suppressing further errors from this subtree.)',
                'expectedNormalisedError' => new NormalisedError(
                    'XHTML element %0 not allowed as child of XHTML element %1 in this context. '
                    .'(Suppressing further errors from this subtree.)',
                    [
                        'p',
                        'br',
                    ]
                ),
            ],
            'End tag %0.' => [
                'htmlErrorString' => 'End tag br.',
                'expectedNormalisedError' => new NormalisedError(
                    'End tag %0.',
                    [
                        'br',
                    ]
                ),
            ],
            'Attribute %0 not allowed here.' => [
                'htmlErrorString' => 'Attribute xmlns:content not allowed here.',
                'expectedNormalisedError' => new NormalisedError(
                    'Attribute %0 not allowed here.',
                    [
                        'xmlns:content',
                    ]
                ),
            ],
            'Stray start tag %0.' => [
                'htmlErrorString' => 'Stray start tag head.',
                'expectedNormalisedError' => new NormalisedError(
                    'Stray start tag %0.',
                    [
                        'head',
                    ]
                ),
            ],
            'Couldn\'t find end of Start Tag %0 line %1' => [
                'htmlErrorString' => 'Couldn\'t find end of Start Tag input line 164',
                'expectedNormalisedError' => new NormalisedError(
                    'Couldn\'t find end of Start Tag %0 line %1',
                    [
                        'input',
                        '164',
                    ]
                ),
            ],
            'Opening and ending tag mismatch: %0 line %1 and %2' => [
                'htmlErrorString' => 'Opening and ending tag mismatch: div line 209 and a',
                'expectedNormalisedError' => new NormalisedError(
                    'Opening and ending tag mismatch: %0 line %1 and %2',
                    [
                        'div',
                        '209',
                        'a',
                    ]
                ),
            ],
            'Forbidden code point %0.' => [
                'htmlErrorString' => 'Forbidden code point U+0003.',
                'expectedNormalisedError' => new NormalisedError(
                    'Forbidden code point %0.',
                    [
                        'U+0003',
                    ]
                ),
            ],
            'non SGML character number %0' => [
                'htmlErrorString' => 'non SGML character number 148',
                'expectedNormalisedError' => new NormalisedError(
                    'non SGML character number %0',
                    [
                        '148',
                    ]
                ),
            ],
            'required character (found %0) (expected %1)' => [
                'htmlErrorString' => 'required character (found h) (expected m)',
                'expectedNormalisedError' => new NormalisedError(
                    'required character (found %0) (expected %1)',
                    [
                        'h',
                        'm',
                    ]
                ),
            ],
            'Bad start tag in %0 in %1.' => [
                'htmlErrorString' => 'Bad start tag in img in head.',
                'expectedNormalisedError' => new NormalisedError(
                    'Bad start tag in %0 in %1.',
                    [
                        'img',
                        'head',
                    ]
                ),
            ],
            'Not a name start character, %0' => [
                'htmlErrorString' => 'Not a name start character, U+5c',
                'expectedNormalisedError' => new NormalisedError(
                    'Not a name start character, %0',
                    [
                        'U+5c',
                    ]
                ),
            ],
            'Element %0 is missing one or more of the following attributes: %1.' => [
                'htmlErrorString' => 'Element object is missing one or more of the following attributes: data, type.',
                'expectedNormalisedError' => new NormalisedError(
                    'Element %0 is missing one or more of the following attributes: %1.',
                    [
                        'object',
                        'data, type',
                    ]
                ),
            ],
            'Row %0 of a row group established by a tbody element has no cells beginning on it.' => [
                'htmlErrorString' => 'Row 2 of a row group established by a tbody element has no cells '
                    .'beginning on it.',
                'expectedNormalisedError' => new NormalisedError(
                    'Row %0 of a row group established by a tbody element has no cells beginning on it.',
                    [
                        '2',
                    ]
                ),
            ],
            'Start tag %0 seen in %1.' => [
                'htmlErrorString' => 'Start tag h3 seen in table.',
                'expectedNormalisedError' => new NormalisedError(
                    'Start tag %0 seen in %1.',
                    [
                        'h3',
                        'table',
                    ]
                ),
            ],
            'The element %0 must not appear as a descendant of the %1 element.' => [
                'htmlErrorString' => 'The element h2 must not appear as a descendant of the th element.',
                'expectedNormalisedError' => new NormalisedError(
                    'The element %0 must not appear as a descendant of the %1 element.',
                    [
                        'h2',
                        'th',
                    ]
                ),
            ],
            'Text not allowed in element %0 in this context.' => [
                'htmlErrorString' => 'Text not allowed in element figure in this context.',
                'expectedNormalisedError' => new NormalisedError(
                    'Text not allowed in element %0 in this context.',
                    [
                        'figure',
                    ]
                ),
            ],
            'reference to undeclared general entity %0' => [
                'htmlErrorString' => 'reference to undeclared general entity lsquo',
                'expectedNormalisedError' => new NormalisedError(
                    'reference to undeclared general entity %0',
                    [
                        'lsquo',
                    ]
                ),
            ],
            'The name attribute on the %0 element is obsolete. Use the id attribute instead.' => [
                'htmlErrorString' => 'The name attribute on the img element is obsolete. Use the id attribute instead.',
                'expectedNormalisedError' => new NormalisedError(
                    'The name attribute on the %0 element is obsolete. Use the id attribute instead.',
                    [
                        'img',
                    ]
                ),
            ],
            'Attribute %0 not allowed on XHTML element %1 at this point.' => [
                'htmlErrorString' => 'Attribute value not allowed on XHTML element input at this point.',
                'expectedNormalisedError' => new NormalisedError(
                    'Attribute %0 not allowed on XHTML element %1 at this point.',
                    [
                        'value',
                        'input',
                    ]
                ),
            ],
            'Bad character %0 after <. Probable cause: Unescaped <. Try escaping it as &lt;.' => [
                'htmlErrorString' => 'Bad character . after <. Probable cause: Unescaped <. Try escaping it as &lt;.',
                'expectedNormalisedError' => new NormalisedError(
                    'Bad character %0 after <. Probable cause: Unescaped <. Try escaping it as &lt;.',
                    [
                        '.',
                    ]
                ),
            ],
        ];
    }
}
