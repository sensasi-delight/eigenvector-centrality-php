<?php

require_once __DIR__ . '/../vendor/autoload.php';

use SensasiDelight\Graph;

$g = new Graph;

/**
 * 1. Adding the nodes (optional)
 */
$g->add_node('v1');
$g->add_node('v2');
$g->add_node('v3');
$g->add_node('v4');
$g->add_node('v5');

/**
 * Alternative way to adding the nodes
 */
// $g->add_nodes_from([
// 	'v1',
// 	'v2',
// 	'v3',
// 	'v4',
// 	'v5',
// ]);

/**
 * 2. Adding the edges
 */
$g->add_edge('v1', 'v2');
$g->add_edge('v1', 'v4');
$g->add_edge('v2', 'v3');
$g->add_edge('v2', 'v4');
$g->add_edge('v2', 'v5');
$g->add_edge('v3', 'v4');

/**
 * Alternative way for adding the edges
 */
// $g->add_edges_from([
// 	['v1', 'v2'],
// 	['v1', 'v4'],
// 	['v2', 'v3'],
// 	['v2', 'v4'],
// 	['v2', 'v5'],
// 	['v3', 'v4']
// ]);

/**
 * Get and print the calculation result
 */
$result = $g->get_eigenvector_centrality();
print_r($result);
