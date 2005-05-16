<?php
$dom = new domDocument('1.0');
$dom->formatOutput = true; // make output be nicely formatted
$root = $dom->createElement('root'); // create new element
foreach (array('foo', 'bar', 'baz') as $v) {
	$node = $dom->createElement($v); // create new sub-element
	$node->appendChild($dom->createTextNode($v)); // add value to element
	$root->appendChild($node); // append sub-element to root element
}
$dom->appendChild($root); // add root node to document
$xml = $dom->saveXML(); // output XML

echo nl2br(htmlspecialchars($xml));
?>