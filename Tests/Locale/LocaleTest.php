<?php

namespace PUGX\I18nBundle\Tests\Service;

use PUGX\I18nBundle\Locale\Locale;

class LocaleTest extends \PHPUnit_Framework_TestCase
{
    public function testLocale()
    {
        $locale = new Locale('en');
        $locale->setLocale('it');
        
        $this->assertEquals('it', $locale->getLocale());
    }
    
    public function testLocaleDefault()
    {
        $locale = new Locale('en');
        
        $this->assertEquals('en', $locale->getDefaultLocale());
    }
}