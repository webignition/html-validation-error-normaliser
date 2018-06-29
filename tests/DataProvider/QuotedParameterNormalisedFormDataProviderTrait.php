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
        ];
    }
}
