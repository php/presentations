<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" />

<xsl:template match="/rss/channel">
 <html>
 <head>
  <title><xsl:value-of select="title"/></title>
 </head>
 <body bgcolor="#ffffff">
 <xsl:call-template name="items"/>
 </body>
 </html>
</xsl:template>

<xsl:template name="items">
 <xsl:for-each select="item">
  <a href="{link}"><xsl:value-of select="title"/></a><br/>
  <xsl:value-of select="description" /><br/>
 </xsl:for-each>
</xsl:template>
</xsl:stylesheet>
