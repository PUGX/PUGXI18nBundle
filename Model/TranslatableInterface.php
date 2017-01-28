<?php

namespace PUGX\I18nBundle\Model;

use PUGX\I18nBundle\Locale\LocaleInterface;

interface TranslatableInterface
{
    public function setTranslation(TranslatingInterface $translation);

    public function addTranslation(TranslatingInterface $translation);

    public function getTranslations();

    public function setLocale(LocaleInterface $locale);
}
