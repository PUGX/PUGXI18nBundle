<?php

namespace PUGX\I18nBundle\Model;

abstract class TranslatableWrapper extends Translatable
{    
    public function __get($method)
    {
        $translation = $this->getTranslation();
        $reflectedTranslation = new \ReflectionClass(get_class($translation));
        
        $getters = $this->getGetters($method);
        foreach ($getters as $getter) {
            if ($reflectedTranslation->hasMethod($getter)) {
                $reflectedMethod = $reflectedTranslation->getMethod($getter);
                if ($reflectedMethod->isPublic()) {
                    return $reflectedMethod->invoke($translation, $getter);
                }
            }
        }
        
        throw new \RuntimeException(sprintf('The method "%s" does not exist', $method));
    }

    public function __call($method, $args)
    {
        return $this->__get($method);
    }
    
    protected function getGetters($method)
    {
        $getters = array();
        $getters[] = $method;
        $getters[] = 'get' . ucfirst($method);
        
        return $getters;
    }    
}