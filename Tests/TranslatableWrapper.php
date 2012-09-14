<?php

namespace PUGX\I18nBundle\Tests;

use PUGX\I18nBundle\Model\TranslatableWrapper as BaseTranslatable;

class TranslatableWrapper extends BaseTranslatable
{    
    protected $translations;
    
    public function __construct($translations)
    {
        $this->translations = $translations;
    }
    
    public function getTranslations()
    {
        return $this->translations;
    }      
}