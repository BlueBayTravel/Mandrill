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
use GrahamCampbell\TestBench\AbstractTestCase as AbstractTestBenchTestCase;
use Illuminate\Contracts\Config\Repository;
use Mockery;

class MandrillManagerTest extends AbstractTestBenchTestCase
{
    public function testCreateConnection()
    {
        $config = ['token' => 'your-token'];

        $manager = $this->getManager($config);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('mandrill.default')->andReturn('mandrill');

        $this->assertSame([], $manager->getConnections());

        $return = $manager->connection();

        $this->assertInstanceOf(Mandrill::class, $return);

        $this->assertArrayHasKey('mandrill', $manager->getConnections());
    }

    protected function getManager(array $config)
    {
        $repo = Mockery::mock(Repository::class);
        $factory = Mockery::mock(MandrillFactory::class);

        $manager = new MandrillManager($repo, $factory);

        $manager->getConfig()->shouldReceive('get')->once()
            ->with('mandrill.connections')->andReturn(['mandrill' => $config]);

        $config['name'] = 'mandrill';

        $manager->getFactory()->shouldReceive('make')->once()
            ->with($config)->andReturn(Mockery::mock(Mandrill::class));

        return $manager;
    }
}
