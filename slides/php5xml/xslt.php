<?php
$path = dirname(__FILE__) . '/';

/* load XSLT Stylesheet as if it were a regular XML file via DOM extension */
$xslDom = new domdocument;
$xslDom->load($path . 'forum.xsl');

/* load the actual XML data we will use to populate the stylesheet */
$xmlDom = new domdocument;
$xmlDom->load($path . 'thedata.xml');

$xsl = new XsltProcessor; // instantiate XSLT processor
$xsl->importStylesheet($xslDom); // load stylesheet
echo $xsl->transformToXML($xmlDom); // perform the transformation & return HTML
?>