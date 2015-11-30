<?php

/*
 * This file is part of Mandrill.
 *
 * (c) Blue Bay Travel <developers@bluebaytravel.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BlueBayTravel\Mandrill;

class MandrillFactory
{
    /**
     * Make a new mandrill client.
     *
     * @param array $config
     *
     * @return \BlueBayTravel\Mandrill\Mandrill
     */
    public function make(array $config)
    {
        return $this->getClient($config);
    }

    /**
     * Get the main client.
     *
     * @param array $config
     *
     * @return \BlueBayTravel\Mandrill\Mandrill
     */
    protected function getClient(array $config)
    {
        return new Mandrill(array_get($config, 'token'));
    }
}
