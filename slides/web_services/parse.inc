<?php

function parse_xml_url($url)
{
	$x = xml_parser_create();
	xml_parser_set_option($x, XML_OPTION_CASE_FOLDING, true);
	xml_parser_set_option($x, XML_OPTION_SKIP_WHITE, true);
	xml_parse_into_struct($x, file_get_contents($url), $forum, $tags);
	xml_parser_free($x);

	return @array(
			'title'	=> $forum[$tags['TITLE'][0]]['value'],
			'body'	=> $forum[$tags['DESCRIPTION'][0]]['value'],
			'link'	=> $forum[$tags['LINK'][0]]['value']
		);
}

?>