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

use Mandrill as BaseMandrill;

class Mandrill
{
    /**
     * The mandrill instance.
     *
     * @var \Mandrill
     */
    protected $mandrill;

    /**
     * Create a new mandrill instance.
     *
     * @param string $token
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->mandrill = new BaseMandrill($token);
    }

    /**
     * Return information about the user.
     *
     * @return \Mandrill_Users
     */
    public function users()
    {
        return $this->mandrill->users;
    }

    /**
     * Send a transactional email through Mandrill.
     *
     * @return \Mandrill_Messages
     */
    public function messages()
    {
        return $this->mandrill->messages;
    }

    /**
     * Return the user-defined tag information.
     *
     * @return \Mandrill_Tags
     */
    public function tags()
    {
        return $this->mandrill->tags;
    }

    /**
     * Adds an email to the blacklist.
     *
     * @return \Mandrill_Rejects
     */
    public function rejects()
    {
        return $this->mandrill->rejects;
    }

    /**
     * Adds an email the whitelist.
     *
     * @return mixed
     */
    public function whitelists()
    {
        return $this->mandrill->whitelists;
    }

    /**
     * Return the senders that have used this account.
     *
     * @return \Mandrill_Senders
     */
    public function senders()
    {
        return $this->mandrill->senders;
    }

    /**
     * Get the URLs.
     *
     * @return \Mandrill_Urls
     */
    public function urls()
    {
        return $this->mandrill->urls;
    }

    /**
     * Add a new template.
     *
     * @return \Mandrill_Templates
     */
    public function templates()
    {
        return $this->mandrill->templates;
    }

    /**
     * Return list of webhooks.
     *
     * @return \Mandrill_Webhooks
     */
    public function webhooks()
    {
        return $this->mandrill->webhooks;
    }

    /**
     * Get a list of subaccounts.
     *
     * @return \Mandrill_Subaccounts
     */
    public function subaccounts()
    {
        return $this->mandrill->subaccounts;
    }

    /**
     * Return domains that have been setup for inbound deliveries.
     *
     * @return \Mandrill_Inbound
     */
    public function inbound()
    {
        return $this->mandrill->inbound;
    }

    /**
     * Returns information about any exports.
     *
     * @return \Mandrill_Exports
     */
    public function exports()
    {
        return $this->mandrill->exports;
    }

    /**
     * Return list of dedicated IPs.
     *
     * @return \Mandrill_Ips
     */
    public function ips()
    {
        return $this->mandrill->ips;
    }

    /**
     * Return list of custom metadata fields indexed for the account.
     *
     * @return \Mandrill_Metadata
     */
    public function metadata()
    {
        return $this->mandrill->metadata;
    }
}
