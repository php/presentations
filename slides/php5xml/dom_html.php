<?php
$dom = new DomDocument();
/* load HTML document (if it is not valid) */
@$dom->loadHTMLFile("http://" . $_SERVER['SERVER_ADDR'] . 
	dirname($_SERVER['PHP_SELF']) . '/1');

$xp = new DomXpath($dom);
/* use XPath to get the title of the */
$res = $xp->query("//title/text()");
echo $res->item(0)->nodeValue;
?>