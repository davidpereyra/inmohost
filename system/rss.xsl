<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="rss.xml" -->
<!DOCTYPE xsl:stylesheet  [
  <!ENTITY nbsp   "&#160;">
  <!ENTITY copy   "&#169;">
  <!ENTITY reg    "&#174;">
  <!ENTITY trade  "&#8482;">
  <!ENTITY mdash  "&#8212;">
  <!ENTITY ldquo  "&#8220;">
  <!ENTITY rdquo  "&#8221;"> 
  <!ENTITY pound  "&#163;">
  <!ENTITY yen    "&#165;">
  <!ENTITY euro   "&#8364;">
  <!ENTITY aacute "&#225;">
  <!ENTITY Aacute "&#193;">
  <!ENTITY eacute "&#233;">
  <!ENTITY Eacute "&#201;">
  <!ENTITY iacute "&#237;">
  <!ENTITY Iacute "&#205;">
  <!ENTITY oacute "&#243;">
  <!ENTITY Oacute "&#211;">
  <!ENTITY uacute "&#250;">
  <!ENTITY Uacute "&#218;">
  <!ENTITY ntilde "&#242;">
  <!ENTITY Ntilde "&#209;">
]>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" encoding="iso-8859-1"/>
<xsl:template match="/">
<table width="180" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td valign="top">
      <xsl:for-each select="rss/channel/item">
		<div align="right">
			<xsl:variable name="year" select="substring-before(pubDate, '-')" />
			<xsl:variable name="mes" select="substring-before(substring-after(pubDate, '-'), '-')" />
			<xsl:variable name="dia" select="substring-after(substring-after(pubDate, '-'), '-')" />
			<xsl:value-of select="$dia" />/<xsl:value-of select="$mes" />/<xsl:value-of select="$year" />        </div>
        <div align="left">
          <a href="#inicio" onclick="ampliarNews({guid})" title="ampliar {title}">
          <h2><xsl:value-of select="title"/></h2></a>        </div>
		<div align="left"><a href="#inicio" onclick="ampliarNews({guid})" title="ampliar {title}"><xsl:value-of select="description" disable-output-escaping="yes"/></a></div>
		<hr />
      </xsl:for-each>    </td>
  </tr>
</table>
	
</xsl:template>
</xsl:stylesheet>