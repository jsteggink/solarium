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

/**
 * Interface EndpointInterface
 * @package Solarium\Core\Client
 */
interface EndpointInterface
{
    /**
     * Get key value.
     *
     * @return string
     */
    public function getKey(): string;

    /**
     * Get type value: 'solr' or 'solrcloud'.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Get host option.
     *
     * @return string
     */
    public function getHost(): string;

    /**
     * Get port option.
     *
     * @return int
     */
    public function getPort(): int;

    /**
     * Get path option.
     *
     * @return string
     */
    public function getPath(): string;

    /**
     * Get core option.
     *
     * @return string
     */
    public function getCore(): string;

    /**
     * Get collection option.
     *
     * @return string
     */
    public function getCollection(): string;

    /**
     * Get timeout option.
     *
     * @return int
     */
    public function getTimeout(): int;

    /**
     * Get scheme option.
     *
     * @return string
     */
    public function getScheme(): string;

    /**
     * Get the base uri for all requests.
     *
     * Based on scheme, host, port, path and core/collection.
     *
     * @return string
     */
    public function getBaseUri(): string;

    /**
     * Get the server uri for server requests.
     *
     * Based on scheme, host, port and path.
     *
     * @return string
     */
    public function getServerUri(): string;

    /**
     * Get HTTP basic auth settings.
     *
     * @return array
     */
    public function getAuthentication(): array;

    /**
     * Magic method enables a object to be transformed to a string.
     *
     * Get a summary showing significant variables in the object
     * note: uri resource is decoded for readability
     *
     * @return string
     */
    public function __toString(): string;

}