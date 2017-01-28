<?php

namespace PUGX\I18nBundle\Mapping\Event\Adapter;

use Doctrine\Common\EventArgs;

interface EventAdapterInterface
{
    /**
     * Gets the mapped object from the event arguments.
     *
     * @param EventArgs $e the event arguments
     *
     * @return object the mapped object
     */
    public function getObject(EventArgs $e);

    /**
     * Gets the reflection class for the object taking
     * proxies into account.
     *
     * @param object $obj the object
     *
     * @return \ReflectionClass the reflection class
     */
    public function getReflectionClass($obj);
}
