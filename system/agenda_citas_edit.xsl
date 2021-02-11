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
<xsl:param name="usr_id" />
<xsl:param name="FILECALENDARIO" />
<xsl:param name="ABMCITAS" />
<xsl:param name="cita_id" />
<xsl:param name="desdeCitas" />
<xsl:param name="desdeCitasDia" />
<xsl:param name="desdeCitasMes" />
<xsl:param name="desdeCitasAno" />
<xsl:param name="hastaCitas" />
<xsl:param name="hastaCitasDia" />
<xsl:param name="hastaCitasMes" />
<xsl:param name="hastaCitasAno" />
<xsl:param name="ventanaDesde" />
<xsl:param name="acc_internet" />
<xsl:template match="/">
	<input type="hidden" name="mod_tip" value="edit" />
	<input type="hidden" name="usr_id" value="{$usr_id}" />
	<input type="hidden" name="cita_id" value="{$cita_id}" />
	<input type="hidden" name="desdeCitas" value="{$desdeCitas}" />
	<input type="hidden" name="desdeCitasDia" value="{$desdeCitasDia}" />
	<input type="hidden" name="desdeCitasMes" value="{$desdeCitasMes}" />
	<input type="hidden" name="desdeCitasAno" value="{$desdeCitasAno}" />
	<input type="hidden" name="hastaCitas" value="{$hastaCitas}" />
	<input type="hidden" name="hastaCitasDia" value="{$hastaCitasDia}" />
	<input type="hidden" name="hastaCitasMes" value="{$hastaCitasMes}" />
	<input type="hidden" name="hastaCitasAno" value="{$hastaCitasAno}" />
	<input type="hidden" name="ventanaDesde" value="{$ventanaDesde}" />
<table width="100%" height="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableOscura">
    <tr class="tableClara">
      <td align="center" colspan="2"><h1>Modificar Cita </h1></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right" id="fechaCita_div">Fecha:</div></td>
      <td >
	  <input name="fechaCita" type="text" id="fechaCita" value="{cita/fecha}" class="inputFecha" readonly="yes" />
			<input id="fechaCitaDia" type="hidden" name="fechaCitaDia" value="{cita/dia}" />
			<input id="fechaCitaMes" type="hidden" name="fechaCitaMes" value="{cita/mes}" />
			<input id="fechaCitaAno" type="hidden" name="fechaCitaAno" value="{cita/ano}" />
			<a id="iniciaForm" href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('{$FILECALENDARIO}&amp;destino=fechaCita&amp;acc_internet={$acc_internet}',this)" tabindex="1"><img src="../interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>
    </td>
    </tr>
    <tr class="tableClara" 	>
      <td width="30%" align="center"><div align="right" id="hora_div">Hora:</div></td>
      <td width="70%">
      <select name="hora" size="1" id="hora" >
        	<xsl:for-each select="cita/horas/option">
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
        :
        <select name="min" size="1" id="min">
        	<xsl:for-each select="cita/minutos/option">
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
      <td align="center"><div align="right" id="prp_id_div">Inmueble:</div></td>
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
      <td align="center"><div align="right" id="cita_desc_div">Detalles:</div></td>
      <td ><textarea name="cita_desc" rows="3" tabindex="4"><xsl:value-of select="cita/cita_desc"/></textarea></td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right" id="emp_id_div">Monitor:</div></td>
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
    <tr class="tableClara">
	<td align="center"><div align="right">Estado:</div></td>
	<td>
    <select name="estado">
	 	<xsl:for-each select="cita/estados/option">
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
      <td colspan="2" align="center"><input name="agendar" type="button" class="botonForm" id="agendar" onclick="if(verif('hora,2,Hora,prp_id,2,Inmueble,cita_desc,1,Detalles,emp_id,2,Monitor','agendaCitaEditar'))document.agendaCitaEditar.submit();" value="Agendar" />
        &nbsp;&nbsp;
        </td>
    </tr>
  </table>
</xsl:template>
</xsl:stylesheet>