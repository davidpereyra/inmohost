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
<xsl:if test="$id = 'inmuebles'">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="tableOscura" id="inmuebles">
  <tr>
    <td align="center"><h2>ID</h2></td>
    <td align="center"><h2>Acci&oacute;n</h2></td>
    <td align="center"><h2>Detalles</h2></td>
    <td align="center"><h2>Fecha</h2></td>
  </tr>
<xsl:for-each select="XML/inmuebles/item">
  <tr class="tableClara">
    <td><div align="center"><xsl:value-of select="@id"/></div></td>
    <td><div align="center"><xsl:value-of select="./accion" disable-output-escaping="yes" /></div></td>
    <td><div align="center"><a href="javascript:;" class="menu" onclick="position(event); toolTip('{$file0}&amp;id={@id}&amp;cambio_id={cambio_id}',this)">ver</a></div></td>
    <td><div align="center"><xsl:value-of select="./fecha" disable-output-escaping="yes" /></div></td>
  </tr>
</xsl:for-each>
</table>
</xsl:if>

<xsl:if test="$id = 'inmueblesFull'">
<table width="98%" border="0" align="left" cellpadding="0" cellspacing="1" class="tableOscura" id="inmueblesFull">
  <tr>
    <td align="center"><h2>ID</h2></td>
    <td align="center"><h2>Acción</h2></td>
    <td align="center"><h2>Detalles</h2></td>
    <td align="center"><h2>Fecha</h2></td>
  </tr>
<xsl:for-each select="XML/inmuebles/item">
  <tr class="tableClara">
    <td><div align="center"><xsl:value-of select="@id" /></div></td>
    <td><div align="center"><xsl:value-of select="./accion" disable-output-escaping="yes" /></div></td>
    <td><div align="center"><a href="javascript:;" class="menu" onclick="parent.position(event); parent.toolTip('{$file0}&amp;id={@id}&amp;cambio_id={cambio_id}',this)">ver</a></div></td>
    <td><div align="center"><xsl:value-of select="./fecha" disable-output-escaping="yes" /></div></td>
  </tr>
</xsl:for-each>
</table>
</xsl:if>

<xsl:if test="$id = 'web'">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#666666" class="tableOscura" id="web">
  <tr>
    <td align="center"><h2>Acción</h2></td>
    <td align="center"><h2>Detalles</h2></td>
    <td align="center"><h2>Fecha</h2></td>
  </tr>
<xsl:for-each select="XML/web/item">
  <tr class="tableClara">
    <td><div align="center"><xsl:value-of select="./accion" disable-output-escaping="yes" /></div></td>
    <td><div align="center"><a href="javascript:;" class="menu" onclick="position(event); toolTip('{$file0}&amp;id={@id}',this)">ver</a></div></td>
    <td><div align="center"><xsl:value-of select="./fecha" disable-output-escaping="yes" /></div></td>
  </tr>
</xsl:for-each>
</table>
</xsl:if>

<xsl:if test="$id = 'webFull'">
  <table width="90%" border="0" align="left" cellpadding="0" cellspacing="1" bgcolor="#666666" class="tableOscura" id="webFull">
  <tr>
    <td align="center"><h2>Acción</h2></td>
    <td align="center"><h2>Detalles</h2></td>
    <td align="center"><h2>Fecha</h2></td>
  </tr>
	<xsl:for-each select="XML/web/item">
	  <tr class="tableClara">
		<td><div align="center"><xsl:value-of select="./accion" disable-output-escaping="yes" /></div></td>
		<td><div align="center"><a href="javascript:;" class="menu" onclick="parent.position(event); parent.toolTip('{$file0}&amp;id={@id}',this)">ver</a></div></td>
		<td><div align="center"><xsl:value-of select="./fecha" disable-output-escaping="yes" /></div></td>
	  </tr>
	</xsl:for-each>
</table>
</xsl:if>

</xsl:template>
</xsl:stylesheet>
