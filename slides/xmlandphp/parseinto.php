<?php
$data = file_get_contents('thedata.xml');

$x = xml_parser_create();

xml_parser_set_option(
	$x, 
	XML_OPTION_CASE_FOLDING, 
	true
);

xml_parser_set_option(
	$x,
	XML_OPTION_SKIP_WHITE, 
	true
);

xml_parse_into_struct($x, 
					  $data, 
					  $wishlist, 
					  $tags);

xml_parser_free($x);


// Access All Description Elements
$descs = $tags['DESCRIPTION'];
foreach ($descs as $descid) {
	echo $wishlist[$descid]['value'];
	echo "\n<br />\n";
}
?>
