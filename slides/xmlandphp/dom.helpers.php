<?php
define('URL', 'http://www.amazon.com/exec/obidos/%s/');

function process_item($item) 
{
	$id = $item->get_attribute('id');
	echo '<a href="';
	printf(URL, $id);
	echo '">';
	
	$children = $item->children();
	foreach ($children as $element) {
		if ($element instanceof domelement) {
			process_subelement($element);
		}
	}
}


function process_subelement($element)
{
	$name = $element->tagname;
	$e = array_shift($element->children());
	$data = trim($e->content);

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
