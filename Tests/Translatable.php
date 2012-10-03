<?php

namespace PUGX\I18nBundle\Tests;

use PUGX\I18nBundle\Model\Translatable as BaseTranslatable;

class Translatable extends BaseTranslatable
{    
    protected $translations;
    
    public function getTranslations()
    {
        return $this->translations;
    }
}