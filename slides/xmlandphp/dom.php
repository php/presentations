<?php
include_once('dom.helpers.php');

$doc = new domdocument();
$doc->load('thedata.xml');

$wishlist = $doc->documentElement;
$nodes = $wishlist->childNodes;

foreach ($nodes as $node) {
	if ($node instanceof domelement) {
		process_item($node);
	}
}
?>
