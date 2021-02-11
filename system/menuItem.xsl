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

<xsl:for-each select="XMLMENU/contenido">
<xsl:variable name="items" select="count(./items/item)" />
<xsl:variable name="maximo" select="7" />
<xsl:variable name="nodisponible">servicio no disponible</xsl:variable>
    <table width="100%" border="0" cellpadding="0" cellspacing="2" id="menu{@id}" >
		<xsl:if test="@inicio=0">
			<xsl:attribute name="style">
			<xsl:text>display:none</xsl:text>
			</xsl:attribute>
		</xsl:if>
      <tr>
		<xsl:choose>
          <xsl:when test="$items &lt;= $maximo">
       <td width="30%" valign="top" style='padding-top:10px;'>
         <xsl:for-each select="items/item">
			<xsl:choose>
				<xsl:when test="@estado=1">
					<xsl:if test="@inicio = 1">
					<script type="text/JavaScript">
					<xsl:value-of select="@destino" /> 
					</script>
				</xsl:if>
					<div align="center">
					  <a class="menuItem" title="{normalize-space(.)}" onclick="{@destino}" >
					  <img src="{@icono}" border="0" width="32" height="32"/><br />
						<xsl:value-of select="."/></a>
					</div>
				</xsl:when>
				<xsl:otherwise>
						<span class="menuItem" title="{$nodisponible}" style="text-align:center">
						<img src="{@icono}" border="0" width="32" height="32"/><br />
						<xsl:value-of select="."/>
				  </span>
				</xsl:otherwise>
			</xsl:choose>
          </xsl:for-each>
          </td>
          <td valign="top" width="70%"><div align="center" id="contenidoMenuActual{@id}" class="contenidoMenuActual"></div></td>
          </xsl:when>
          <xsl:otherwise>
			<xsl:variable name="filas" select="ceiling($items div $maximo)"/>
			<td width="33%" valign="top">
				<div align="center">
         <xsl:for-each select="items/item">
			<xsl:variable name="modulo" select="(position()-1) mod $filas" />
			<xsl:if test="$modulo = 0">
			<xsl:choose>
				<xsl:when test="@estado=1">
					  <a onclick="{@destino}" class="menuItem" title="{normalize-space(.)}">
					  <img src="{@icono}" border="0" width="32" height="32"/><br />
						<xsl:value-of select="."/></a>
				</xsl:when>
				<xsl:otherwise>
						<span class="menuItem" title="{$nodisponible}" style="text-align:center">
						<img src="{@icono}" border="0" width="32" height="32"/><br />
						<xsl:value-of select="."/>
				  </span>
				</xsl:otherwise>
			</xsl:choose>
			</xsl:if>
          </xsl:for-each>
				</div>		  
			</td>
			<td width="34%" valign="top">
				<div align="center">
         <xsl:for-each select="items/item">
			<xsl:variable name="modulo" select="(position()-1) mod $filas" />
			<xsl:if test="$modulo = 1">
			<xsl:choose>
				<xsl:when test="@estado=1">
					  <a onclick="{@destino}" class="menuItem" title="{normalize-space(.)}">
					  <img src="{@icono}" border="0" width="32" height="32"/><br />
						<xsl:value-of select="."/></a>
				</xsl:when>
				<xsl:otherwise>
						<span class="menuItem" title="{$nodisponible}" style="text-align:center">
						<img src="{@icono}" border="0" width="32" height="32"/><br />
						<xsl:value-of select="."/>
				  </span>
				</xsl:otherwise>
			</xsl:choose>
			</xsl:if>
          </xsl:for-each>
				</div>			  
			</td>
			<td width="33%" valign="top">
				<div align="center">
         <xsl:for-each select="items/item">
			<xsl:variable name="modulo" select="(position()-1) mod $filas" />
			<xsl:if test="$modulo = 2">
			<xsl:choose>
				<xsl:when test="@estado=1">
					  <a onclick="{@destino}" class="menuItem" title="{normalize-space(.)}">
					  <img src="{@icono}" border="0" width="32" height="32"/><br />
						<xsl:value-of select="."/></a>
				</xsl:when>
				<xsl:otherwise>
						<span class="menuItem" title="{$nodisponible}" style="text-align:center">
						<img src="{@icono}" border="0" width="32" height="32"/><br />
						<xsl:value-of select="."/>
				  </span>
				</xsl:otherwise>
			</xsl:choose>
			</xsl:if>
          </xsl:for-each>
				</div>			  
			</td>		
			</xsl:otherwise>
        </xsl:choose>
        </tr>
    </table>
</xsl:for-each>

</xsl:template>
</xsl:stylesheet>
