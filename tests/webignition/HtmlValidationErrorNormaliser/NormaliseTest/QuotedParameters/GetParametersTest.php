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
    
    
    public function testValueOfAttributeXCannotBeYMustBeOneOfZ() {
        $this->parametersTest(
            'value of attribute "type" cannot be "email"; must be one of "text", "password", "checkbox", "radio", "submit", "reset", "file", "hidden", "image", "button"',
             array(
                 'type',
                 'email',
                 '"text", "password", "checkbox", "radio", "submit", "reset", "file", "hidden", "image", "button"'
            )
        );
    }     
    
    public function testValueOfAttributeXCannotBeBlank() {
        $this->parametersTest(
            'value of attribute "nowrap" cannot be ""; must be one of "nowrap"',
             array(
                 'nowrap',
                 '',
                 'nowrap'
            )
        );
    }
    
    public function testInvalidCommentDeclarationWithQuotedCurvedBacket() {
        $this->parametersTest(
            'invalid comment declaration: found delimiter "(" outside comment but inside comment declaration',
             array(
                 '('
            )
        );     
    } 
    
    
    public function testIdAltreadyDefinedOne() {
        $this->parametersTest(
            'ID "\"playerbox_"+playerid+"\"" already defined',
             array(
                 '\"playerbox_"+playerid+"\"'
            )
        ); 
    }      
    
    public function testIdAltreadyDefinedTwo() {
        $this->parametersTest(
            'ID "\"contenedor_ayuda\"" already defined',
             array(
                 '\"contenedor_ayuda\"'
            )
        );           
    }
    
    public function testCharacterBlankIsNotAllowedInTheValueOfAttributeXOne() {
        $this->parametersTest(
            'character """ is not allowed in the value of attribute "id"',
             array(
                 '"',
                 'id'
            )
        );           
    }
    
    public function testCharacterBlankIsNotAllowedInTheValueOfAttributeXTwo() {
        $this->parametersTest(
            'character "a" is not allowed in the value of attribute "foo"',
             array(
                 'a',
                 'foo'
            )
        );           
    }   
    
}