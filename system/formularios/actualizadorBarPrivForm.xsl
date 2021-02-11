<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="file:///C|/wamp/www/sistema inmohost/xml/actualizador_resumen.xml" -->
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
<xsl:param name="file0" />
<xsl:param name="accion" />


<xsl:template match="/">

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="tableOscura" id="inmuebles">
  <tr>
    <td align="center"><h2>Barrio</h2></td>
    <td align="center"><h2>Acci&oacute;n</h2></td>
    <td align="center"><h2>Detalle</h2></td>
    <td align="center"><h2>Fecha</h2></td>
  </tr>
<xsl:for-each select="XML/bar_priv/item">
  <tr class="tableClara">
    <td><div align="center"><xsl:value-of select="./bar_denom" disable-output-escaping="yes" /></div></td>
    <td><div align="center"><xsl:value-of select="./cambio_det" disable-output-escaping="yes" /></div></td>
    <td><div align="center"><a href="javascript:;" class="menu" onclick="position(event); toolTip('{$file0}&amp;bar_id={bar_id}&amp;cambio_id={cambio_id}',this)">ver</a></div></td>
    <td><div align="center"><xsl:value-of select="./fecha" disable-output-escaping="yes" /></div></td>
  </tr>
</xsl:for-each>
</table>


</xsl:template>
</xsl:stylesheet>
