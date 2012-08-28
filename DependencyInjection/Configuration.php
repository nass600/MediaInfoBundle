<?php

namespace Nass600\MediaInfoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
* This is the class that validates and merges configuration from your app/config files
*
* To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
*/
class Configuration implements ConfigurationInterface
{
    /**
* {@inheritDoc}
*/
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('nass600_media_info');

        $rootNode
            ->children()
                ->arrayNode('provider')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('lyrics')->defaultValue('Nass600\MediaInfoBundle\MediaInfo\Adapter\Lyrics\LyrDBAdapter')->end()
                        ->scalarNode('music')->defaultValue('Nass600\MediaInfoBundle\MediaInfo\Adapter\Music\LastFMAdapter')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}