<?php

/*
 * This file is part of Mandrill.
 *
 * (c) Blue Bay Travel <developers@bluebaytravel.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BlueBayTravel\Tests\Mandrill;

use BlueBayTravel\Mandrill\Mandrill;
use BlueBayTravel\Mandrill\MandrillFactory;
use BlueBayTravel\Mandrill\MandrillManager;
use GrahamCampbell\TestBenchCore\ServiceProviderTrait;

class ServiceProviderTest extends AbstractTestCase
{
    use ServiceProviderTrait;

    public function testMandrillFactoryIsInjectable()
    {
        $this->assertIsInjectable(MandrillFactory::class);
    }

    public function testMandrillManagerIsInjectable()
    {
        $this->assertIsInjectable(MandrillManager::class);
    }

    public function testBindings()
    {
        $this->assertIsInjectable(Mandrill::class);

        $original = $this->app['mandrill.connection'];
        $this->app['mandrill']->reconnect();
        $new = $this->app['mandrill.connection'];

        $this->assertNotSame($original, $new);
        // $this->assertEquals($original, $new);
    }
}
