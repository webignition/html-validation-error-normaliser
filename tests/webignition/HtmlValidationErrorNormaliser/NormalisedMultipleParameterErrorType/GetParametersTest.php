<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormalisedMultipleParameterErrorType;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {    
    
    public function testDocumentTypeDoesnotAllowElementHereMissingOneOfTwoParameters() {
        $this->parametersTest(
            'document type does not allow element "script" here; missing one of "dt", "dd" start-tag',
             array(
                 'script',
                 'dt',
                 'dd'
            )
        );
    }
    
    public function testDocumentTypeDoesnotAllowElementHereMissingOneOfThreeParameters() {        
        $this->parametersTest(
            'document type does not allow element "DIV" here; missing one of "OBJECT", "MAP", "BUTTON" start-tag',
             array(
                 'DIV',
                 'OBJECT',
                 'MAP',
                 'BUTTON'
            )
        );        
    }
    
    public function testDocumentTypeDoesnotAllowElementHereMissingOneOfManyParameters() {        
        $this->parametersTest(
            'document type does not allow element "img" here; missing one of "p", "h1", "h2", "h3", "h4", "h5", "h6", "div", "address", "fieldset", "ins", "del" start-tag',
             array(
                 'img',
                 'p',
                 'h1',
                 'h2',
                 'h3',
                 'h4',
                 'h5',
                 'h6',
                 'div',
                 'address',
                 'fieldset',
                 'ins',
                 'del'
            )
        );        
    }   
    
}