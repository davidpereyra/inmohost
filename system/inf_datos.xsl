<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="menu.xml" -->
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
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-left:2px">
  <tr>
    <td valign="top"><h1>Referencia:
    </h1>
<ul>
<xsl:for-each select="root/config/products/product">
<xsl:variable name="limpio" select="normalize-space(titulo)"/>
				<li style="color:#{color}"><font face="Arial" size="2" ><xsl:value-of select="name"/>: <xsl:value-of select="value"/></font></li>
</xsl:for-each>
	  </ul>	
	</td>
  </tr>
</table>
</xsl:template>
</xsl:stylesheet>
