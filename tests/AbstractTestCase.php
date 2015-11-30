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

use BlueBayTravel\Mandrill\MandrillServiceProvider;
use GrahamCampbell\TestBench\AbstractPackageTestCase;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    /**
     * Get the required service providers.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string[]
     */
    protected function getRequiredServiceProviders($app)
    {
        return [MandrillServiceProvider::class];
    }

    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return MandrillServiceProvider::class;
    }
}
