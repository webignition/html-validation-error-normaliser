HTML Valdiation Error Normaliser
================================

Ever found yourself staring at a list of HTML validator error messages and 
thinking "These *'required attribute "type" not specified'* and *'required attribute "alt" not specified'*
errors are somewhat similar, is there a normal form for these?"

My advice: get out of the house. Take up a hobby.

Failing that, this is the package for you! Congratulations.

## Usage example

```php
<?php

use webignition\HtmlValidationErrorNormaliser\HtmlValidationErrorNormaliser;

class ExampleTest extends \PHPUnit_Framework_TestCase {    

    protected function testDemonstrateNormaliser() {
        $htmlErrorString = 'document type does not allow element "style" here';  
        $normaliser = new HtmlValidationErrorNormaliser();        
        
        $this->assertEquals(
            'document type does not allow element "%0" here',
            $normaliser->normalise($htmlErrorString)->getNormalisedError()->getNormalForm()
        );
        
        $this->assertEquals(
            array('style'),
            $normaliser->normalise($htmlErrorString)->getNormalisedError()->getParameters()
        );        
    }
    
}
```
