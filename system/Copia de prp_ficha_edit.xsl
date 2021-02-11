<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://localhost/sistema%20inmohost/xml/prp_ficha_edit.xml" -->
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
<xsl:param name="prp_fotosXML" />
<xsl:param name="mod_edit" />
<xsl:param name="mod_tip" />
<xsl:param name="prp_id" />
<xsl:param name="usr_id" />
<xsl:param name="fileFicha" />
<xsl:param name="fileFichaEdit" />
<xsl:param name="fileFichaEstado" />
<xsl:param name="fileCita" />
<xsl:param name="fileExportar" />
<xsl:param name="filePropietario" />

<xsl:template match="/">

<!--MENUEXTRA-->
<xsl:if test="XMLTEXTO/propiedad/menuAu = '1'">
<div id="MenuPRP" onmouseout="MM_menuStartTimeout(1000);" onmouseover="MM_menuResetTimeout();">
<ul>
<xsl:choose>
	<xsl:when test="XMLTEXTO/propiedad/editFicha = '0'">
	<li><a href="javascript:window.parent.window.ventana('prp_ficha', '&amp;prp_id={$prp_id}&amp;usr_id={$usr_id}&amp;mod_edit=0', '{$fileFicha}', 'Ficha de Propiedad')" >&nbsp;Ficha</a></li>
	</xsl:when>
	<xsl:otherwise>    
	<li><a href="javascript:window.parent.window.ventana('prp_modificar', '&amp;prp_id={$prp_id}&amp;usr_id={$usr_id}&amp;mod_edit=1', '{$fileFichaEdit}', 'Modificar una Propiedad');" >&nbsp;Modificar</a></li>
    </xsl:otherwise>
</xsl:choose>
<xsl:if test="XMLTEXTO/propiedad/editEstado = '1'">
	<li><a href="javascript:window.parent.window.dialogos('alerta', '&amp;prp_id={$prp_id}&amp;usr_id={$usr_id}&amp;mod_edit=1', '{$fileFichaEstado}', 'Modificar Estado');" >&nbsp;Modificar Estado</a></li>
</xsl:if>
<xsl:if test="XMLTEXTO/propiedad/editImprimir = '1'">
	<li><a href="javascript:parent.ventana('exportar', '&amp;prp_id={$prp_id}&amp;usr_id={$usr_id}', '{$fileExportar}', 'Exportar');" >&nbsp;Exportar</a></li>
</xsl:if>
<xsl:if test="XMLTEXTO/propiedad/editCitas = '1'">
	<li><a href="javascript:window.parent.window.ventana('agenda_citas', '&amp;prp_id={$prp_id}&amp;usr_id={$usr_id}&amp;mod_edit=0', '{$fileCita}', 'Ver Citas');" >&nbsp;Ver citas</a></li>
</xsl:if>
<xsl:if test="XMLTEXTO/propiedad/editPro = '1'">
	<li><a href="javascript:;" onclick="position(event); toolTip('{$filePropietario}',this);" >&nbsp;Propietario</a></li>
</xsl:if>
<xsl:if test="XMLTEXTO/propiedad/editSimil = '1'">
	<li><a href="javascript:display('subMenu1');">Similares</a>
		<ul id="subMenu1" style="display:none" class="subMenu">
			<li><a href="javascript:display('subMenu1'); window.parent.window.ventana('varios', '&amp;prp_pre=0', 'system/prp_listado.php', 'Propiedades Similares por precio');" >&nbsp;por Precio</a></li>
			<li><a href="javascript:display('subMenu1'); window.parent.window.ventana('varios', '&amp;prp_pre=0', 'system/prp_listado.php', 'Propiedades Similares por zona');" >&nbsp;por Zona</a></li>
		</ul>
	</li>
</xsl:if>
</ul>
</div>
</xsl:if>
<!--//MENUEXTRA-->

