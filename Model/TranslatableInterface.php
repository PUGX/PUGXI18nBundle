<?php

namespace PUGX\I18nBundle\Model;

use PUGX\I18nBundle\Model\TranslatingInterface;
use PUGX\I18nBundle\Locale\LocaleInterface;

interface TranslatableInterface
{    
    function setTranslation(TranslatingInterface $translation);
    
    function addTranslation(TranslatingInterface $translation);
    
    function getTranslations();
    
    function setLocale(LocaleInterface $locale);
}