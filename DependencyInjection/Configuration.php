<?php

namespace PUGX\I18nBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/bundles/extension.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('pugx_i18n');

        $rootNode
            ->children()
                ->arrayNode('classes')
                    ->addDefaultsIfNotSet()
                    ->canBeUnset()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
