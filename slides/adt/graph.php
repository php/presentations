<?php
function comparator($a, $b) {
	return ($a == $b);
}

$g = new Adt_Graph(ADT_GRAPH_TYPE_DIRECTED,
				   "comparator");

$g->insert_vertex("english");
$g->insert_vertex("german");

$g->insert_edge("english", "hi");
$g->insert_edge("english", "heya");
$g->insert_edge("english", "howdy");
$g->insert_edge("english", "hallo");

$g->insert_edge("german", "moin");
$g->insert_edge("german", "servas");

$g->remove_edge("english", "hallo");
?>
