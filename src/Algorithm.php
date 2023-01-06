<?php

namespace SensasiDelight;

use MathPHP\LinearAlgebra\MatrixFactory;
use SensasiDelight\Graph;

class Algorithm
{
	public static function eigenvector_centrality(Graph $graph)
	{
		$eigenvalueMax = max($graph->toMatrix()->eigenvalues());
		$nNode = count($graph->nodes);

		$arrayMatrix = $graph->toArrayMatrix();

		for ($i = 0; $i < $nNode; $i++) {
			$arrayMatrix[$i][$i] = $arrayMatrix[$i][$i] - $eigenvalueMax;
		}

		$matrix = MatrixFactory::create($arrayMatrix);
		$ce = $matrix->rref()->getColumn($nNode - 1);

		//sqrt transformation normalization;
		$rescaleValue = sqrt(array_sum(array_map(function ($c) {
			return pow($c, 2) ?: 1;
		}, $ce)));

		foreach ($ce as &$c) {
			$c = ($c ?: -1) * -1 / $rescaleValue;
		}

		return $ce;
	}
}
