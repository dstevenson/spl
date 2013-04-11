<?php

/**
 *
 * Copyright 2005-2006 The Apache Software Foundation
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */


namespace CentralDesktop\Spl;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\NullLogger;
use SplObjectStorage;

/**
 * Class Edge
 *
 *
 *
 * @package CentralDesktop\Spl
 */
abstract class Edge {

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Source Vertex
     *
     * @var Vertex
     */
    protected $source;

    /**
     * Target Vertex
     *
     * @var Vertex
     */
    protected $target;

    /**
     * @var SplObjectStorage
     */
    protected $vertices;

    /**
     * @return Vertex
     */
    public function get_source() {
        return $this->source;
    }

    /**
     * @return Vertex
     */
    public function get_target() {
        return $this->target;
    }

    /**
     * @return SplObjectStorage
     */
    public function get_vertices() {
        return $this->vertices;
    }
}