<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\RowXOfARowGroupEstablishedByATbodyElementHasNoCellsBeginningOnIt;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {       

    public function test21() {        
        $this->normalFormTest(
            'Row 21 of a row group established by a tbody element has no cells beginning on it.'
        );     
    }   
    
    protected function normalFormTest($htmlErrorString, $expectedNormalForm = 'Row %0 of a row group established by a tbody element has no cells beginning on it.') {
        return parent::normalFormTest($htmlErrorString, $expectedNormalForm);           
    }      
}