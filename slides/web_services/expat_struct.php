<?php
$x = xml_parser_create();

// uppercase xml elements
xml_parser_set_option($x, XML_OPTION_CASE_FOLDING, TRUE);

// spaces begone!!
xml_parser_set_option($x, XML_OPTION_SKIP_WHITE, TRUE);

$data = file_get_contents(dirname(__FILE__) . '/thedata.xml');

xml_parse_into_struct($x, $data, $forum, $tags);
                                                                  
xml_parser_free($x);

// Woohooo, we're done!

// count number of instances of a particular property to 
// determine the number of entries inside the XML file
$num_elements = count($tags['DESCRIPTION']);

for($i = 0; $i < $num_elements; $i++) {
	$title = $forum[$tags['TITLE'][$i]]['value'];
	$body = $forum[$tags['DESCRIPTION'][$i]]['value'];
	$link = $forum[$tags['LINK'][$i]]['value'];

	echo "Title: <a href='{$link}'>{$title}</a><br />
		Body: {$body}<hr />";
}
?>