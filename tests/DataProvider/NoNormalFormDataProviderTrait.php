<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\DataProvider;

trait NoNormalFormDataProviderTrait
{
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
}
