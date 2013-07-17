<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormalisedSingleParameterErrorType;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetNormalFormTest extends BaseTest {    

    public function testNormaliseGeneralEntityDefinedAndNoDefaultEntity() {        
        $this->normalFormTest(
            'general entity "t" not defined and no default entity',
            'general entity "%0" not defined and no default entity'
        );     
    }
    
    
    public function testUnknownDeclarationType() {
        $this->normalFormTest(
            'unknown declaration type "doctype"',
            'unknown declaration type "%0"'
        );          
    }
    
    public function testDocumentTypeDoesnotAllowElementHere() {
        $this->normalFormTest(
            'document type does not allow element "style" here',
            'document type does not allow element "%0" here'
        );     
    }    
}