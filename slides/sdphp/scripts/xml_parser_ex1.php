<?php

$xml_file = 'presentations/slides/sdphp/data/sdphp_talk.xml';
$ltag = '';
$lcontent = '';

// structure for store the document data
$elements = array();

function startElement($parser, $name, $attrs) {
	if (strtolower($name) == 'talk') // skip the talk element
		return;
	else
		$GLOBALS['ltag'] = $name;
}

function endElement($parser, $name) {
	if (!trim($GLOBALS['ltag']) == '') {
		$GLOBALS['elements'][$name] = $GLOBALS['lcontent'];
		$GLOBALS['ltag'] = $GLOBALS['lcontent'] = '';
	}
}

function cData($parser, $data) {
	$GLOBALS['lcontent'] = trim($data);
}

$parser = xml_parser_create();
xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, true);
xml_set_element_handler($parser, 'startElement', 'endElement');
xml_set_character_data_handler($parser, 'cData');

$fp = fopen($xml_file, 'r');

while ($data = fread($fp, 1024)) {
	if (!xml_parse($parser, $data, feof($fp))) {
		die(sprintf("Error in XML file: %s at line %d\n",
				xml_error_string(xml_get_error_code($parser)),
				xml_get_current_line_number($parser)));
	}
}

xml_parser_free($parser);
print_r($elements);

?> 
