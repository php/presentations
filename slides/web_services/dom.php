<?php
// temporary data storage class
class entry {
	public $title, $link, $description;
}

$w = new entry();
$doc = new domdocument();
$doc->load(dirname(__FILE__) . '/thedata.xml');

$forum = $doc->documentElement;
$nodes = $forum->childNodes;

foreach ($nodes as $node) {
	if ($node instanceof domelement) {
		// process individual entry
		$id = $node->getAttribute('id');

		// process elements of the entry
		$children = $node->childNodes;
		foreach ($children as $element) {
			// import data from DOM tree into storage class
			if ($element instanceof domelement) {
				$w->{$element->tagName} = $element->nodeValue;
			}
		}

		echo "Title: <a href='{$w->link}'>{$w->title}</a><br />\n
			Body: {$w->description}<hr />";

		// reset data inside the storage class
		$w->link = $w->title = $w->description = NULL;
	}
}
?>
