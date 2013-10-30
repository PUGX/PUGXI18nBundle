<?php

namespace PUGX\I18nBundle\Tests;

use PUGX\I18nBundle\Model\Translatable as BaseTranslatable;

class Translatable extends BaseTranslatable
{
    const HANDLE_NOT_FOUND_EXCEPTION = 'exception';
    const HANDLE_NOT_FOUND_NULL = 'null';
    const HANDLE_NOT_FOUND_EMTPY_OBJECT = 'emptyObject';

    protected $translations;
    public $handleNotFound = self::HANDLE_NOT_FOUND_EXCEPTION;

    public function getTranslations()
    {
        return $this->translations;
    }

    protected function handleTranslationNotFound()
    {
        $strategy = 'handle' .ucfirst($this->handleNotFound);
        $this->$strategy();
    }

    private function handleException()
    {
        parent::handleTranslationNotFound();
    }

    private function handleNull()
    {
        $this->translation = null;
    }

    private function handleEmptyObject()
    {
        $class = get_class($this);
        $this->translation = new $class;
    }

    public function getDummyValue()
    {

    }
}