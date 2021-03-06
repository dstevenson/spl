<?php

namespace CentralDesktop\Spl\Test;
use CentralDesktop\Spl;
use CentralDesktop\Spl\Edge;

class GraphTest extends \PHPUnit_Framework_TestCase {

    /**
     * @dataProvider add_vertex_provider
     *
     * @param Spl\Graph $graph
     * @param Spl\Vertex $vertex
     * @param bool $has_vertex
     * @param bool $expected_return
     * @param array $expected_vertices
     */
    public function testAddVertex(Spl\Graph $graph, Spl\Vertex $vertex, $has_vertex, $expected_return, $expected_vertices) {
        $graph->expects($this->any())
            ->method('has_vertex')
            ->will($this->returnValue($has_vertex));

        $this->assertEquals($expected_return, $graph->add_vertex($vertex));
        foreach ($expected_vertices as $vertex) {
            $this->assertTrue($graph->get_vertices()->contains($vertex));
        }
    }

    public function add_vertex_provider() {
        $vertex = new Spl\Vertex(null);

        $contains_graph = $this->getMockBuilder('\CentralDesktop\Spl\Graph')
            ->setMethods(array('__construct', 'has_vertex'))
            ->getMockForAbstractClass();

        $contains_graph->add_vertex($vertex);

        $does_not_contain_graph = $this->getMockBuilder('\CentralDesktop\Spl\Graph')
            ->setMethods(array('__construct', 'has_vertex'))
            ->getMockForAbstractClass();

        return array(
            array(
                $contains_graph,
                $vertex,
                true,
                false,
                array()
            ),
            array(
                $does_not_contain_graph,
                $vertex,
                false,
                true,
                array($vertex)
            ),
            array(
                clone($contains_graph),
                $vertex,
                false,
                true,
                array($vertex)
            ),
            array(
                clone($does_not_contain_graph),
                $vertex,
                true,
                false,
                array()
            )
        );
    }

    /**
     * @dataProvider add_edge_provider
     *
     * @param Spl\Graph $graph
     * @param Spl\Edge $edge
     * @param bool $expected_return
     * @param array $expected_vertices
     * @param array $expected_edges
     */
    public function testAddEdge(Spl\Graph $graph, Spl\Edge $edge, $expected_return, $expected_vertices, $expected_edges) {
        $this->assertEquals($expected_return, $graph->add_edge($edge));
        foreach ($expected_vertices as $vertex) {
            $this->assertTrue($graph->get_vertices()->contains($vertex));
        }

        foreach ($expected_edges as $edge) {
            $this->assertTrue($graph->get_edges()->contains($edge));
        }
    }

    public function add_edge_provider() {
        $a = new Spl\Vertex('a');
        $b = new Spl\Vertex('b');
        $c = new Spl\Vertex('c');

        $edge = new Edge\DirectedEdge($a, $b);

        $contains_graph = $this->getMockBuilder('\CentralDesktop\Spl\Graph')
            ->setMethods(array('__construct'))
            ->getMockForAbstractClass();

        $contains_graph->add_edge($edge);

        $does_not_contain_graph = $this->getMockBuilder('\CentralDesktop\Spl\Graph')
            ->setMethods(array('__construct'))
            ->getMockForAbstractClass();

        $contains_a_graph = $this->getMockBuilder('\CentralDesktop\Spl\Graph')
            ->setMethods(array('__construct'))
            ->getMockForAbstractClass();

        $contains_a_graph->add_vertex($a);

        $contains_b_graph = $this->getMockBuilder('\CentralDesktop\Spl\Graph')
            ->setMethods(array('__construct'))
            ->getMockForAbstractClass();

        $contains_b_graph->add_vertex($b);

        $contains_c_graph = $this->getMockBuilder('\CentralDesktop\Spl\Graph')
            ->setMethods(array('__construct'))
            ->getMockForAbstractClass();

        $contains_c_graph->add_vertex($c);

        return array(
            array(
                $contains_graph,
                $edge,
                false,
                array($a, $b),
                array($edge)
            ),
            array(
                $does_not_contain_graph,
                $edge,
                true,
                array($a, $b),
                array($edge)
            ),
            array(
                $contains_a_graph,
                $edge,
                true,
                array($a, $b),
                array($edge)
            ),
            array(
                $contains_b_graph,
                $edge,
                true,
                array($a, $b),
                array($edge)
            ),
            array(
                $contains_c_graph,
                $edge,
                true,
                array($a, $b, $c),
                array($edge)
            )
        );
    }
}