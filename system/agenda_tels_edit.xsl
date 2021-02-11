<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/agenda_tels_edit.xml.php?nota_id=20" -->
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
<xsl:param name="usr_id" />
<xsl:param name="nota_id" />
<xsl:template match="/">
	<input type="hidden" name="mod_tip" value="edit" />
	<input type="hidden" name="usr_id" value="{$usr_id}" />
	<input type="hidden" name="nota_id" value="{$nota_id}" />
<table width="100%" height="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableOscura">
    <tr class="tableClara">
      <td align="center" colspan="2"><h1>Modificar Telefono </h1></td>
    </tr>
  <tr class="tableClara">
  	<td align="center"><div align="right">Rubro:</div></td>
	  <td>
    <select name="rub_id">
	 	<xsl:for-each select="nota/rubros/option">
				<xsl:choose>
					<xsl:when test="../selected = @value">
					 <option value="{@value}" selected="selected"><xsl:value-of select="." disable-output-escaping="yes"/></option>
				  </xsl:when>
				  <xsl:otherwise>
					 <option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
				  </xsl:otherwise>
				</xsl:choose>
          </xsl:for-each>
	 </select>
	</td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right">Nombre:</div></td>
      <td ><input type="text" name="nombre" value="{nota/nombre}"/></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right">Apellido:</div></td>
      <td ><input type="text" name="apellido" value="{nota/apellido}"/></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right">Telefono:</div></td>
      <td ><input type="text" name="telefono" value="{nota/telefono}"/></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right">Domicilio:</div></td>
      <td ><input type="text" name="domicilio" value="{nota/domicilio}"/></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right">E-mail:</div></td>
      <td ><input type="text" name="mail" value="{nota/mail}"/></td>
    </tr>
    <!-- VER QUE ONDA PORQUE AL HABILITARLO DESAPARECE EL BOTON DE MODIFICAR
    <tr class="tableClara" >
      <td align="center"><div align="right">Nota:</div></td>
      <td><textarea name="nota" rows="3"><xsl:value-of select="nota/nota"/></textarea></td>
    </tr>
    -->
    
    
    <tr class="tableClara" >
      <td colspan="2" align="center"><input name="Modificar" type="button" class="botonForm" id="modificar" onclick="document.agendaTelEditar.submit();" value="Modificar" />
        &nbsp;&nbsp;
      </td>
    </tr>
  </table>
</xsl:template>
</xsl:stylesheet>