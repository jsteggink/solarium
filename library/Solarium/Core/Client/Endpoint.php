<?php
/**
 * Copyright 2011 Bas de Nooijer. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this listof conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * The views and conclusions contained in the software and documentation are
 * those of the authors and should not be interpreted as representing official
 * policies, either expressed or implied, of the copyright holder.
 *
 * @copyright Copyright 2011 Bas de Nooijer <solarium@raspberry.nl>
 * @license http://github.com/basdenooijer/solarium/raw/master/COPYING
 *
 * @link http://www.solarium-project.org/
 */

/**
 * @namespace
 */

namespace Solarium\Core\Client;

use Solarium\Exception\InvalidArgumentException;

/**
 * Class for describing an endpoint.
 */
class Endpoint extends AbstractEndpoint
{
    /**
     * Default options.
     *
     * The defaults match a standard Solr example instance as distributed by
     * the Apache Lucene Solr project.
     *
     * @var array
     */
    protected $options = array(
        'key'     => '',
        'scheme'  => 'http',
        'host'    => '127.0.0.1',
        'port'    => 8983,
        'path'    => '/solr',
        'core'    => 'collection1',
        'timeout' => 5,
    );

    /**
     * Set key value.
     *
     * @param string $key
     *
     * @return self Provides fluent interface
     */
    public function setKey($key)
    {
        $this->key = $key;
        $this->setOption('key', $key);

        return $this;
    }

    /**
     * Set host option.
     *
     * @param string $host This can be a hostname or an IP address
     *
     * @return self Provides fluent interface
     */
    public function setHost($host)
    {
        $this->host = $host;
        $this->setOption('host', $host);

        return $this;
    }

    /**
     * Set port option.
     *
     * @param int $port Common values are 80, 8080 and 8983
     *
     * @return self Provides fluent interface
     */
    public function setPort($port)
    {
        $this->port = $port;
        $this->setOption('port', $port);

        return $this;
    }

    /**
     * Set path option.
     *
     * The path needs to start with a slash and no slash at the end. If the path has a trailing slash it will be removed.
     * Example: /solr
     *
     * @param string $path
     *
     * @return self Provides fluent interface
     */
    public function setPath($path)
    {
        if (substr($path, -1) == '/') {
            $path = substr($path, 0, -1);
        }

        $this->path = $path;

        $this->setOption('path', $path);

        return $this;
    }

    /**
     * Set core option.
     *
     * @param string $core
     *
     * @return self Provides fluent interface
     */
    public function setCore($core)
    {
        $this->core = $core;
        $this->setOption('core', $core);

        return $this;
    }

    /**
     * Set timeout option.
     *
     * @param int $timeout
     *
     * @return self Provides fluent interface
     */
    public function setTimeout($timeout)
    {
        $this->timeout = $timeout;
        $this->setOption('timeout', $timeout);

        return $this;
    }

    /**
     * Set scheme option.
     *
     * @param string $scheme
     *
     * @return self Provides fluent interface
     */
    public function setScheme($scheme)
    {
        $this->scheme = $scheme;
        $this->setOption('scheme', $scheme);

        return $this;
    }

    /**
     * Set HTTP basic auth settings.
     *
     * If one or both values are NULL authentication will be disabled
     *
     * @param string $username
     * @param string $password
     *
     * @return self Provides fluent interface
     */
    public function setAuthentication($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->setOption('username', $username);
        $this->setOption('password', $password);

        return $this;
    }

    /**
     * Magic method enables a object to be transformed to a string.
     *
     * Get a summary showing significant variables in the object
     * note: uri is decoded for readability
     *
     * @return string
     */
    public function __toString(): string
    {
        $output = __CLASS__.'::__toString'."\n".'base uri: '.$this->getBaseUri()."\n".'host: '.$this->getHost()."\n".'port: '.$this->getPort()."\n".'path: '.$this->getPath()."\n".'core: '.$this->getCore()."\n".'timeout: '.$this->getTimeout()."\n".'authentication: '.print_r($this->getAuthentication(), 1);

        return $output;
    }

    /**
     * Initialization hook.
     *
     * In this case the path needs to be cleaned of trailing slashes.
     *
     * @see setPath()
     */
    protected function init()
    {
        foreach ($this->options as $name => $value) {
            switch ($name) {
                case 'path':
                    $this->setPath($value);
                    break;
                case 'scheme':
                    $this->scheme = $value;
                    break;
                case 'host':
                    $this->host = $value;
                    break;
                case 'port':
                    $this->port = $value;
                    break;
                case 'core':
                    $this->core = $value;
                    break;
                case 'timeout':
                    $this->timeout = $value;
                    break;
                case 'username':
                    $this->username = $value;
                    break;
                case 'password':
                    $this->password = $value;
                    break;
            }
        }
    }
}
