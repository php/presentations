<?php
$doc = xmldocfile('data.rss');
$ctx = $doc->xpath_new_context();

$node = $ctx->xpath_eval(
	'/rss/channel/item/title/text()'
);
echo 'Title: ';
echo $node->nodeset[0]->content;
echo "\n";
?>
