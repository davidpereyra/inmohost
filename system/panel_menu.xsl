<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="../../sistema inmohost/xml/menu.xml" -->
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
<xsl:for-each select="XMLMENU/contenido/items">
<xsl:if test="../titulo = 'Control'">
<xsl:variable name="numberOfQuestions" select="count(item) div 2"/>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableOscura" style="margin-left:2px">
  <tr class="tableClara">
<xsl:for-each select="item">
	<xsl:variable name="modulo" select="(position()-1) mod 2" />
	<xsl:if test="$modulo = 0">
	<td width="{floor(100 div $numberOfQuestions)}%">
		<div align="center">
			<xsl:choose>
				<xsl:when test="@estado=1">
					  <a onclick="{@destino}" class="menuItem" title="{normalize-space(.)}">
					  <img src="../{@icono}" border="0" width="20" height="20"/></a>
				</xsl:when>
				<xsl:otherwise>
						<span class="menuItem" title="{$nodisponible}" style="text-align:center">
						<img src="../{@icono}" border="0" width="20" height="20"/>
				  </span>
				</xsl:otherwise>
			</xsl:choose>
		</div>
	</td>
	</xsl:if>
</xsl:for-each>
  </tr>
  <tr class="tableClara">
<xsl:for-each select="item">
	<xsl:variable name="modulo" select="(position()-1) mod 2" />
	<xsl:if test="$modulo = 1">
	<td>
		<div align="center">
			<xsl:choose>
				<xsl:when test="@estado=1">
					  <a onclick="{@destino}" class="menuItem" title="{normalize-space(.)}">
					  <img src="../{@icono}" border="0" width="20" height="20"/></a>
				</xsl:when>
				<xsl:otherwise>
						<span class="menuItem" title="{$nodisponible}" style="text-align:center">
						<img src="../{@icono}" border="0" width="20" height="20"/>
				  </span>
				</xsl:otherwise>
			</xsl:choose>
		</div>
	</td>
	</xsl:if>
</xsl:for-each>
  </tr>
</table>
</xsl:if>
</xsl:for-each>
</xsl:template>
</xsl:stylesheet>
