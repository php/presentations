<?php
define('URL', 'http://www.amazon.com/exec/obidos/%s/');

function process_item($item) 
{
	$id = $item->getAttribute('id');
	echo '<a href="';
	printf(URL, $id);
	echo '">';
	
	$children = $item->childNodes;
	foreach ($children as $element) {
		if ($element instanceof domelement) {
			process_subelement($element);
		}
	}
}


function process_subelement($element)
{
	$name = $element->tagName;
	$e = array_shift($element->childNodes);
	$data = trim($e->nodeValue);

	switch ($name) {
	case 'title':
		echo $data;
		echo "</a>\n";
		break;
	case 'author':
		echo "<p>By: $data</p>\n";
		break;
	case 'description':
		echo "<p>\n$data\n</p>\n";
		break;
	}

}
?>
