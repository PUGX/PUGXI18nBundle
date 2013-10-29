<?php

namespace PUGX\I18nBundle\Tests;

use PUGX\I18nBundle\Model\Translatable as BaseTranslatable;

class Translatable extends BaseTranslatable
{    
    protected $translations;
    protected $throwExceptionIfTranslationNotFound = true;

    public function getTranslations()
    {
        return $this->translations;
    }

    public function dontThrowException()
    {
        $this->throwExceptionIfTranslationNotFound = false;
    }

    protected function getThrowExceptionIfNotFound()
    {
        return $this->throwExceptionIfTranslationNotFound;
    }
}