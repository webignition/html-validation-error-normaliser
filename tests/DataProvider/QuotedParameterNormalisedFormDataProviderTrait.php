<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\DataProvider;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;

trait QuotedParameterNormalisedFormDataProviderTrait
{
    /**
     * @return array
     */
    public function normaliseHasQuotedParameterNormalisedFormDataProvider()
    {
        return [
            'general entity "%0" not defined and no default entity' => [
                'htmlErrorString' => 'general entity "t" not defined and no default entity',
                'expectedNormalisedError' => new NormalisedError(
                    'general entity "%0" not defined and no default entity',
                    [
                        't',
                    ]
                ),
            ],
            'unknown declaration type "%0"' => [
                'htmlErrorString' => 'unknown declaration type "doctype"',
                'expectedNormalisedError' => new NormalisedError(
                    'unknown declaration type "%0"',
                    [
                        'doctype',
                    ]
                ),
            ],
            'document type does not allow element "%0" here' => [
                'htmlErrorString' => 'document type does not allow element "style" here',
                'expectedNormalisedError' => new NormalisedError(
                    'document type does not allow element "%0" here',
                    [
                        'style',
                    ]
                ),
            ],
            'end tag for "%0" omitted, but its declaration does not permit this' => [
                'htmlErrorString' => 'end tag for "FONT" omitted, but its declaration does not permit this',
                'expectedNormalisedError' => new NormalisedError(
                    'end tag for "%0" omitted, but its declaration does not permit this',
                    [
                        'FONT',
                    ]
                ),
            ],
            'end tag for "%0" omitted, but OMITTAG NO was specified' => [
                'htmlErrorString' => 'end tag for "h1" omitted, but OMITTAG NO was specified',
                'expectedNormalisedError' => new NormalisedError(
                    'end tag for "%0" omitted, but OMITTAG NO was specified',
                    [
                        'h1',
                    ]
                ),
            ],
        ];
    }
}
