<?php

$xslDom = new domdocument;
$xslDom->load('rss.xsl');

$xmlDom = new domdocument;
$xmlDom->load('data.rss');

$xsl = new xsltprocessor;
$xsl->importStylesheet($xslDom);
print $xsl->transformToXML($xmlDom);

?>