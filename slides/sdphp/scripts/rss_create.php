<?php
include_once 'rss10.inc';

$xmlfile = 'presentations/slides/sdphp/data/sdphp_talks.xml';
$talks = processXML($xmlfile);

$rss = new RSSWriter('http://www.sdphp.net',
		'SDPHP users group',
		'Talks given at the monthly meetings');

foreach ($talks as $talk) {
	$url = $talk->elements['url'];
	$title = $talk->elements['title'];
	$desc = 'Speaker: '.$talk->elements['speaker'].
			', Date: '.$talk->elements['date'];
	$rss->addItem($url, $title, array('description'=>$desc));
}

echo $rss->toString();


// from a previous example
class Talk {

	var $elements;

	function Talk($elements) {
		$this->elements = $elements;
	}
	
	function toString() {
		foreach ($this->elements as $key=>$value)
			printf("<i>%s</i> :: %s<br>\n", $key, $value);
	}
} // end of class Talk

function processXML($filename) {
    // read the xml document
    $data = implode("",file($filename));
    $parser = xml_parser_create();
    xml_parser_set_option($parser,XML_OPTION_CASE_FOLDING,0);
    xml_parser_set_option($parser,XML_OPTION_SKIP_WHITE,1);
    xml_parse_into_struct($parser,$data,$values,$tags);
    xml_parser_free($parser);
	$talks = array();
	// loop through the structures
    foreach ($tags as $key=>$val) {
        if ($key == "talk") {
            $ranges = $val;
			$nranges = count($ranges);
            // each contiguous pair of array entries are the
            // lower and upper range for each talk elements
            for ($i=0; $i < $nranges; $i+=2) {
                $offset = $ranges[$i] + 1;
                $len = $ranges[$i + 1] - $offset;
                $talks[] =& parseTalk(array_slice($values, $offset, $len));
            }
        } else {
            continue;
        }
    }
    return $talks;
} 

function &parseTalk($values) {
	$n = count($values);
	$talk = array();
    for ($i=0; $i < count($values); $i++)
        $talk[$values[$i]["tag"]] = $values[$i]["value"];
    return new Talk($talk);
} 

?>
