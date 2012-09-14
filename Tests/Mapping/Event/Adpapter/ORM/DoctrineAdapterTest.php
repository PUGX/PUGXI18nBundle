<?php

namespace PUGX\I18nBundle\Tests\Mapping\Event\Adpapter\ORM;

use PUGX\I18nBundle\Mapping\Event\Adapter\ORM\DoctrineAdapter;
use PUGX\I18nBundle\Tests\Translatable;
use PUGX\I18nBundle\Tests\TranslatableProxy;

class DoctrineAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testGetObject()
    {
        if (!class_exists('Doctrine\ORM\Event\LifecycleEventArgs')) {
            $this->markTestSkipped('Doctrine\ORM\Event\LifecycleEventArgs does not exist.');
        } else {
            $args = $this->getMockBuilder('Doctrine\ORM\Event\LifecycleEventArgs')
                    ->disableOriginalConstructor()->getMock();
            
            $adapter = new DoctrineAdapter();
            $args->expects($this->once())->method('getEntity');
            $adapter->getObject($args);
        }
    }
    
    public function testGetReflectionClass()
    {
        if (!interface_exists('Doctrine\ORM\Proxy\Proxy')) {
            $this->markTestSkipped('Doctrine\ORM\Proxy\Proxy does not exist.');
        } else {
            $obj = new Translatable(array());
            $adapter = new DoctrineAdapter();
            $class = $adapter->getReflectionClass($obj);

            $this->assertEquals($class->getName(), get_class($obj));
        }
    }
    
    public function testGetReflectionClassProxy()
    {
        if (!interface_exists('Doctrine\ORM\Proxy\Proxy')) {
            $this->markTestSkipped('Doctrine\ORM\Proxy\Proxy does not exist.');
        } else {
            $obj = new TranslatableProxy(array());
            $adapter = new DoctrineAdapter();
            $class = $adapter->getReflectionClass($obj);

            $this->assertEquals($class->getName(), get_parent_class($obj));
        }
    }
}