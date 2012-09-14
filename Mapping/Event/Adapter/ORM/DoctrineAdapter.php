<?php

namespace PUGX\I18nBundle\Mapping\Event\Adapter\ORM;

use PUGX\I18nBundle\Mapping\Event\Adapter\EventAdapterInterface;
use Doctrine\Common\EventArgs;
use Doctrine\ORM\Proxy\Proxy;

class DoctrineAdapter implements EventAdapterInterface
{
    /**
     * {@inheritDoc}
     */
    public function getObject(EventArgs $e)
    {
        return $e->getEntity();
    }

    /**
     * {@inheritDoc}
     */
    public function getReflectionClass($obj)
    {
        if ($obj instanceof Proxy) {
            return new \ReflectionClass(get_parent_class($obj));
        }

        return new \ReflectionClass($obj);
    }
}