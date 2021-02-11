<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/red_inmobiliarias.xml.php" -->
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
<xsl:param name="fileMenInmo" />
<xsl:template match="/">

<table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableOscura">
  <xsl:for-each select="inmodb/usuarios">
			<xsl:choose>
				<xsl:when test="usr_red=0">
				<!--tr class="tableClara" onmouseover="changeStyle('{usr_id}', 'tableClara', 'temporal');" onmouseout="changeStyle('{usr_id}', 'tableClara', 'temporal');" onclick="$('capa1').style.display='';$('capa2').style.display='';traeURL('{$fileMenInmo}?id_inmo={usr_id}', 'contenidoInmobiliaria');" id="{usr_id}" title="{usr_raz}"-->
				<tr class="tableClara">
						<!--td width="120"><div align="center"><img src="{usr_logo}" width="75" height="75" hspace="2" vspace="2" border="0" /></div></td-->
						<td valign="top"><div align="left"><h2> <xsl:value-of select="usr_raz" disable-output-escaping="yes"/></h2>
						  <h3> Titular: <xsl:value-of select="usr_titular" disable-output-escaping="yes"/></h3>
						  <ul>
							<li><xsl:value-of select="usr_mail" disable-output-escaping="yes"/></li>
							<li><xsl:value-of select="usr_tel" disable-output-escaping="yes"/></li>
							<li><xsl:value-of select="usr_web" disable-output-escaping="yes"/></li>
						  </ul>
						</div></td>
					  </tr>
				</xsl:when>
				<xsl:otherwise>
					<!--tr class="destacado" onmouseover="changeStyle('{usr_id}', 'destacado', 'temporal');" onmouseout="changeStyle('{usr_id}', 'destacado', 'temporal');" onclick="$('capa1').style.display='';$('capa2').style.display='';traeURL('{$fileMenInmo}?id_inmo={usr_id}', 'contenidoInmobiliaria');" id="{usr_id}" title="{usr_raz}"-->
					<tr class="destacado">
						<!--td width="120"><div align="center"><img src="{usr_logo}" width="75" height="75" hspace="2" vspace="2" border="0" /></div></td-->
						<td valign="top"><div align="left">
						  <h2><img src="../interfaz/inmohost/images/iconos/red/20/compartiendo.png" width="20" height="20" hspace="2" vspace="2" align="right" />&nbsp;- <xsl:value-of select="usr_raz" disable-output-escaping="yes"/></h2>
						  <h3> Titular: <xsl:value-of select="usr_titular" disable-output-escaping="yes"/></h3>
						  <ul>
							<li><xsl:value-of select="usr_mail" disable-output-escaping="yes"/></li>
							<li><xsl:value-of select="usr_tel" disable-output-escaping="yes"/></li>
							<li><xsl:value-of select="usr_web" disable-output-escaping="yes"/></li>
						  </ul>
						</div></td>
					  </tr>

				</xsl:otherwise>
			</xsl:choose>
  </xsl:for-each>
 </table>

</xsl:template>
</xsl:stylesheet>
