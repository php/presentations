<?php
$doc = new domdocument();
$doc->load('data.rss');

$ctx = new domXpath($doc);

$node = $ctx->query(
	'/rss/channel/item/title/text()'
);
echo 'Title: ';
echo $node[0]->nodeValue;
echo "\n";
?>
