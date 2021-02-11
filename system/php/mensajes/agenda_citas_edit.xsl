<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/agenda_citas_edit.xml.php?usr_id=908&cita_id=27819" -->
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
<form id="agendaCitaAgregar" name="agendaCitaEditar" method="get" action="../abms/citas_mensajes.php" style="height:100%" >
	<input type="hidden" name="mod_tip" value="edit" />
<table width="100%" height="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableOscura">
    <tr class="tableClara">
      <td align="center" colspan="2"><h1>Modificar Cita </h1></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right">Fecha:</div></td>
      <td >
	  <input name="desdeCita" type="text" id="desdeCita" value="{cita/fecha}" class="inputFecha" readonly="yes" />
			<input id="desdeCitaDia" type="hidden" name="desdeTasacionesDia" value="00" />
			<input id="desdeCitaMes" type="hidden" name="desdeTasacionesMes" value="00" />
			<input id="desdeCitaAno" type="hidden" name="desdeTasacionesAno" value="0000" />

    </td>
    </tr>
    <tr class="tableClara" 	>
      <td width="30%" align="center"><div align="right">Hora:</div></td>
      <td width="70%"><input name="hora" type="text" id="hora" size="2" maxlength="2" value="{cita/hora}"/>
        :
        <select name="min" id="min" size="1">
        	<option value="00">00</option>	
        	<option value="15">15</option>
        	<option value="30">30</option>
			<option value="45">45</option>
        </select>	
        </td>
        
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right">Inmueble:</div></td>
      <td >
      <select name="prp_id" tabindex="3" id="prp_id" style="width:200px;" onfocusin="$('prp_id').style.width = '400px';" onblur="$('prp_id').style.width = '200px';" onchange="$('prp_id').style.width = '200px'; $('cita_desc').focus();" >
	  	<xsl:for-each select="cita/propiedades/option">
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
      <td align="center"><div align="right">Detalles:</div></td>
      <td ><textarea name="cita_desc" rows="3" tabindex="4"><xsl:value-of select="cita/cita_desc"/></textarea></td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right">Monitor:</div></td>
	<td>
    <select name="emp_id">
	 	<xsl:for-each select="cita/empleados/option">
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
      <td colspan="2" align="center"><input name="agendar" type="button" class="botonForm" id="agendar" onclick="alert(document.agendaCitaEditar.min.value);document.agendaCitaEditar.submit();location.reload();" value="Agendar" />
        &nbsp;&nbsp;
        <input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip()" /></td>
    </tr>
  </table>
</form>
</xsl:template>
</xsl:stylesheet>