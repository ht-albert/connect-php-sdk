<?php

/**
 * This file is part of the Ingram Micro Cloud Blue Connect SDK.
 *
 * @copyright (c) 2019. Ingram Micro. All Rights Reserved.
 */

namespace Connect\Runtime\Providers;

use Connect\Config;
use Connect\Runtime\ServiceProvider;
use GuzzleHttp\Client;
use Pimple\Container;

/**
 * Class HttpServiceProvider
 * @package Connect\Runtime\Providers
 */
class HttpServiceProvider extends ServiceProvider
{
    /**
     * Create the Curl Service
     * @param Container $container
     * @return Client
     */
    public function register(Container $container)
    {
        /** @var Config $configuration */
        $configuration = $container['config'];

        $client = new Client([
            'timeout' => $configuration->timeout,
            'verify' => $configuration->sslVerifyHost,
        ]);

        return $client;
    }
}