<?php
include_once('dom.helpers.php');

$doc = xmldocfile('thedata.xml');

$wishlist = $doc->root();
$nodes = $wishlist->children();

foreach ($nodes as $node) {
	if ($node instanceof domelement) {
		process_item($node);
	}
}
?>
