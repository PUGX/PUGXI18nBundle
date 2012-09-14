<?php

namespace PUGX\I18nBundle\Listener;

use Doctrine\Common\EventArgs;
use Doctrine\Common\EventSubscriber;
use PUGX\I18nBundle\Locale\LocaleInterface;
use PUGX\I18nBundle\Model\TranslatableInterface;
use PUGX\I18nBundle\Mapping\Event\Adapter\EventAdapterInterface;

/**
 * 
 * @author Leonardo Proietti (leonardo.proietti@gmail.com)
 */
class TranslatableListener implements EventSubscriber
{
    protected $locale;
    protected $adapter;

    public function __construct(EventAdapterInterface $adapter, LocaleInterface $locale)
    {
        $this->adapter  = $adapter;
        $this->locale   = $locale;
    }
    
    public function getSubscribedEvents()
    {
        return array(
            'postLoad',
        );
    }

    public function postLoad(EventArgs $args)
    {
        $entity = $this->adapter->getObject($args);
        
        if ($entity instanceof TranslatableInterface) {
            $entity->setLocale($this->locale);
        }
    }
}
