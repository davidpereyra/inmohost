<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostv2.0/system/datos/agenda_citas_int.xml.php?cita_id=27819" -->
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
<table width="100%" height="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="tableOscura">
  <tr class="tableClara">
    <td align="center" colspan="2">
      <h1>Interesados</h1></td>
  </tr>
  
  <xsl:for-each select="XML/interesados">
    <tr class="tableClara" >
      <td width="40%" align="center"><xsl:value-of select="nombre"/>&nbsp;<xsl:value-of select="apellido"/></td>
      <td ><strong>Domicilio:</strong> <xsl:value-of select="domicilio"/> <br />
        <strong>Teléfono: </strong><xsl:value-of select="telefono"/><br />
        <strong>E-mail: </strong><xsl:value-of select="mail"/></td>
    </tr>
  </xsl:for-each>
  
  <tr class="tableClara" >
    <td colspan="2" align="center"><input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" /></td>
  </tr>
</table>
	
</xsl:template>
</xsl:stylesheet>