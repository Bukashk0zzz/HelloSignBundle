<?php

/*
 * This file is part of the Bukashk0zzzHelloSignBundle
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\HelloSignBundle\Tests\Service;

use Bukashk0zzz\HelloSignBundle\Service\HelloSignClient;

/**
 * Test the HelloSignClientTest
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 */
class HelloSignClientTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function testWrapper()
    {
        $helloSign = new HelloSignClient('XXX');

        //check if instance
        $this->assertInstanceOf('Bukashk0zzz\HelloSignBundle\Service\HelloSignClient', $helloSign->enableDebugMode());
    }
}
