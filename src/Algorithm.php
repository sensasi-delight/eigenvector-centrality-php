<?php

namespace SensasiDelight;

use MathPHP\LinearAlgebra\MatrixFactory;
use SensasiDelight\Graph;

class Algorithm
{
	public static function eigenvector_centrality(Graph $graph)
	{
		// get the highest eigenvalues
		$eigenvalueMax = max($graph->toMatrix()->eigenvalues());
		
		// get the number of node
		$nNode = count($graph->nodes);

		// get the matrix in array form
		$arrayMatrix = $graph->toArrayMatrix();

		// subtract the middle with the highest eigenvalues
		for ($i = 0; $i < $nNode; $i++) {
			$arrayMatrix[$i][$i] = $arrayMatrix[$i][$i] - $eigenvalueMax;
		}

		// create MathPHP matrix from new ArrayMatrix
		$matrix = MatrixFactory::create($arrayMatrix);
		
		// $matrix->rref();
		$ce = $matrix->rref()->getColumn($nNode - 1);

		//sqrt transformation normalization;
		$rescaleValue = sqrt(array_sum(array_map(function ($c) {
			return pow($c, 2) ?: 1;
		}, $ce)));

        //normalize the score
		foreach ($ce as &$c) {
			$c = ($c ?: -1) * -1 / $rescaleValue;
		}

		return $ce;
	}
}
