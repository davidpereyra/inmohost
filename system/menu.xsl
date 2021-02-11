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
<table width="380px" border="0" cellspacing="0" cellpadding="0" style="margin-left:2px">
  <tr>
    <td width="10" valign="top">
    	<a href="javascript:display('menuPrincipal');" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('closeMenu2','','interfaz/inmohost/images/botones/masN10.png',1)"><img src="interfaz/inmohost/images/botones/masG10.png" alt="Mostrar Menu" name="closeMenu2" width="10" height="10" border="0" align="left" id="closeMenu2" /></a>
    	</td>
<xsl:variable name="numberOfQuestions" select="count(XMLMENU/contenido)"/>
<xsl:for-each select="XMLMENU/contenido">
    <td width="{floor(340 div $numberOfQuestions)}">
	<div align="center">
			<div>
			<xsl:choose>
				<xsl:when test="web_default!=''">
					<a href="javascript:displayMenu('menu{@id}', {$numberOfQuestions}, '{normalize-space(titulo)}');traeURL('{web_default}','contenidoMenuActual{@id}')" class="menuItem" title="{normalize-space(titulo)}">
					
						<img src="{@icono}" width="20" height="20"/>
						<br /><xsl:value-of select="normalize-space(titulo)"/></a>
				</xsl:when>
				<xsl:otherwise>
					<a href="javascript:displayMenu('menu{@id}', {$numberOfQuestions}, '{normalize-space(titulo)}');" class="menuItem" title="{normalize-space(titulo)}">
					
						<img src="{@icono}" width="20" height="20"/>
						<br /><xsl:value-of select="normalize-space(titulo)"/></a>
				</xsl:otherwise>
			</xsl:choose>
			</div>
	
			
		
	
	</div>
	</td>
</xsl:for-each>
  </tr>
</table>
</xsl:template>
</xsl:stylesheet>
