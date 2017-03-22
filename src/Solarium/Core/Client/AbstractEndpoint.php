<?php
/**
 * BSD 2-Clause License
 *
 * Copyright (c) 2017 Jeroen Steggink
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 *  Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 *
 *  Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
 * FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
 * SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
 * OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

namespace Solarium\Core\Client;

use Solarium\Core\Configurable;

/**
 * Class EndpointAbstract
 * @package Solarium\Core\Client
 */
abstract class AbstractEndpoint extends Configurable implements EndpointInterface
{
    /** @var Type value for solr */
    const SOLR = 'solr';
    /** @var Type value for solrcloud */
    const SOLRCLOUD = 'solrcloud';

    /** @var  string Key of the Endpoint */
    protected $key;
    /** @var  string  Type of Endpoint*/
    protected $type = self::SOLR;
    /** @var  string URI scheme */
    protected $scheme;
    /** @var  string hostname of the server*/
    protected $host;
    /** @var  int Server port*/
    protected $port;
    /** @var  string */
    protected $path;
    /** @var  string */
    protected $core;
    /** @var  string */
    protected $collection;
    /** @var  int */
    protected $timeout;

    /** @var  string */
    protected $username;
    /** @var  string  */
    protected $password;

    /**
     * Get key value.
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->getOption('key');
    }

    /**
     * Get type value: 'solr' or 'solrcloud'.
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Get host option.
     *
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * Get port option.
     *
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * Get path option.
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getCore(): string
    {
        return $this->core;
    }

    /**
     * @return string
     */
    public function getCollection(): string
    {
        return $this->collection;
    }

    /**
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * Get scheme option.
     *
     * @return string
     */
    public function getScheme(): string
    {
        return $this->scheme;
    }

    /**
     * Get the base uri for all requests.
     *
     * Based on host, path, port and core options.
     *
     * @return string
     */
    public function getBaseUri(): string
    {
        $uri = $this->getServerUri();

        if ($this->type == self::SOLR) {
            $uri = $uri.$this->getCore().'/';
        } elseif ($this->type == self::SOLRCLOUD) {
            $uri = $uri.$this->getCollection().'/';
        }

        return $uri;
    }

    /**
     * Get the server uri
     *
     * @return string
     */
    public function getServerUri(): string
    {
        return $this->getScheme().'://'.$this->getHost().':'.$this->getPort().$this->getPath().'/';
    }

    /**
     * Get HTTP basic auth settings.
     *
     * @return array
     */
    public function getAuthentication(): array
    {
        return array(
            'username' => $this->username,
            'password' => $this->password,
        );
    }
}