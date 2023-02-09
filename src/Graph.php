<?php

namespace SensasiDelight;

use SensasiDelight\Algorithm;
use MathPHP\LinearAlgebra\MatrixFactory;

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
		$this->add_node($node1);
		$this->add_node($node2);

		$isNodesConnected = in_array($node1, $this->edges[$node2]);
		$isNodeItSelf = $node1 === $node2;

		if (!$isNodesConnected && !$isNodeItSelf) {
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

	public function toArrayMatrix()
	{
		$arrayMatrix = [];
		foreach ($this->nodes as $i => $node1) {
			$node_edges = $this->edges[$node1];
			foreach ($this->nodes as $j => $node2) {
				$arrayMatrix[$i][$j] = in_array($node2, $node_edges) ? 1 : 0;
			}
		}

		return $arrayMatrix;
	}

	public function toMatrix()
	{
		return MatrixFactory::create($this->toArrayMatrix());
	}
}
