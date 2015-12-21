<?php

/*
 * This file is part of the Bukashk0zzzHelloSignBundle
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\HelloSignBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use HelloSign\Client;

/**
 * This is the configuration class
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return \Symfony\Component\Config\Definition\NodeInterface
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('hellosign');

        $rootNode
            ->children()
            ->scalarNode('login')->isRequired()->end()
            ->scalarNode('password')->defaultValue(null)->end()
            ->scalarNode('url')->defaultValue(Client::API_URL)->end()
            ->scalarNode('oauth_url')->defaultValue(Client::OAUTH_TOKEN_URL)->end()
            ->end();

        return $treeBuilder;
    }
}
