<?php
include "parse.inc";
include "clean.inc";

function add_child($root, $data)
{
	$item = $root->createElement("item");

	foreach ($data as $k => $v) {
		$element = $root->createElement($k);
		$element->appendChild($root->createTextNode($v));
		$item->appendChild($element);
	}

	$root->documentElement->appendChild($item);
}

// Using Sax retrive the 1st entry from each rdf feed
// Since we do not intend to parse the entire file SAX is
// more effecient then DOM in this case.
$path = dirname(__FILE__);
$freshmeat = parse_xml_url("{$path}/fm-releases.rdf");
$slashdot = parse_xml_url("{$path}/slashdot.rdf");
$pear = parse_xml_url("{$path}/pear.rdf");

$data = array($freshmeat, $slashdot, $pear);

// now using the given rss data, make our own XML(RDF) feed.
$dom = new domDocument("1.0");

// create root element
$root = $dom->createElement("channel");
$dom->appendChild($root);

// append children (data from existing rss feeds);
foreach ($data as $v) {
	add_child($dom, $v);
}

// generate our own feed
$output = $dom->saveXML();

// make output presentable
echo clean($output);
?>