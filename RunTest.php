<?php

/*
 * Author: doug@neverfear.org
 */

require("Dijkstra.php");

function runTest() {
	$g = new Graph();
	$g->addedge("a", "b", 4);
	$g->addedge("a", "d", 1);

	$g->addedge("b", "a", 74);
	$g->addedge("b", "c", 2);
	$g->addedge("b", "e", 12);

	$g->addedge("c", "b", 12);
	$g->addedge("c", "j", 12);
	$g->addedge("c", "f", 74);

	$g->addedge("d", "g", 22);
	$g->addedge("d", "e", 32);

	$g->addedge("e", "h", 33);
	$g->addedge("e", "d", 66);
	$g->addedge("e", "f", 76);

	$g->addedge("f", "j", 21);
	$g->addedge("f", "i", 11);

	$g->addedge("g", "c", 12);
	$g->addedge("g", "h", 10);

	$g->addedge("h", "g", 2);
	$g->addedge("h", "i", 72);

	$g->addedge("i", "j", 7);
	$g->addedge("i", "f", 31);
	$g->addedge("i", "h", 18);

	$g->addedge("j", "f", 8);


	list($distances, $prev) = $g->paths_from("a");
	
	$path = $g->paths_to($prev, "i");
	
	print_r($path);
	
}


runTest();

