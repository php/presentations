<?php
$dom = new domDocument();
$dom->load(dirname(__FILE__) . "/thedata.xml");

$root = $dom->documentElement; // <forum>
foreach ($root->childNodes as $child) {
	if ($child->nodeType == XML_ELEMENT_NODE) { // <item>
		$id = $child->getAttribute("id"); // <item id="value">
		echo "item #{$id}<br />";
		foreach ($child->childNodes as $c2) { // item nodes
			if ($c2->nodeType == XML_ELEMENT_NODE) { // <title>, <link>
				echo "{$c2->nodeName} => {$c2->nodeValue}<br />";
			}
		}
	}
}
?>