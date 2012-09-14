<?php

namespace PUGX\I18nBundle\Tests;

class TranslationEn extends AbstractTranslation
{
    public function getName() 
    {
        return "name";
    }
    
    public function getLocale()
    {
        return "en";
    }
    
    private function getSurname() {}
}