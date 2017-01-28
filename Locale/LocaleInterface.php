<?php

namespace PUGX\I18nBundle\Locale;

/**
 * @author Leonardo Proietti (leonardo.proietti@gmail.com)
 */
interface LocaleInterface
{
    public function setLocale($locale);

    public function getLocale();

    public function getDefaultLocale();
}
