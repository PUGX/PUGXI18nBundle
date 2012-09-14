<?php

namespace PUGX\I18nBundle\Tests;

use Doctrine\ORM\Proxy\Proxy;

class TranslatableProxy extends Translatable implements Proxy
{    
    public function __load() { }

    public function __isInitialized() { }
}