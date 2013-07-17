<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormalisedMultipleParameterErrorType;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {    
    
    public function testDocumentTypeDoesnotAllowElementHereMissingOneOfTwoParameters() {
        $htmlErrorString = 'document type does not allow element "script" here; missing one of "dt", "dd" start-tag';
        $expectedNormalForm = 'document type does not allow element "%0" here; missing one of "%1", "%2" start-tag';
        
        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }
    
    public function testDocumentTypeDoesnotAllowElementHereMissingOneOfThreeParameters() {
        $htmlErrorString = 'document type does not allow element "DIV" here; missing one of "OBJECT", "MAP", "BUTTON" start-tag';
        $expectedNormalForm = 'document type does not allow element "%0" here; missing one of "%1", "%2", "%3" start-tag';        
        
        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }
    
    public function testDocumentTypeDoesnotAllowElementHereMissingOneOfManyParameters() {
        $htmlErrorString = 'document type does not allow element "img" here; missing one of "p", "h1", "h2", "h3", "h4", "h5", "h6", "div", "address", "fieldset", "ins", "del" start-tag';
        $expectedNormalForm = 'document type does not allow element "%0" here; missing one of "%1", "%2", "%3", "%4", "%5", "%6", "%7", "%8", "%9", "%10", "%11", "%12" start-tag';
        
        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }
}