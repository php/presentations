<?php
$dom = new domDocument();
$data = file_get_contents(dirname(__FILE__) . "/thedata.xml");
$dom->loadXML($data); // load data from XML string
$xp = new DomXPath($dom); // create XPath object
$res = $xp->query("//item/title"); // get title element
echo $res->item(0)->nodeValue; // get data from 1st entry
?>