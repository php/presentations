<?php
$dom = new domDocument('1.0');
$dom->load(dirname(__FILE__) . "/thedata.xml");

$new_item = $dom->createElement('item');
$new_item->setAttribute("id", 1234); // set attribute id for new item
foreach (array('title', 'link', 'description') as $v) {
	$node = $dom->createElement($v);
	$node->appendChild($dom->createTextNode($v));
	$new_item->appendChild($node);
}
// append entry to existing forum entries
$dom->documentElement->appendChild($new_item);
$xml = $dom->saveXML();

echo nl2br(htmlspecialchars(str_replace('><', ">\n<", $xml)));
?>