<?php

namespace PUGX\I18nBundle\Tests\Listener;

use PUGX\I18nBundle\Listener\TranslatableListener;
use PUGX\I18nBundle\Locale\Locale;

class EntityListenerTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->adapter  = $this->getMockBuilder('PUGX\I18nBundle\Mapping\Event\Adapter\EventAdapterInterface')
                ->disableOriginalConstructor()->getMock();
        $this->locale   = $this->getMockBuilder('PUGX\I18nBundle\Locale\LocaleInterface')
                ->disableOriginalConstructor()->getMock();
        $this->args     = $this->getMockBuilder('Doctrine\Common\EventArgs')
                ->disableOriginalConstructor()->getMock();                
        $this->entity   = $this->getMockBuilder('PUGX\I18nBundle\Model\TranslatableInterface')
                ->disableOriginalConstructor()->getMock();       
        $this->dummy    = $this->getMockBuilder('Dummy')
                ->disableOriginalConstructor()->getMock();       
        
        $this->listener = new TranslatableListener($this->adapter, $this->locale);
    }
    
    public function testPostLoad()
    {        
        $this->adapter->expects($this->once())->method('getObject')
                ->with($this->args)
                ->will($this->returnValue($this->entity));        
        $this->entity->expects($this->once())->method('setLocale')
                ->with($this->locale);
        
        $this->listener->postLoad($this->args);
    }
    
    public function testPostLoadInterfaceNotCorrect()
    {        
        $this->adapter->expects($this->once())->method('getObject')
                ->with($this->args)
                ->will($this->returnValue($this->dummy));        
        $this->entity->expects($this->never())
                ->method('setLocale');
        
        $this->listener->postLoad($this->args);
    }
}