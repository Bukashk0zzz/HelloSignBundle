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

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages Bukashk0zzzHelloSignBundle configuration
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
class Bukashk0zzzHelloSignExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->getDefinition('hellosign.client')
            ->addArgument($config['login'])
            ->addArgument($config['password'])
            ->addArgument($config['url'])
            ->addArgument($config['oauth_url']);
    }
}
