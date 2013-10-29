<?php

namespace PUGX\I18nBundle\Tests\Listener;

use PUGX\I18nBundle\Listener\LocaleListener;
use PUGX\I18nBundle\Locale\Locale;

class LocaleListenerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->event = $this->getMockBuilder('Symfony\Component\HttpKernel\Event\GetResponseEvent')
                ->disableOriginalConstructor()->getMock();
        $this->locale = $this->getMockBuilder('PUGX\I18nBundle\Locale\LocaleInterface')
                ->disableOriginalConstructor()->getMock();
        $this->request = $this->getMockBuilder('Symfony\Component\HttpFoundation\Request')
                ->disableOriginalConstructor()->getMock();

        $this->listener = new LocaleListener($this->locale);
    }
    
    public function testOnKernelRequest()
    {
        $this->event->expects($this->once())->method('getRequest')
                ->will($this->returnValue($this->request));     
        $this->request->expects($this->once())->method('getLocale')
                ->will($this->returnValue('en'));     
        $this->locale->expects($this->once())->method('setLocale')
                ->with('en');
        
        $this->listener->setLocale($this->event);
    }
}