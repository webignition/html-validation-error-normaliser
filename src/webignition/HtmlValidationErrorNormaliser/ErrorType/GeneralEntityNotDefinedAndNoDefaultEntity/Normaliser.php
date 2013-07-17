<?php

namespace webignition\HtmlValidationErrorNormaliser\ErrorType\GeneralEntityNotDefinedAndNoDefaultEntity;

use webignition\HtmlValidationErrorNormaliser\ErrorType\Normaliser as AbstractNormaliser;
use webignition\HtmlValidationErrorNormaliser\ErrorType\GeneralEntityNotDefinedAndNoDefaultEntity\ErrorType as TargetErrorType;

class Normaliser extends AbstractNormaliser {

    public function normalise($htmlErrorString, \webignition\HtmlValidationErrorNormaliser\ErrorType\ErrorType $errorType) {
        /* @var $errorType TargetErrorType */        
        if (!$errorType instanceof TargetErrorType) {
            return false;
        }
        
        $parameter = str_replace(array(
            $errorType::PLACEHOLDER_PREFIX,
            $errorType::PLACEHOLDER_POSTFIX
        ), '', $htmlErrorString);
        
        return array(
            'normal-form' => $errorType::PLACEHOLDER_PREFIX . '%0' . $errorType::PLACEHOLDER_POSTFIX,
            'parameters' => array(
                $parameter
            )
        );
    }    
}