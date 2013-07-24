<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\NonQuotedParameters\RowXOfARowGroupEstablishedByATbodyElementHasNoCellsBeginningOnIt;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {        
 
    
    public function test21() {        
       $this->parametersTest(
            'Row 21 of a row group established by a tbody element has no cells beginning on it.',
             array(
                '21'
            )
        );      
    }   
    
}