<!--BARRA SUP-->
<xsl:if test="$mod_tip!='add'">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr class="tr1">
    <xsl:if test="XMLTEXTO/propiedad/menuAu = '1'">
	<td width="10%" class="tr1B"><a href="javascript:;" onmouseout="MM_menuStartTimeout(1000);" onmouseover="MM_menuShowMenu('MenuPRP', 'MenuPRP',1,31,'menu_r2_c2');"><img src="../interfaz/inmohost/images/iconos/20/inmueble.png" alt="MENU" width="20" height="20" hspace="3" align="left" />&nbsp;&nbsp;menu</a></td>
    </xsl:if>
	<td width="90%"><div align="center">
      <h2><xsl:value-of select="usr_raz"/></h2>
    </div></td>
    </tr>
</table>
</xsl:if>
<!--//BARRA SUP-->

<table width="99%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr class="tableClara">
    <td><form action="prp_ficha_edit.php" method="post" enctype="multipart/form-data" name="prp_edit_form" id="prp_edit_form">
      <input type="hidden" name="usr_id" value="{$usr_id}" />
      <input type="hidden" name="prp_id" value="{$prp_id}" />
      <input type="hidden" name="prp_mod" value="2007-02-13" />
      <input type="hidden" name="usuario" value="g" />
      <input type="hidden" name="publica" value="1" />
      <input type="hidden" name="pal" value="0" />
      <input type="hidden" name="edited" value="0" />
      <input type="hidden" name="mod_tip" value="{$mod_tip}" />
      <input type="hidden" name="error_val" value="{$mod_tip}" />
      <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
        <tr class="tr1">
          <td colspan="4"><h1>&nbsp;&nbsp;&nbsp;&nbsp;Ubicación</h1></td>
        </tr>
        <tr class="tableClara">
          <td width="20%"><div align="right" id="pai_id_div"><strong>País:</strong></div></td>
          <td width="30%" >
          <select name="pai_id" onchange="act_select('pro_id,pro_desc','provincias','pai_id='+this.value,'pro_id','loc_desc');" class="inputForm" tabindex="1">
			<xsl:for-each select="XMLTEXTO/datos/paises/option">
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
          <span class="destacado2">*</span></td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="tableClara">
          <td><div align="right" id="pro_id_div"><strong>Provincias:</strong></div></td>
          <td><span id="div_pro_id"><select name="pro_id" onchange="act_select('loc_id,loc_desc','localidades','pro_id='+this.value,'loc_id','loc_desc');" class="inputForm" tabindex="2">
          <xsl:for-each select="XMLTEXTO/datos/provincias/option">
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
          </span>
            <span class="destacado2">*</span></td>
          <td width="20%" ><div align="right" id="loc_id_div"><strong>Localidades:</strong></div></td>
          <td width="30%" ><span id="div_loc_id"><select name="loc_id" onchange="" class="inputForm" tabindex="3">
          <xsl:for-each select="XMLTEXTO/datos/localidades/option">
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
          </span>
            <span class="destacado2">*</span></td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Barrio:</div></td>
          <td><input style="width:150px;" type="text" name="prp_bar" value="{XMLTEXTO/propiedad/prp_bar}" class="inputForm" tabindex="4"/></td>
          <td><div align="right" id="prp_dom_div"><strong>Domicilio:</strong></div></td>
          <td><input type="text" name="prp_dom" value="{XMLTEXTO/propiedad/prp_dom}" style="width:150px;" class="inputForm" tabindex="5" onChange="javascript:no_vacio(this.name,'prp_edit_form');"/>
            <span class="destacado2">*</span></td>
        </tr>
        <input type="hidden" name="min" value="" />
        <input type="hidden" name="max" value="" />
        <input type="hidden" name="usuario" value="" />
        <tr class="tr1">
          <td colspan="4"><h1>&nbsp;&nbsp;&nbsp;&nbsp;Datos Propiedad</h1></td>
        </tr>
        
        <tr class="tableClara">
          <td><div align="right" id="tip_id_div"><strong>Tipo Construcción:</strong></div></td>
          <td><select name="tip_id" class="inputForm" tabindex="6">
          <xsl:for-each select="XMLTEXTO/datos/tipoCons/option">
			<xsl:choose>
				  <xsl:when test="../selected = @value">
					 <option value="{@value}" selected="selected"><xsl:value-of select="." disable-output-escaping="yes"/></option>
				  </xsl:when>
				  <xsl:otherwise>
					 <option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
				  </xsl:otherwise>
			</xsl:choose> 
          	<!-- <option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option> -->
          </xsl:for-each>
          </select>
            <span class="destacado2">*</span>          </td>
          <td><div align="right" id="con_id_div"><strong>Condición:</strong></div></td>
          <td ><select name="con_id" class="inputForm" tabindex="7">
          <xsl:for-each select="XMLTEXTO/datos/tipoCond/option">
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
            <span class="destacado2">*</span>          </td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Orientación:</div></td>
          <td><select name="ori_id" class="inputForm" tabindex="8">
          <xsl:for-each select="XMLTEXTO/datos/orientacion/option">
			 <xsl:choose>
					<xsl:when test="../selected = @value">
					 <option value="{@value}" selected="selected"><xsl:value-of select="." disable-output-escaping="yes"/></option>
				  </xsl:when>
				  <xsl:otherwise>
					 <option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
				  </xsl:otherwise>
			</xsl:choose>
          </xsl:for-each>
          </select>          </td>
          <td><div align="right">Formatos Digitales :</div></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><div align="right">Web Propia:</div></td>
              <td><input type="checkbox" name="publica2" checked="checked" class="inputForm" tabindex="9"/></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="tableClara"><div align="right">C.I.M.:</div></td>
              <td class="tableClara"><input type="checkbox" name="mos_por_2" checked="checked" class="inputForm" tabindex="11"/></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="tableClara"><div align="right">C.C.P.I.M.:</div></td>
              <td class="tableClara"><input type="checkbox" name="mos_por_3" checked="checked" class="inputForm" tabindex="12"/></td>
              <td width="50%">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3"><hr />
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableClara" id="trAnonimo">
                <tr>
                  <td width="45%"><div align="right">Inmoclick:</div></td>
                  <td width="5%"><input type="checkbox" name="mos_por_1" checked="checked" class="inputForm" tabindex="10"/>                  </td>
                  <td width="50%" rowspan="2"><div align="center" class="tr3"><strong>Publicación Anónima</strong><br />
                          <input type='checkbox' name='prp_anonimo2' value='1' onclick="changeStyle('trAnonimo', 'tableClara', 'botonForm');" />
                          <br />
                  </div></td>
                </tr>
                <tr >
                  <td>
                    <div align="right">Diario UNO Digital:</div></td>
                  <td><input type="checkbox" name="mos_por_1" checked="checked" class="inputForm" tabindex="10"/></td>
                  </tr>
              </table></td>
              </tr>
          </table></td>
        </tr>
        <tr class="tableClara">
          <td><div align="right" id="prp_pre_div"><strong>Valor Alta ($):</strong></div></td>
          <td><input type="text" style="width:150px;" name="prp_pre" value="{XMLTEXTO/propiedad/prp_pre}" class="inputForm" tabindex="13"/>
            <span class="destacado2">*</span>          </td>
          <td><div align="right">Valor Alta (U$S):</div></td>
          <td><input type="text" style="width:150px;" name="prp_pre_dol" value="{XMLTEXTO/propiedad/prp_pre_dol}" class="inputForm" tabindex="14"/>          </td>
        </tr>
        <tr class="tr3">
          <td><div align="right">Valor Tasación:</div></td>
          <td><input type="text" style="width:150px;" name="precio_inmo" value="{XMLTEXTO/propiedad/prp_pre}" class="inputForm" tabindex="15"/>          </td>
          <td><div align="right">Valor Propietario:</div></td>
          <td><input type="text" style="width:150px;" name="precio_prop" value="{XMLTEXTO/propiedad/prp_pre}" class="inputForm" tabindex="16"/>          </td>
        </tr>
        <tr class="tableClara">
          <td class="tr3"><div align="right">Valor Transacción:</div></td>
          <td class="tr3"><input type="text" style="width:150px;" name="precio_trans" value="{XMLTEXTO/propiedad/prp_pre}" class="inputForm" tabindex="17"/>          </td>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr class="tableClara">
          <td><div align="right">Descripción:</div></td>
          <td colspan="3"><textarea name="prp_desc" rows="4" style="width:490px;" class="inputForm" tabindex="18"><xsl:value-of select="XMLTEXTO/propiedad/pro_desc" disable-output-escaping="yes"/></textarea>          </td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Nota:</div></td>
          <td colspan="3"><textarea name="prp_nota" rows="4" style="width:490px;" class="inputForm" tabindex="19"><xsl:value-of select="XMLTEXTO/propiedad/prp_nota" disable-output-escaping="yes"/></textarea>          </td>
        </tr>
        
        
        
        <tr class="tableClara">
          <td><div align="right">Servicios:</div></td>
          <td colspan="3"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
          <input type="hidden" name="num_ser" value='<xsl:for-each select="XMLTEXTO/datos/cantservicios">' />
          <!-- Dos servicios x Fila -->
			<xsl:for-each select="XMLTEXTO/datos/servicios/serv">
				<xsl:choose>
					<!-- Columna Izquierda -->
					<xsl:when test="serv_par = '1'">
						<tr class="tableClara">
              				<td width="20%" >
              					<div align="right"><xsl:value-of select="serv_desc"/></div>
              				</td>
              				<!-- Tipo Texto -->
              				<xsl:when test="serv_type='text'">
								<td width="30%" >
	              					<input type='<xsl:value-of select="serv_type"/>' name='<xsl:value-of select="serv_name"/>' value='<xsl:value-of select="serv_valor"/>' style="width:100px;" tabindex="20"/>	
	  	                    		<input type="hidden" name="ser_id0" value="2" />              
	                      		</td>	
                      		</xsl:when>
                      		<!-- Tipo Opciones -->
              				<xsl:when test="serv_type='option'">
								<td width="30%" >
	              					<select name='<xsl:value-of select="serv_name"/>' class="inputForm" tabindex="20"/>	
	  	                    		<xsl:for-each select="XMLTEXTO/datos/servicios/serv_opciones">
	              						<option value='<xsl:value-of select="serv_name"/>'><xsl:value-of select="serv_name"/></option>
	              					</xsl:for-each>
	              					<input type="hidden" name="ser_id0" value="2" />              
	                      		</td>	
                      		</xsl:when>
							<!-- Tipo CheckBox -->
              				<xsl:when test="serv_type='checkbox'">
								<td width="30%" >
	              					<input type='<xsl:value-of select="serv_type"/>' name='<xsl:value-of select="serv_name"/>' value='<xsl:value-of select="serv_valor"/>' style="width:100px;" tabindex="20"/>	
	  	                    		<input type="hidden" name="ser_id0" value="2" />              
	                      		</td>	
                      		</xsl:when>
				    </xsl:when>
				    </tr>
				    
				    <!-- Columna Derecha -->
				    <xsl:otherwise>
						<td>
							<div align="right"><xsl:value-of select="serv_desc"/></div>
						</td>
						<!-- Tipo Texto -->
              			<xsl:when test="serv_type='text'">
							<td width="30%" >
								<input type='<xsl:value-of select="serv_type"/>' name='<xsl:value-of select="serv_name"/>' value='<xsl:value-of select="serv_valor"/>' class="inputForm" style="width:100px;" tabindex="21"/>
      						</td>
      					</xsl:when>
      					<!-- Tipo Opciones -->
              			<xsl:when test="serv_type='option'">
              			<td width="30%" >
          					<select name='<xsl:value-of select="serv_name"/>' class="inputForm" tabindex="20"/>	
	                    		<xsl:for-each select="XMLTEXTO/datos/servicios/serv_opciones">
          						<option value='<xsl:value-of select="serv_name"/>'><xsl:value-of select="serv_name"/></option>
          					</xsl:for-each>
	                    </td>	
              			</xsl:when>
						<!-- Tipo Checkbox -->
              			<xsl:when test="serv_type='checkbox'">
							<td width="30%" >
	              				<input type='<xsl:value-of select="serv_type"/>' name='<xsl:value-of select="serv_name"/>' value='<xsl:value-of select="serv_valor"/>' style="width:100px;" tabindex="20"/>	
	                    	</td>	
                      	</xsl:when>
				    </xsl:otherwise>
				    </tr>
				</xsl:choose>
          	</xsl:for-each>
        
