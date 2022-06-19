<?php

namespace SensasiDelight\EigenvectorCentralityPHP;

use SensasiDelight\EigenvectorCentralityPHP\Algorithm;
use MathPHP\LinearAlgebra\Matrix;

class Graph
{
	public $nodes = [];
	public $edges = [];

	public function add_node($node)
	{
		if (!in_array($node, $this->nodes)) {
			$this->nodes[] = $node;
			$this->edges[$node] = [];
		}
	}

	public function add_nodes_from(array $nodes)
	{
		foreach ($nodes as $node) {
			$this->add_node($node);
		}
	}


	public function add_edge($node1, $node2)
	{
		if (!in_array($node1, $this->nodes)) {
			$this->add_node($node1);
		}

		if (!in_array($node2, $this->nodes)) {
			$this->add_node($node2);
		}

		if (!in_array($node2, $this->edges[$node1])) {
			$this->edges[$node1][] = $node2;
			$this->edges[$node2][] = $node1;
		}
	}

	public function add_edges_from(array $edges)
	{
		foreach ($edges as $edge) {
			$this->add_edge($edge[0], $edge[1]);
		}
	}

	public function get_eigenvector_centrality()
	{
		$eigenvectors = Algorithm::eigenvector_centrality($this);

		foreach ($this->nodes as $i => $node) {
			$return[$node] = $eigenvectors[$i];
		}

		return $return;
	}

	public function toMatrix()
	{
		$matrix = [];
		foreach ($this->nodes as $i => $node1) {
			$node_edges = $this->edges[$node1];
			foreach ($this->nodes as $j => $node2) {
				$matrix[$i][$j] = in_array($node2, $node_edges) ? 1 : 0;
			}
		}

		return new Matrix($matrix);
	}
}