<?php
/* load XML document from a string */
$xml = simplexml_load_string(file_get_contents(dirname(__FILE__) . '/thedata.xml'));

/* access the 1st <title> from the document */
echo array_shift($xml->xpath("//item[1]/title")) . "<br />";

/* get data from item entry with an id of 10149 */
echo '<pre>';
print_r($xml->xpath("//item[@id=10149]"));
echo '</pre>';
?>