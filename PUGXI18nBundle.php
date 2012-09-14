<?php

namespace PUGX\I18nBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use PUGX\I18nBundle\DependencyInjection\PUGXI18nExtension;

class PUGXI18nBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new PUGXI18nExtension();
    }
}
