<?php

namespace PUGX\I18nBundle\Model;

interface TranslatingInterface
{
    public function setLocale($string);

    public function getLocale();

    public function setTranslatable(TranslatableInterface $translatable);
}
