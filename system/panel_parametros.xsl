<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://localhost/inmohostV2.0/system/datos/panel_parametros.xml.php" -->
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

<table width="500" align="center" cellpadding="3" cellspacing="1" class="tableOscura">
  <tr class="tableClara">
    <td align="center" ><b>variable</b></td>
    <td align="center" ><b>valor</b></td>
  </tr>
<xsl:for-each select="XML/items/item">
  <tr class="tableClara">
    <td >
      <div align="right"><b><xsl:value-of select="@name"/>:</b>
      <input type="hidden" value="{@name}" name="nom_var{position()}" size="50"/>
      </div>
    </td>
    <td>
		<!--span id="edit_{@name}" onclick="editForm_campo('{@name}');"><xsl:value-of select="." disable-output-escaping="yes"/></span-->
    	<input type="text" value="{.}" id="{@name}" name="valor{position()}" size="50"/>
    </td>
  </tr>
</xsl:for-each>
    <tr class="tableClara">
      <td colspan="2">
        <div align="center"> 
        	<a href="javascript:document.panelControl.submit()"><img src="../interfaz/inmohost/images/iconos/32/aceptar.png" border="0" alt="Aceptar" width="32" height="32"/><br/>
        	<strong>Actualizar</strong></a>        </div>
      </td>
    </tr>
</table>

</xsl:template>
</xsl:stylesheet>