<!--
        
        <tr class="tableClara">
          <td><div align="right">Servicios:</div></td>
          <td colspan="3"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
            <input type="hidden" name="num_ser" value="20" />
            <tr class="tableClara"></tr>
              <td width="20%" ><div align="right">Sup. total:</div></td>
              <td width="30%" ><input name="valor0" type="text" class="inputForm" value='' style="width:100px;" tabindex="20"/>
                      <input type="hidden" name="ser_id0" value="2" />              </td>
              <td width="20%" ><div align="right">Dormitorios:</div></td>
              <td width="30%" ><input type="text" name="valor1" value='' class="inputForm" style="width:100px;" tabindex="21"/>
                      <input type="hidden" name="ser_id1" value="3" />              </td>
            </tr>
            <tr class="tableClara">
              <td ><div align="right">Cochera: </div></td>
              <td ><select name="desde_2" class="inputForm" tabindex="22">
                <option value="Indistinto"> Indistinto</option>
                <option value="Garage"> Garage</option>
                <option value="Garage/Cochera"> Garage/Cochera</option>
                <option value="Garage Doble"> Garage Doble</option>
                <option value="Cochera Pasante"> Cochera Pasante</option>
                <option value="Sin Cochera"> Sin Cochera</option>
              </select>
                      <input type="hidden" name="ser_id2" value="4" />              </td>
              <td><div align="right">Sup cubierta:</div></td>
              <td ><input type="text" name="valor3" value='' class="inputForm" style="width:100px;" tabindex="23"/>
                      <input type="hidden" name="ser_id3" value="7" />              </td>
            </tr>
            <tr class="tableClara">
              <td ><div align="right">Baños:</div></td>
              <td ><input name="valor4" type="text" class="inputForm" value='' style="width:100px;" tabindex="24"/>
                      <input type="hidden" name="ser_id4" value="8" />              </td>
              <td ><div align="right">Piscina:</div></td>
              <td ><select name="desde_5" class="inputForm" tabindex="25">
                <option value="Indistinto">Indistinto</option>
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
                      <input type="hidden" name="ser_id5" value="9" />              </td>
            </tr>
            <tr class="tableClara">
              <td ><div align="right">Calefacción Central:</div></td>
              <td ><select name="desde_6" class="inputForm" tabindex="26">
                <option value="Indistinto">Indistinto</option>
                <option value="No">No</option>
                <option value="Si">Si</option>
              </select>
                      <input type="hidden" name="ser_id6" value="10" />              </td>
              <td ><div align="right">Zona Escolar:</div></td>
              <td ><select name="desde_7" class="inputForm" tabindex="27">
                <option value="Indistinto">Indistinto</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
                      <input type="hidden" name="ser_id7" value="11" />              </td>
            </tr>
            <tr class="tableClara">
              <td ><div align="right">Luz Eléctrica:</div></td>
              <td ><select name="desde_8" class="inputForm" tabindex="28">
                <option value="Indistinto">Indistinto</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
                      <input type="hidden" name="ser_id8" value="12" />              </td>
              <td ><div align="right">Plantas:</div></td>
              <td ><input type="text" name="valor9" value='' class="inputForm" style="width:100px;" tabindex="29"/>
                      <input type="hidden" name="ser_id9" value="13" />              </td>
            </tr>
            <tr class="tableClara">
              <td ><div align="right">Agua:</div></td>
              <td ><select name="desde_10" class="inputForm" tabindex="30">
                <option value="Indistinto">Indistinto</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
                      <input type="hidden" name="ser_id10" value="14" />              </td>
              <td ><div align="right">Gas:</div></td>
              <td ><select name="desde_11" class="inputForm" tabindex="31">
                <option value="Indistinto">Indistinto</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
                      <input type="hidden" name="ser_id11" value="15" />              </td>
            </tr>
            <tr class="tableClara">
              <td ><div align="right">Teléfono:</div></td>
              <td ><select name="desde_12" class="inputForm" tabindex="32">
                <option value="Indistinto">Indistinto</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
                      <input type="hidden" name="ser_id12" value="16" />              </td>
              <td ><div align="right">Antigüedad:</div></td>
              <td ><input type="text" name="valor13" value='' class="inputForm" style="width:100px;" tabindex="33"/>
                      <input type="hidden" name="ser_id13" value="17" />              </td>
            </tr>
            <tr class="tableClara">
              <td ><div align="right">Cloacas:</div></td>
              <td ><select name="desde_14" class="inputForm" tabindex="34">
                <option value="Indistinto">Indistinto</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
                      <input type="hidden" name="ser_id14" value="18" />              </td>
              <td ><div align="right">Internet:</div></td>
              <td ><select name="desde_15" class="inputForm" tabindex="35">
                <option value="Indistinto">Indistinto</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
                      <input type="hidden" name="ser_id15" value="19" />              </td>
            </tr>
            <tr class="tableClara">
              <td ><div align="right">Barrio Privado:</div></td>
              <td ><input name="valor16" type="text" class="inputForm" value='' style="width:100px;" tabindex="36"/>
                      <input type="hidden" name="ser_id16" value="20" />              </td>
              <td ><div align="right">Cable TV:</div></td>
              <td ><select name="desde_17" class="inputForm" tabindex="37">
                <option value="Indistinto">Indistinto</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
                      <input type="hidden" name="ser_id17" value="21" />              </td>
            </tr>
            <tr class="tableClara">
              <td ><div align="right">Aire Acondicionado:</div></td>
              <td ><select name="desde_18" class="inputForm" tabindex="38">
                <option value="Indistinto">Indistinto</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
                      <input type="hidden" name="ser_id18" value="22" />              </td>
              <td ><div align="right">Amoblado/a:</div></td>
              <td ><select name="desde_19" class="inputForm" tabindex="39">
                <option value="Indistinto">Indistinto</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
                      <input type="hidden" name="ser_id19" value="23" />              </td>
            </tr>
          </table></td>
        </tr>
       -->
        
           <tr class="tr3">
          <td><div align="right">Texto para publicar en Medios Gráficos:</div></td>
          <td colspan="3" rowspan="2"><textarea name="prp_pub" rows="5" class="inputForm" id="prp_pub" style="width:490px;" tabindex="40" onkeypress="contar_palabras('prp_pub');"><xsl:value-of select="XMLTEXTO/propiedad/pro_desc" disable-output-escaping="yes"/></textarea>          </td>
        </tr>
        <tr class="tr3">
          <td><div align="right">palabras escritas:&nbsp;
                <input name="totalPalMedios" type="text" id="totalPalMedios" value="0" class="inputFecha" style="width:23px" size="3" maxlength="3" readonly="" />
          </div></td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Referente: </div></td>
          <td><select name="emp_id" class="inputForm" tabindex="41">
            <option value="0">Referentes</option>
            <option value="1"> </option>
          </select></td>
          <td class="tr3"><div align="right">N° de Llave:</div></td>
          <td class="tr3"><input name="prp_llave" type="text" class="inputForm" style="width:120px;" value="" tabindex="42" />          </td>
        </tr>
        <tr class="tr3">
          <td><div align="right">N° Tasación:</div></td>
          <td><input name="prp_tas" type="text" class="inputForm"  style="width:120px;" value="" tabindex="43" />          </td>
          <td><div align="right">Matrícula:</div></td>
          <td><input name="prp_insc_dom" type="text" class="inputForm" style="width:120px;" value="" tabindex="44" />          </td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Cartel:</div></td>
          <td> SI
            <input name="prp_cartel" type="radio" class="inputForm"  value="1" tabindex="45"/>
            NO
            <input name="prp_cartel" type="radio" class="inputForm" value="0" checked="checked" tabindex="46"/>          </td>
          <td class="tr3"><div align="right">Autorizada:</div></td>
          <td class="tr3"> SI
            <input name="prp_aut" type="radio" class="inputForm" value="1" tabindex="47"/>
            NO
            <input name="prp_aut" type="radio" class="inputForm" value="0" checked="checked" tabindex="48"/>          </td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Otros Servicios:</div></td>
          <td colspan="3"><textarea name="prp_servicios" rows="4" class="inputForm" style="width:490px;" tabindex="49"><xsl:value-of select="XMLTEXTO/propiedad/pro_desc" disable-output-escaping="yes"/></textarea>          </td>
        </tr>
        <tr class="tr1">
          <td colspan="4" ><h1>&nbsp;&nbsp;&nbsp;&nbsp;Datos del Propietario</h1></td>
        </tr>
        <tr class="tr3">
          <td><div align="right" id='prop_nombre_div'><strong>Nombre:</strong></div></td>
          <td><input name="prop_nombre" type="text" class="inputForm"  style="width:150px;" value="{XMLTEXTO/propiedad/prop_nombre}" tabindex="50"/>
                <span class="destacado2">*</span></td>
          <td><div align="right" id='prop_apellido_div'><strong>Apellido:</strong></div></td>
          <td><input type="text"  style="width:150px;" name="prop_apellido" value="{XMLTEXTO/propiedad/prop_apellido}" class="inputForm" tabindex="51"/>
                <span class="destacado2">*</span></td>
        </tr>
        <tr class="tr3">
          <td><div align="right">Telefono:</div></td>
          <td><input name="prop_tel" type="text" class="inputForm"  style="width:150px;" value="" tabindex="52" />          </td>
          <td><div align="right">Domicilio:</div></td>
          <td><input type="text" style="width:150px;" name="prop_dom"  value="" class="inputForm" tabindex="53"/>          </td>
        </tr>
        <tr class="tr3">
          <td><div align="right">E-mail:</div></td>
          <td><input name="prop_mail" type="text" class="inputForm"  style="width:150px;" value="" tabindex="54" /></td>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr class="tr3">
          <td><div align="right">Nota:</div></td>
          <td colspan="3"><textarea name="prop_nota" rows="4" class="inputForm" style="width:490px;" tabindex="55"><xsl:value-of select="XMLTEXTO/propiedad/pro_desc" disable-output-escaping="yes"/></textarea>          </td>
        </tr>
        <tr class="tr1">
          <td colspan="4" ><h1>&nbsp;&nbsp;&nbsp;&nbsp;Imágenes</h1></td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 1:</div></td>
          <td colspan='3'><input type="file" name="fo1" class="inputForm" tabindex="56"/>
            Descripción:
            <input type='text' name='fo_desc1'  style="width:150px;" class="inputForm" tabindex="57"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 2:</div></td>
          <td colspan='3'><input type="file" name="fo2" class="inputForm" tabindex="58"/>
            Descripción:
            <input type='text' name='fo_desc2'  style="width:150px;" class="inputForm" tabindex="59"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 3:</div></td>
          <td colspan='3'><input type="file" name="fo3" class="inputForm" tabindex="60"/>
            Descripción:
            <input type='text' name='fo_desc3'  style="width:150px;" class="inputForm" tabindex="61"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 4:</div></td>
          <td colspan='3'><input type="file" name="fo4" class="inputForm" tabindex="62"/>
            Descripción:
            <input type='text' name='fo_desc4'  style="width:150px;" class="inputForm" tabindex="63"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 5:</div></td>
          <td colspan='3'><input type="file" name="fo5" class="inputForm" tabindex="64"/>
            Descripción:
            <input type='text' name='fo_desc5'  style="width:150px;" class="inputForm" tabindex="65"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 6:</div></td>
          <td colspan='3'><input type="file" name="fo6" class="inputForm" tabindex="66"/>
            Descripción:
            <input type='text' name='fo_desc6'  style="width:150px;" class="inputForm" tabindex="67"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 7:</div></td>
          <td colspan='3'><input type="file" name="fo7" class="inputForm" tabindex="68"/>
            Descripción:
            <input type='text' name='fo_desc7'  style="width:150px;" class="inputForm" tabindex="69"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 8:</div></td>
          <td colspan='3'><input type="file" name="fo8" class="inputForm"/>
            Descripción:
            <input type='text' name='fo_desc8'  style="width:150px;" class="inputForm"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 9:</div></td>
          <td colspan='3'><input type="file" name="fo9" class="inputForm"/>
            Descripción:
            <input type='text' name='fo_desc9'  style="width:150px;" class="inputForm"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 10:</div></td>
          <td colspan='3'><input type="file" name="fo10" class="inputForm"/>
            Descripción:
            <input type='text' name='fo_desc10'  style="width:150px;" class="inputForm"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 11:</div></td>
          <td colspan='3'><input type="file" name="fo11" class="inputForm"/>
            Descripción:
            <input type='text' name='fo_desc11'  style="width:150px;" class="inputForm"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 12:</div></td>
          <td colspan='3'><input type="file" name="fo12" class="inputForm"/>
            Descripción:
            <input type='text' name='fo_desc12' style="width:150px;" class="inputForm"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 13:</div></td>
          <td colspan='3'><input type="file" name="fo13" class="inputForm"/>
            Descripción:
            <input type='text' name='fo_desc13' style="width:150px;" class="inputForm"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 14:</div></td>
          <td colspan='3'><input type="file" name="fo14" class="inputForm"/>
            Descripción:
            <input type='text' name='fo_desc14' style="width:150px;" class="inputForm"/>          </td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Foto 15:</div></td>
          <td colspan='3'><input type="file" name="fo15" class="inputForm"/>
            Descripción:
            <input type='text' name='fo_desc15' style="width:150px;" class="inputForm"/>          </td>
        </tr>
        <input type="hidden" name="vect_fotos" value="x1x2x3x4x5x6x7x8x9x10x11x12x13x14x15" />
        <input type="hidden" name="cant_fotos" value="15" />
      </table>
      <table width="100%">
        <tr class="tableClara">
          <td width="50%"><div align="center">
            <input name="enviar" type="button" class="botonForm" value="Enviar" onclick="javascript:valida_propiedad('pai_id,2,Pais,pro_id,2,Provincias,loc_id,2,Localidades,prp_dom,1,Domicilio,tip_id,2,Tipo_de_Construccion,con_id,2,Condicion,prop_nombre,1,Nombre_Propietario,prop_apellido,1,Apellido_Propietario','prp_edit_form');"/>
            </div></td>
          <td width="50%"><div align="center">
            <input name="cancelar" type="reset" class="botonForm" value="Cancerlar" onclick="parent.Windows.close('propiedad');" />
          </div></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</xsl:template>
</xsl:stylesheet> 