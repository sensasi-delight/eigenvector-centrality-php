<?php

namespace SensasiDelight\EigenvectorCentralityPHP;

use Aboks\PowerIteration\PowerIteration;
use SensasiDelight\EigenvectorCentralityPHP\Graph;

class Algorithm
{
	public static function eigenvector_centrality(Graph $graph)
	{
		$power_iteration = new PowerIteration();
		$dominant_eigenpair = $power_iteration->getDominantEigenpair($graph->toMatrix());
		
		return $dominant_eigenpair->getEigenvector();
	}
}