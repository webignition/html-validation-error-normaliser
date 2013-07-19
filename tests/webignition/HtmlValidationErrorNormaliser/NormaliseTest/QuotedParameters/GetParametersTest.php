<?php

namespace webignition\HtmlValidationErrorNormaliser\Tests\webignition\HtmlValidationErrorNormaliser\NormaliseTest\QuotedParameters;

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
    
    public function testEndTagOmittedButOmmittagNoWasSpecified() {
        $this->parametersTest(
            'end tag for "h1" omitted, but OMITTAG NO was specified',
             array(
                'h1'
            )
        );  
    } 
    
    public function testEndTagWhichIsNotFinished() {
        $this->parametersTest(
            'end tag for "tbody" which is not finished',
             array(
                'tbody'
            )
        );    
    }  
    
    
    public function testDocumentTypeDoesnotAllowElementHereMissingOneOfTwoParameters() {
        $this->parametersTest(
            'document type does not allow element "script" here; missing one of "dt", "dd" start-tag',
             array(
                 'script',
                 '"dt", "dd"'
            )
        );
    }
    
    public function testDocumentTypeDoesnotAllowElementHereMissingOneOfThreeParameters() {        
        $this->parametersTest(
            'document type does not allow element "DIV" here; missing one of "OBJECT", "MAP", "BUTTON" start-tag',
             array(
                 'DIV',
                 '"OBJECT", "MAP", "BUTTON"'
            )
        );        
    }
    
    public function testDocumentTypeDoesnotAllowElementHereMissingOneOfManyParameters() {        
        $this->parametersTest(
            'document type does not allow element "img" here; missing one of "p", "h1", "h2", "h3", "h4", "h5", "h6", "div", "address", "fieldset", "ins", "del" start-tag',
             array(
                 'img',
                 '"p", "h1", "h2", "h3", "h4", "h5", "h6", "div", "address", "fieldset", "ins", "del"'
            )
        );        
    }      
    
}