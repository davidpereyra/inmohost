<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/agenda_tasaciones_edit.xml.php?tas_id=1690" -->
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
<xsl:param name="ABMTAS" />
<xsl:param name="tas_id" />
<xsl:param name="desdeTasaciones" />
<xsl:param name="desdeTasacionesDia" />
<xsl:param name="desdeTasacionesMes" />
<xsl:param name="desdeTasacionesAno" />
<xsl:param name="hastaTasaciones" />
<xsl:param name="hastaTasacionesDia" />
<xsl:param name="hastaTasacionesMes" />
<xsl:param name="hastaTasacionesAno" />
<xsl:param name="fechaTasacion" />
<xsl:param name="fechaTasacionDia" />
<xsl:param name="fechaTasacionMes" />
<xsl:param name="fechaTasacionAno" />
<xsl:param name="ventanaDesde" />
<xsl:param name="nomVentana" />
<xsl:param name="acc_internet" />
<xsl:template match="/">
	<input type="hidden" name="mod_tip" value="add" />
	<input type="hidden" name="usr_id" value="{$usr_id}" />
	<input type="hidden" name="desdeTasaciones" value="{$desdeTasaciones}" />
	<input type="hidden" name="desdeTasacionesDia" value="{$desdeTasacionesDia}" />
	<input type="hidden" name="desdeTasacionesMes" value="{$desdeTasacionesMes}" />
	<input type="hidden" name="desdeTasacionesAno" value="{$desdeTasacionesAno}" />
	<input type="hidden" name="hastaTasaciones" value="{$hastaTasaciones}" />
	<input type="hidden" name="hastaTasacionesDia" value="{$hastaTasacionesDia}" />
	<input type="hidden" name="hastaTasacionesMes" value="{$hastaTasacionesMes}" />
	<input type="hidden" name="hastaTasacionesAno" value="{$hastaTasacionesAno}" />
	<input type="hidden" name="ventanaDesde" value="{$ventanaDesde}" />
<table width="100%" height="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableOscura">

    <tr class="tableClara" >
      <td align="center"><div align="right" id="fechaTasacion_div">Fecha:</div></td>
      <td >

	  		<input name="fechaTasacion" type="text" id="fechaTasacion" value="{$fechaTasacion}" class="inputFecha" readonly="yes" />
			<input id="fechaTasacionDia" type="hidden" name="fechaTasacionDia" value="{$fechaTasacionDia}" />
			<input id="fechaTasacionMes" type="hidden" name="fechaTasacionMes" value="{$fechaTasacionMes}" />
			<input id="fechaTasacionAno" type="hidden" name="fechaTasacionAno" value="{$fechaTasacionAno}" />
			<a id="iniciaForm" href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('{$FILECALENDARIO}&amp;destino=fechaTasacion&amp;acc_internet={$acc_internet}',this)" tabindex="1"><img src="../interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>
    </td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right" id="tip_id_div">	Tipo Const:</div></td>
	<td>
    <select name="tip_id" class="inputForm" tabindex="1">
	 	<xsl:for-each select="tasacion/tipo_const/option">
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
	<td align="center"><div align="right" id="con_id_div">Condicion:</div></td>
	<td>
    <select name="con_id" class="inputForm" tabindex="2">
	 	<xsl:for-each select="tasacion/condiciones/option">
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
	<td align="center"><div align="right" id="tas_referente_div">Referente:</div></td>
	<td>
    <select name="tas_referente" class="inputForm" tabindex="3">
	 	<xsl:for-each select="tasacion/empleados/option">
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
	<td align="center"><div align="right" id="pro_id_div">Provincia:</div></td>
	<td>
	<select name="pro_id"  onchange="act_select('loc_id,loc_desc','localidades','pro_id='+this.value,'loc_id','','php/funciones','loc_desc');" class="inputForm" tabindex="4">
	 	<xsl:for-each select="tasacion/provincias/option">
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
	<td align="center"><div align="right" id="loc_id_div">Localidad:</div></td>
	<td>
	<div id='div_loc_id'>
	<select name="loc_id" class="inputForm" tabindex="5">
	 	<xsl:for-each select="tasacion/departamentos/option">
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
	 </div>
	</td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right" id="tas_bar_div">Barrio:</div></td>
		<td><input type="text" name="tas_bar" value="" class="inputForm" tabindex="6"/></td>    
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right" id="tas_dom_div">Domicilio:</div></td>
		<td><input type="text" name="tas_dom" value="" class="inputForm" tabindex="7"/></td>    
    </tr>
    <tr class="tableClara">
    <td align="center"><div align="right" id="nom_prop_div">Nombre:</div></td>
		<td><input type="text" name="nom_prop" value="" class="inputForm" tabindex="8"/></td>    
    </tr>
    <tr class="tableClara">
    <td align="center"><div align="right" id="ap_prop_div">Apellido:</div></td>
		<td><input type="text" name="ap_prop" value="" class="inputForm" tabindex="9"/></td>    
    </tr>
    <tr class="tableClara">
    <td align="center"><div align="right" id="tel_prop_div">Telefono:</div></td>
		<td><input type="text" name="tel_prop" value="" class="inputForm" tabindex="10"/></td>    
    </tr>
    <tr class="tableClara">
    <td align="center"><div align="right" id="tas_desc_div">Descripcion:</div></td>
		<td >
		<textarea name="tas_desc" rows="3" class="inputForm" tabindex="11"><xsl:text disable-output-escaping="yes"> </xsl:text></textarea></td>
    </tr>
    <tr class="tableClara" >
      <td colspan="2" align="center">
	  <input name="Cerrar" type="button" class="botonForm" id="Cerrar" onclick="parent.Windows.close('{$nomVentana}');" value="Cerrar" style="margin-right:10px;"  tabindex="12"/><input name="Agregar" type="button" class="botonForm" id="agregar" onclick="if(verif('con_id,2,Condicion,tip_id,2,Tipo de Construccion,tas_referente,2,Referente,pro_id,2,Provincia,loc_id,2,Localidad,ap_prop,1,Apellido','agendaTasacionAgregar'))document.agendaTasacionAgregar.submit();" value="Agregar"  tabindex="13"/>
        </td>
    </tr>
  </table>
</xsl:template>
</xsl:stylesheet>