<?php
$t = new Adt_Tree(ADT_TREE_TYPE_BINARY);
$r = $t->insert_root("Tree Root");
echo $r->data() . "\n<br>\n";

$sr = $r->insert_right("Right Branch");
echo $r->right()->data();
?>
