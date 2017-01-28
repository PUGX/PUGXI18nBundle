<?php

namespace PUGX\I18nBundle\Listener;

use PUGX\I18nBundle\Locale\LocaleInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * @author Leonardo Proietti (leonardo.proietti@gmail.com)
 */
class LocaleListener implements EventSubscriberInterface
{
    private $locale;

    public function __construct(LocaleInterface $locale)
    {
        $this->locale = $locale;
    }

    public static function getSubscribedEvents()
    {
        return [
            'kernel.request' => 'setLocale',
        ];
    }

    public function setLocale(GetResponseEvent $event)
    {
        $this->locale->setLocale($event->getRequest()->getLocale());
    }
}
