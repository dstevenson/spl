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


namespace CentralDesktop\Spl\Graph;

use CentralDesktop\Spl;

/**
 * Class DirectedGraph
 *
 * Order of Edge vertices DOES matter.
 *
 * @package CentralDesktop\Spl\Graph
 */
class DirectedGraph extends Spl\Graph {

    /**
     * @param Spl\Vertex $source
     * @param Spl\Vertex $target
     * @return Spl\Edge|null
     */
    public function get_edge(Spl\Vertex $source, Spl\Vertex $target) {
        if ($this->vertices->contains($source) &&
            $this->vertices->contains($target)) {

            $edges = $this->get_outgoing_edges_of($source);
            /**
             * @var $edge Spl\Edge
             */
            foreach ($edges as $edge) {
                if ($edge->get_target() === $target) {
                    return $edge;
                }
            }
        }

        return null;
    }

    public function get_outgoing_edges_of(Spl\Vertex $vertex) {
        $edges = new \SplObjectStorage();

        // @TODO track this somewhere

        return $this->get_edges();
    }

    public function in_degree_of(Spl\Vertex $vertex) {
        return $vertex->predecessors->count();
    }

    public function out_degree_of(Spl\Vertex $vertex) {
        return $vertex->successors->count();
    }
}
