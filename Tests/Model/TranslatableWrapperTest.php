<?php

namespace PUGX\I18nBundle\Tests\Service;

use PUGX\I18nBundle\Tests\TranslatableWrapper;
use PUGX\I18nBundle\Tests\TranslationEn;

class TranslatableWrapperTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->translationStubEn  = new TranslationEn();        
        $this->locale             = $this->getMockBuilder('PUGX\I18nBundle\Locale\LocaleInterface')->disableOriginalConstructor()->getMock();
        $translationsObject       = array($this->translationStubEn);        
        
        $this->translatable = new TranslatableWrapper();
        $this->translatable->setLocale($this->locale);
        $this->translatable->addTranslation($this->translationStubEn);
    }
    
    public function testMagicCallOk()
    {
        $this->locale->expects($this->exactly(1))->method('getDefaultLocale')->will($this->returnValue('en'));
        $this->locale->expects($this->exactly(1))->method('getLocale')->will($this->returnValue('en'));
        
        $result = $this->translatable->getName();
        $this->assertEquals('name', $result);
    }
    
    /**
     * @expectedException RuntimeException
     */
    public function testMagicCallKo()
    {
        $this->locale->expects($this->exactly(1))->method('getDefaultLocale')->will($this->returnValue('en'));
        $this->locale->expects($this->exactly(1))->method('getLocale')->will($this->returnValue('en'));
        
        $result = $this->translatable->getSurname();
    }
}