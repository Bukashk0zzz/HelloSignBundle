<?php

/*
 * This file is part of the Bukashk0zzzHelloSignBundle
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\HelloSignBundle\Tests\DependencyInjection;

use Bukashk0zzz\HelloSignBundle\DependencyInjection\Bukashk0zzzHelloSignExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Bukashk0zzzHelloSignExtensionTest
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
class Bukashk0zzzHelloSignExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Bukashk0zzzHelloSignExtension $extension Bukashk0zzzHelloSignExtension
     */
    private $extension;

    /**
     * @var ContainerBuilder $container Container builder
     */
    private $container;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->extension = new Bukashk0zzzHelloSignExtension();
        $this->container = new ContainerBuilder();
        $this->container->registerExtension($this->extension);
    }

    /**
     * Test load extension
     */
    public function testLoadExtension()
    {
        $this->container->prependExtensionConfig($this->extension->getAlias(), ['login' => 'XXX']);
        $this->container->loadFromExtension($this->extension->getAlias());
        $this->container->compile();

        // Check that services have been loaded
        $this->assertTrue($this->container->has('hellosign.client'));
    }
}
