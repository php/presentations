<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="Transform"> 
<xsl:output method="html" indent="yes" />

<xsl:template match="/search-results">
  <html><head><title>XSLT Freshmeat Demo</title></head>
  <body bgcolor="#FFFFFF">
  <table>
  <xsl:call-template name="matches"/>
  </table>
  </body></html>
</xsl:template>

<xsl:template name="matches">
  <xsl:for-each select="match">
    <tr>
      <td><xsl:value-of select="match_count"/></td>
      <td><a href="{url_homepage}"><xsl:value-of select="projectname_full"/></a></td>
      <td><xsl:value-of select="desc_short"/></td>
      <td><xsl:value-of select="date_updated"/></td>
      <td><xsl:value-of select="license"/></td>
    </tr>
  </xsl:for-each>
</xsl:template>

</xsl:stylesheet>
