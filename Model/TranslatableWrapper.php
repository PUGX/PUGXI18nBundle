<?php

namespace PUGX\I18nBundle\Model;

abstract class TranslatableWrapper extends Translatable
{    
    public function __call($method, $args)
    {
        $translation = $this->getTranslation();
        $reflectedTranslation = new \ReflectionClass(get_class($translation));
        
        $getters = $this->getGetters($method);
        foreach ($getters as $getter) {
            if ($reflectedTranslation->hasMethod($getter)) {
                $reflectedMethod = $reflectedTranslation->getMethod($getter);
                if ($reflectedMethod->isPublic()) {
                    return $reflectedMethod->invokeArgs($translation, $args);
                }
            }
        }
        
        throw new \RuntimeException(sprintf('The method "%s" does not exist', $method));
    }
    
    protected function getGetters($method)
    {
        $getters = array();        
        $getters[] = $method;
        $getters[] = 'get' . ucfirst($method);
        
        return $getters;
    }    
}