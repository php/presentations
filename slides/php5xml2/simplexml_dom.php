<?php
$xml = simplexml_load_file(dirname(__FILE__) . '/thedata.xml');

/* convert SimpleXML to DOM object */
$dom = dom_import_simplexml($xml);

/* convert from DOM object back to SimpleXML */
$xml2 = simplexml_import_dom($dom);

/* confirm that no data was lost */
echo ($xml2->asXML() == $xml->asXML());
?>