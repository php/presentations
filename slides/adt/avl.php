<?php
function comparator($a, $b) {
	if ($a < $b) return 1;
	if ($a > $b) return -1;
	return 0;
}

$tree = adt_tree_new(
	ADT_TREE_TYPE_BINARY_SEARCH, 
    "comparator"
);
adt_tree_insert($tree, 12);
adt_tree_insert($tree, 20);
adt_tree_insert($tree, 15);
adt_tree_insert($tree, 13);
adt_tree_insert($tree, 28);
var_dump(
	adt_tree_search($tree, 28, "comparator")
);
adt_tree_traverse($tree, 0, "var_dump");
?>
