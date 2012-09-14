<?php

namespace PUGX\I18nBundle\Tests;

use PUGX\I18nBundle\Model\TranslatingInterface;
use PUGX\I18nBundle\Model\TranslatableInterface;

abstract class AbstractTranslation implements TranslatingInterface
{
    public function setLocale($string)
    {
        
    }
    
    public function getLocale()
    {
        
    }
    
    public function setTranslatable(TranslatableInterface $translatable)
    {
        
    }
    
    public function getCustom()
    {
        
    }
}