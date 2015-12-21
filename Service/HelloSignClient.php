<?php

/*
 * This file is part of the Bukashk0zzzHelloSignBundle
 *
 * (c) Denis Golubovskiy <bukashk0zzz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bukashk0zzz\HelloSignBundle\Service;

/**
 * Class HelloSignClient
 *
 * @author Denis Golubovskiy <bukashk0zzz@gmail.com>
 */
class HelloSignClient extends \HelloSign\Client
{
    /**
     * HelloSignClient constructor.
     * @param mixed  $first         email address or apikey or OAuthToken
     * @param string $last          Null if using apikey or OAuthToken
     * @param string $apiUrl        (optional) alternative api base url
     * @param string $oauthTokenUrl
     */
    public function __construct($first, $last = null, $apiUrl = self::API_URL, $oauthTokenUrl = self::OAUTH_TOKEN_URL)
    {
        parent::__construct($first, $last, $apiUrl, $oauthTokenUrl);
    }
}
