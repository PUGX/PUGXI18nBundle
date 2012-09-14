<?php

namespace PUGX\I18nBundle\Model;

use PUGX\I18nBundle\Model\TranslatableInterface;

interface TranslatingInterface
{
    function setLocale($string);
    
    function getLocale();
    
    function setTranslatable(TranslatableInterface $translatable);
}