<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://localhost/inmohostV2.0/system/datos/backup.xml.php?tipo=2" --><!DOCTYPE xsl:stylesheet  [
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
<xsl:output method="html" encoding="iso-8859-1" doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>
<xsl:param name="fileCalendario"/>
<xsl:param name="destino1"/>
<xsl:param name="titulo"/>
<xsl:param name="url"/>
<xsl:param name="parametros"/>
<xsl:template match="/">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/></head>

<body>

<table width="100%" border="0" class="tableOscura" cellspacing="1" cellpadding="3">
  <tr class="tableClara">
    <td colspan="2"><strong>Recuperar Sistema  </strong></td>
  </tr>
  <tr class="tableClara">
    <td width="61%"><div align="center">Archivo de Backup </div></td>
    <td width="61%"><div align="center">
	
	
	 <select name="archivo" class="inputForm" tabindex="1">
			<xsl:for-each select="XML/option">
				  <option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
			  </xsl:for-each>
          </select>
		  </div></td>
  </tr>
   <tr  id='div_comp' style="display:none" class="tableClara">
  	<td colspan="2">
			  <div align="center"><img src="../interfaz/inmohost/images/precarga.gif"/><br/>
	            <strong>Restaurando Copia. Esta operación puede demorar varios minutos. </strong></div></td>       
   </tr> 
  <tr class="tableClara">
    <td colspan="2"><div align="center">
      <input id="boton_hacer" name="button" type="button" class="botonForm" value="Restaurar Sistema" onclick="restaurar()"/>
    </div></td>
    </tr>
</table>

</body>
</html>

</xsl:template>
</xsl:stylesheet>