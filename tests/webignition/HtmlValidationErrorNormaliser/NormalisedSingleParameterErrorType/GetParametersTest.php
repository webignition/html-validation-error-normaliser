<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormalisedSingleParameterErrorType;

use webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\BaseTest;

class GetParametersTest extends BaseTest {    
    
    public function testNormaliseGeneralEntityDefinedAndNoDefaultEntity() {        
        $this->parametersTest(
            'general entity "t" not defined and no default entity',
             array(
                't'
            )
        );
    }
    
    public function testUnknownDeclarationType() {
        $this->parametersTest(
            'unknown declaration type "doctype"',
             array(
                'doctype'
            )
        );        
    }
    
    public function testDocumentTypeDoesnotAllowElementHere() {
        $this->parametersTest(
            'document type does not allow element "style" here',
             array(
                'style'
            )
        );        
    }    
    
    public function testEndTagOmittedDeclarationDoesNotPermitThis() {
        $this->parametersTest(
            'end tag for "FONT" omitted, but its declaration does not permit this',
             array(
                'FONT'
            )
        );        
    }     
    
}