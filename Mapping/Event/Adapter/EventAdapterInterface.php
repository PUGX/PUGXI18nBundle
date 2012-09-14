<?php

namespace PUGX\I18nBundle\Mapping\Event\Adapter;

use Doctrine\Common\EventArgs;

interface EventAdapterInterface
{
    /**
     * Gets the mapped object from the event arguments.
     *
     * @param  EventArgs $e The event arguments.
     * @return object    The mapped object.
     */
    function getObject(EventArgs $e);


    /**
     * Gets the reflection class for the object taking
     * proxies into account.
     *
     * @param  object           $obj The object.
     * @return \ReflectionClass The reflection class.
     */
    function getReflectionClass($obj);
}
