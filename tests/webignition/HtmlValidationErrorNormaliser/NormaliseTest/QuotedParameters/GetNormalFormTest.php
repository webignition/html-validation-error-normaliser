<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\QuotedParameters;

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
    
    public function testEndTagOmittedDeclarationDoesNotPermitThis() {
        $this->normalFormTest(
            'end tag for "FONT" omitted, but its declaration does not permit this',
            'end tag for "%0" omitted, but its declaration does not permit this'
        );     
    }

    public function testEndTagOmittedButOmmittagNoWasSpecified() {
        $this->normalFormTest(
            'end tag for "h1" omitted, but OMITTAG NO was specified',
            'end tag for "%0" omitted, but OMITTAG NO was specified'
        );     
    }    
    
    public function testEndTagWhichIsNotFinished() {
        $this->normalFormTest(
            'end tag for "tbody" which is not finished',
            'end tag for "%0" which is not finished'
        );     
    }
    
    public function testDocumentTypeDoesnotAllowElementHereMissingOneOfTwoParameters() {
        $htmlErrorString = 'document type does not allow element "script" here; missing one of "dt", "dd" start-tag';
        $expectedNormalForm = 'Document type does not allow element "%0" here; missing one of %1 start-tag';
        
        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }
    
    public function testDocumentTypeDoesnotAllowElementHereMissingOneOfThreeParameters() {
        $htmlErrorString = 'document type does not allow element "DIV" here; missing one of "OBJECT", "MAP", "BUTTON" start-tag';
        $expectedNormalForm = 'Document type does not allow element "%0" here; missing one of %1 start-tag';        
        
        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }
    
    public function testDocumentTypeDoesnotAllowElementHereMissingOneOfManyParameters() {
        $htmlErrorString = 'document type does not allow element "img" here; missing one of "p", "h1", "h2", "h3", "h4", "h5", "h6", "div", "address", "fieldset", "ins", "del" start-tag';
        $expectedNormalForm = 'Document type does not allow element "%0" here; missing one of %1 start-tag';
        
        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }    
    
    public function testValueOfAttributeXCannotBeYMustBeOneOfZ() {
        $htmlErrorString = 'value of attribute "type" cannot be "email"; must be one of "text", "password", "checkbox", "radio", "submit", "reset", "file", "hidden", "image", "button"';
        $expectedNormalForm = 'value of attribute "%0" cannot be "%1"; must be one of %2';
        
        $this->normalFormTest($htmlErrorString, $expectedNormalForm);
    }     
}