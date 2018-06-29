<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\DataProvider;

use webignition\HtmlValidationErrorNormaliser\NormalisedError;

trait SpecialCasesNormalisedFormDataProviderTrait
{
    /**
     * @return array
     */
    public function normaliseSpecialCasesNormalisedFormDataProvider()
    {
        return [
            'general entity "%0" not defined and no default entity' => [
                'htmlErrorString' => '<p>
        Sorry, I am unable to validate this document because on line
        <strong>225</strong>
        it contained one or more bytes that I cannot interpret as
        <code>utf-8</code>
        (in other words, the bytes found are not valid values in the specified
        Character Encoding). Please check both the content of the file and the
        character encoding indication.
      </p>
<p>The error was: 
        utf8 "\xF8" does not map to Unicode

      </p>',
                'expectedNormalisedError' => new NormalisedError(
                    'Unable to interpret %0 as %1 on line %2',
                    [
                        '"\xF8"',
                        'utf-8',
                        '225',
                    ]
                ),
            ],
        ];
    }
}
