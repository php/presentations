<?php
include_once('sax.interface.php');
include_once('sax.callback.php');

$x = xml_parser_create();

xml_set_element_handler(
	$x, 
	'w_start_tag', 
	'w_end_tag'
);

xml_set_character_data_handler(
	$x, 
	'w_data'
);

xml_parser_set_option(
	$x, 
	XML_OPTION_CASE_FOLDING, 
	true
);

$w = new Wishlist();

$fp = fopen("thedata.xml", "r");
while (!feof($fp)) {
	$line = fgets($fp, 4096);
	xml_parse($x, $line);
}
fclose($fp);

foreach ($w->items as $item) {
	echo $item->title . "\n";
}

// var_dump($w->items);
?>
