<?php
$xml = '<articles>
<article id="1">
	<title>Something Happened</title>
	<author>Random Person</author>
</article>
<article id="2">
	<title>Something Else Happened</title>
	<author>Different Person</author>
</article>
</articles>';

$xsl = '<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output indent="yes" method="xml" encoding="iso-8859-1" />

<xsl:template match="/">
	<xsl:apply-templates select="//article"/>
</xsl:template>

<xsl:template match="article">
	Title: <xsl:value-of select="title"/><br />
	Author: <xsl:value-of select="author"/><br />
	<hr />
</xsl:template>

</xsl:stylesheet>';

/* load XSLT Stylesheet */
$xslDom = new domDocument();
$xslDom->loadXML($xsl);

/* load XML data */
$xmlDom = new domDocument();
$xmlDom->loadXML($xml);

$xsl = new XsltProcessor(); // instantiate XSLT processor
$xsl->importStylesheet($xslDom); // load stylesheet
echo $xsl->transformToXML($xmlDom); // perform the transformation & return HTML
?>