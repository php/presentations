<?php
function comparator($a, $b) {
	if ($a < $b) return 1;
	if ($a > $b) return -1;
	return 0;
}

$heap = new Adt_Heap(ADT_HEAP_TYPE_BINARY, 
				     "comparator");
$heap->insert(0);
$heap->insert(5);
$heap->insert(10);
$heap->insert(15);
$heap->insert(20);

var_dump($heap->extract());
var_dump($heap->extract());
?>
