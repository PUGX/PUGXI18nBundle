<?php

namespace PUGX\I18nBundle\Tests;

use Doctrine\ORM\Proxy\Proxy;

class TranslatableProxy extends Translatable implements Proxy
{
    public function __load() { }

    public function __isInitialized() { }

    public function __setInitialized($initialized) {}

    public function __setInitializer(Closure $initializer = null) {}

    public function __getInitializer() {}

    public function __setCloner(Closure $cloner = null) {}

    public function __getCloner() {}

    public function __getLazyProperties() {}
}
