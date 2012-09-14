<?php

namespace PUGX\I18nBundle\Tests\Service;

use PUGX\I18nBundle\Test\TestCase;
use PUGX\I18nBundle\Tests\Translatable;

class TranslatableTest extends \PHPUnit_Framework_TestCase
{
    protected $translationStubEn;
    protected $translationStubIt;
    
    public function setUp()
    {
        $this->translationStubEn  = $this->getMockBuilder('PUGX\I18nBundle\Tests\TranslationEn')->disableOriginalConstructor()->getMock();
        $this->translationStubIt  = $this->getMockBuilder('PUGX\I18nBundle\Tests\TranslationIt')->disableOriginalConstructor()->getMock();
        $this->translationStubDe  = $this->getMockBuilder('PUGX\I18nBundle\Tests\TranslationDe')->disableOriginalConstructor()->getMock();
        $this->locale             = $this->getMockBuilder('PUGX\I18nBundle\Locale\LocaleInterface')->disableOriginalConstructor()->getMock();
    }
    
    /**
     *
     * tranlsations, locale, defaultLocale, tranlsationExpected
     */
    public function getTranslationProvider()
    {
        return array(
          array(array('it' => 'translationStubIt', 'en' => 'translationStubEn'), 'en', 'en', 'translationStubEn'), //testGetTranslationLocaleEqualDefault
          array(array('en' => 'translationStubEn', 'it' => 'translationStubIt'), 'en', 'it', 'translationStubIt'), //testGetTranslationLocaleEqualIt
          array(array('en' => 'translationStubEn'), 'en', 'it', 'translationStubEn'), //testGetTranslationDefaultLocaleLessLocaleSettedReturnDefault
        );   
    }
    
    /**
     * @dataProvider getTranslationProvider
     */
    public function testGetTranslation($translations, $defaultLocale, $locale, $translationExpected)
    {
        $translationsObject = array();
        foreach ($translations as $language => $translation) {
            $translationsObject[$language] = $this->$translation;
        }
                
        $this->translatable = new Translatable($translationsObject);
        $this->translatable->setLocale($this->locale);
        
        $this->locale->expects($this->exactly(1))->method('getDefaultLocale')->will($this->returnValue($defaultLocale));
        $this->locale->expects($this->exactly(1))->method('getLocale')->will($this->returnValue($locale));
                        
        foreach ($translationsObject as $language => $translation) {
            $translation->expects($this->exactly(1))->method('getLocale')->will($this->returnValue($language));
        }
               
        $result = $this->translatable->getTranslation();
        $this->assertEquals($this->$translationExpected, $result);
    }
    
    /**
     * @expectedException RuntimeException
     */
    public function testGetTranslationNotFound()
    {
        $this->translatable = new Translatable(array($this->translationStubDe));
        $this->translatable->setLocale($this->locale);
        
        $this->locale->expects($this->exactly(1))->method('getDefaultLocale')->will($this->returnValue('en'));
        $this->locale->expects($this->exactly(1))->method('getLocale')->will($this->returnValue('it'));
        $this->translationStubDe->expects($this->exactly(1))->method('getLocale')->will($this->returnValue('de'));
        
        $result = $this->translatable->getTranslation();
    }
}