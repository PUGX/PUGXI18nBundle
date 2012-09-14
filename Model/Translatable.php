<?php

namespace PUGX\I18nBundle\Model;

use PUGX\I18nBundle\Model\TranslatingInterface;
use PUGX\I18nBundle\Locale\LocaleInterface;

abstract class Translatable implements TranslatableInterface
{
    /**
     * current translation
     * @var PUGX\I18nBundle\Model\TranslatingInterface 
     */
    protected $translation = null;
    
    /**
     *
     * @var PUGX\I18nBundle\Locale\LocaleInterface
     */
    protected $locale = null;
        
    /**
     *
     * @param string $locale
     */
    public function setLocale(LocaleInterface $locale)
    {
        $this->locale = $locale;
    } 
    
    /**
     *
     * @param TranslatingInterface $translation 
     */
    public function setTranslation(TranslatingInterface $translation)
    {
        $this->translation = $translation;
    }
    
    /**
     * Add translations
     *
     * @param TranslatingInterface $translation
     */
    public function addTranslation(TranslatingInterface $translation)
    {
        $this->translations[$translation->getLocale()] = $translation;
    }
        
    /**
     * get current translation based on locale
     * @return TranslatingInterface $translation|null 
     */
    public function getTranslation()
    {
        if ( !is_null($this->translation) ) {
            return $this->translation;
        }
        
        $translations = $this->getTranslations(); 
        if ( count($translations) < 1 ) {
            return null;
        }
        
        $defaultLocale = $this->locale->getDefaultLocale();
        $locale        = $this->locale->getLocale();
        
        foreach ($translations as $translation) { 
            $translationLocale = $translation->getLocale();  
            // translation by default locale that will be used
            // if a translation by locale is not found
            if ( $translationLocale == $defaultLocale ) {
                $defaultTranslation = $translation;
            }
            if ( $translationLocale == $locale ) {
                $this->setTranslation($translation);
                break;
            }
        }
        
        if ( is_null($this->translation) && isset($defaultTranslation) ) {
            $this->setTranslation($defaultTranslation);
        }
        
        if (is_null($this->translation)) {
            throw new \RuntimeException('Translation not found');
        }
                
        return $this->translation;
    }    
}