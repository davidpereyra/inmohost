<?xml version="1.0" encoding="iso-8859-1"?>
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
<xsl:param name="id" />
<xsl:template match="/">
<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td><a onclick="cerrarNews();"><img src="../interfaz/inmohost/images/botones/closeG15.png" alt="cerrar" width="15" height="15" border="0" align="right" /></a></td>
  </tr>
  <tr>
    <td>
  <xsl:for-each select="noticias/item">
  <xsl:if test="$id = guid">
	    <h1><xsl:value-of select="title" disable-output-escaping="yes"/></h1>
		<div align="left">
		<img src="{image/url}" alt="{image/title}" hspace="2" vspace="2" border="0" align="right" /><xsl:value-of select="description" disable-output-escaping="yes"/><br /><xsl:value-of select="contenido" disable-output-escaping="yes"/></div>
		</xsl:if>
  </xsl:for-each>
  </td>
  </tr>
</table>
	<br />
	<br />
</xsl:template>
</xsl:stylesheet>