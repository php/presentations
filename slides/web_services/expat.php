<?php
	// Evil pres2 hackery
	$path = dirname(__FILE__);

	include("{$path}/expat_callback.inc.php");

	$x = xml_parser_create();
	
	// tag handler
	xml_set_element_handler($x, 'w_start_tag', 'w_end_tag');
	
	// data handler
	xml_set_character_data_handler($x, 'w_data');
	                    
	// always make tag names uppercase
	xml_parser_set_option($x, XML_OPTION_CASE_FOLDING, TRUE);

	// parse xml file
	xml_parse($x, file_get_contents("{$path}/thedata.xml"));

	// free memory
	xml_parser_free($x);
?>