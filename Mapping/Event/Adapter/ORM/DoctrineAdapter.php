<?php

namespace PUGX\I18nBundle\Mapping\Event\Adapter\ORM;

use Doctrine\Common\EventArgs;
use Doctrine\ORM\Proxy\Proxy;
use PUGX\I18nBundle\Mapping\Event\Adapter\EventAdapterInterface;

class DoctrineAdapter implements EventAdapterInterface
{
    /**
     * {@inheritdoc}
     */
    public function getObject(EventArgs $e)
    {
        return $e->getEntity();
    }

    /**
     * {@inheritdoc}
     */
    public function getReflectionClass($obj)
    {
        if ($obj instanceof Proxy) {
            return new \ReflectionClass(get_parent_class($obj));
        }

        return new \ReflectionClass($obj);
    }
}
