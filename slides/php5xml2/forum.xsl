<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output indent="yes" method="xml" encoding="iso-8859-1" />

<xsl:template match="/">
 <html>
 <head />
 <body bgcolor="#ffffff">
 <xsl:apply-templates select="/forum/item"/>
 </body>
 </html>
</xsl:template>

<xsl:template match="item">
  <div>
  <a href="{link}"><xsl:value-of select="title"/></a><br/>
  <xsl:value-of select="description" /><br /><hr />
  </div>
</xsl:template>
</xsl:stylesheet>
