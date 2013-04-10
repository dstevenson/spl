<?php

namespace CentralDesktop\Spl\Test;
use CentralDesktop\Spl;

class VertexTest extends \PHPUnit_Framework_TestCase {


    /**
     * @expectedException \CentralDesktop\Spl\Exception\DuplicateVertexException
     */
    public function testAddPredecessorDuplcateVertexException() {
        $predecessor = new Spl\Vertex(null);

        $vertex = new Spl\Vertex(null);
        $vertex->add_predecessor($predecessor);
        $vertex->add_predecessor($predecessor);
    }

    public function testAddPredecessor() {
        $predecessor = new Spl\Vertex(null);

        $vertex = new Spl\Vertex(null);
        $vertex->add_predecessor($predecessor);

        $this->assertTrue($vertex->predecessors->contains($predecessor));
    }

    /**
     * @expectedException \CentralDesktop\Spl\Exception\DuplicateVertexException
     */
    public function testAddSuccessorDuplcateVertexException() {
        $successor = new Spl\Vertex(null);

        $vertex = new Spl\Vertex(null);
        $vertex->add_successor($successor);
        $vertex->add_successor($successor);
    }

    public function testAddSuccessor() {
        $successor = new Spl\Vertex(null);

        $vertex = new Spl\Vertex(null);
        $vertex->add_successor($successor);

        $this->assertTrue($vertex->successors->contains($successor));
    }
}