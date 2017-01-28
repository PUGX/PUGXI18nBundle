<?php

namespace PUGX\I18nBundle\Locale;

/**
 * @author Leonardo Proietti (leonardo.proietti@gmail.com)
 */
class Locale implements LocaleInterface
{
    private $locale;
    private $defaultLocale;

    public function __construct($defaultLocale)
    {
        $this->locale = $defaultLocale;
        $this->defaultLocale = $defaultLocale;
    }

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function getDefaultLocale()
    {
        return $this->defaultLocale;
    }
}
