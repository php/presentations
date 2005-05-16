<?php
$dom = new domDocument(); // create a DOM object
$dom->load(dirname(__FILE__) . "/thedata.xml"); // load data from XML file

/* access elements by tag name */
foreach ($dom->getElementsByTagName('title') as $node) {
	echo $node->nodeValue . "<br />";
}
?>