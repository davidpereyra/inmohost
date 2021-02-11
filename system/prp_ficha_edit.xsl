<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://localhost/inmohostV2.0/system/datos/prp_ficha_edit.xml.php?usr_id=1200&prp_id=1&mod_tip=edit" -->
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
<xsl:param name="carpetaFotos" />


<xsl:template match="/">



<xsl:choose>
	
	<!-- EN EL CASO QUE NO ESTE LA PROPIEDAD -->
	<xsl:when test="XMLTEXTO/propiedad = 0">
		<div id="nulo">
		<div align="center"><br/>
		    <br/>
		  NO EXISTE EL INMUEBLE SOLICITADO
		  </div>
		</div>
	</xsl:when>
	
<xsl:otherwise>

<!--MENUEXTRA-->
<xsl:if test="$mod_tip!='add'">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr class="tr1">
      <xsl:if test="XMLTEXTO/propiedad/menuAu = '1'">
        </xsl:if>
      <td width="30%"><div align="center">
        <h2><xsl:value-of select="XMLTEXTO/propiedad/usr_raz"/></h2>
      </div></td>
      <td width="35%"><div align="center">
        <h3>Publicaci�n: <xsl:value-of select="XMLTEXTO/propiedad/prp_alta"/></h3>
      </div></td>
      <td width="35%">
        <h3 align="center">Modificaci�n: <xsl:value-of select="XMLTEXTO/propiedad/prp_mod"/></h3>      </td>
    </tr>
  </table>
	<xsl:if test="XMLTEXTO/propiedad/menuAu = '1'">
	  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" style="margin-bottom:2px;">
        <tr class="tableClara">
          <xsl:if test="XMLTEXTO/propiedad/editCitas = '1'">
            <td width="20%"><p align="center"><a href="javascript:parent.ventana('agenda_citas', '&amp;prp_id={$prp_id}&amp;usr_id={$usr_id}&amp;mod_edit=0', '{$fileCita}', 'Ver Citas');"  class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/citas.png" width="32" height="32" /><br />
              Ver citas</a> </p></td>
          </xsl:if>
          <xsl:if test="XMLTEXTO/propiedad/editPro = '1'">
            <td width="20%"><div align="center"><a href="javascript:;" onclick="position(event); toolTip('{$filePropietario}&amp;prp_id={$prp_id}',this);"  class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/propietario.png" width="32" height="32" /><br />
              &nbsp;Propietario</a> </div></td>
          </xsl:if>
          <xsl:if test="XMLTEXTO/propiedad/editImprimir = '1'">
            <td width="20%"><div align="center">
			<xsl:choose>	
 			<xsl:when test="XMLTEXTO/propiedad/fo_enl != '0-0-0.jpg'">
				<a href="javascript:confirm('Imprimir la ficha con la Foto?')?parent.ventana('ficha_imp', '&amp;imprimir=1&amp;imp_foto=1&amp;mod_edit=1&amp;prp_id={$prp_id}&amp;usr_inmohost={$usr_id}&amp;usr_id={XMLTEXTO/propiedad/usr_id}', 'system/prp_ficha.php', 'Vista Previa Impresion'):parent.ventana('ficha_imp', '&amp;mod_edit=1&amp;prp_id={$prp_id}&amp;usr_id={XMLTEXTO/propiedad/usr_id}&amp;imprimir=1', 'system/prp_ficha.php', 'Vista Previa Impresion')" title="Imprimir" class="aNulo">
				

					<br />
					Imprimir
				</a>
			</xsl:when>
			<xsl:otherwise>
				<a href="javascript:parent.ventana('ficha_imp', '&amp;imprimir=1&amp;mod_edit=1&amp;prp_id={$prp_id}&amp;usr_inmohost={$usr_id}&amp;usr_id={XMLTEXTO/propiedad/usr_id}', 'system/prp_ficha.php', 'Vista Previa Impresion');" title="Imprimir" class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/imprimir.png" width="32" height="32" />
					<br/>
					Imprimir
				</a>
			</xsl:otherwise>
		</xsl:choose>
		</div></td>
          </xsl:if>
          <xsl:if test="XMLTEXTO/propiedad/editFicha = '0'">
            <td width="20%"><div align="center"><a href="javascript:window.parent.window.ventana('prp_ficha', '&amp;prp_id={$prp_id}&amp;usr_id={$usr_id}&amp;mod_edit=0', '{$fileFicha}', 'Ficha de Propiedad')" class="aNulo" ><img src="../interfaz/inmohost/images/iconos/32/ficha.png" width="32" height="32" /><br />
              Ficha</a></div></td>
          </xsl:if>
          <xsl:if test="XMLTEXTO/propiedad/editEstado = '1'">
          <td width="20%"><div align="center"><a href="javascript:window.parent.window.ventana('prp_listado', '&amp;inmo_id={$usr_id}&amp;prp_id={$prp_id}&amp;mod_edit=mod_del', '{$fileFichaEstado}', 'Modificar Estado')"   title="Modificar Estado"  class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/editar.png" width="32" height="32" /><br />
              &nbsp;Modificar Estado</a> </div></td>
          </xsl:if>
        </tr>
      </table>
	</xsl:if>
</xsl:if>

<!--//MENUEXTRA-->

<table width="99%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr class="tableClara">
    <td><form action="prp_ficha_edit.php" method="post" enctype="multipart/form-data" name="prp_edit_form" id="prp_edit_form">
      <input type="hidden" name="usr_id" value="{$usr_id}"  id="usr_id"/>
      <input type="hidden" name="prp_id" value="{$prp_id}" id="prp_id"/>
      <input type="hidden" name="prp_mod" value="2007-02-13" />
      <input type="hidden" name="usuario" value="g" />
      <input type="hidden" name="publica" value="1" />
      <input type="hidden" name="pal" value="0" />
      <input type="hidden" name="edited" value="0" />
      <input type="hidden" name="mod_tip" id="mod_tip" value="{$mod_tip}" />
      <input type="hidden" name="error_val" value="{$mod_tip}" />
      <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
        <tr class="tr1">
          <td colspan="4"><h1>&nbsp;&nbsp;&nbsp;&nbsp;Ubicaci�n</h1></td>
        </tr>
        <tr class="tableClara">
          <td width="20%"><div align="right" id="pai_id_div"><strong>Pa�s:</strong></div></td>
          <td width="30%" >
          <select name="pai_id" onchange="act_select('pro_id,pro_desc','provincias','pai_id='+this.value,'pro_id','','php/funciones','loc_desc');" class="inputForm" tabindex="1">
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
          <td><span id="div_pro_id"><select name="pro_id" id="pro_id" onchange="act_select('loc_id,loc_desc','localidades','pro_id='+this.value,'loc_id','','php/funciones','loc_desc');showAddress();" class="inputForm" tabindex="2">
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
          <td width="30%" ><span id="div_loc_id"><select name="loc_id" onchange="showAddress();" class="inputForm" tabindex="3" id="loc_id">
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
          <td><input type="text" id="prp_dom" name="prp_dom" value="{XMLTEXTO/propiedad/prp_dom}" style="width:150px;" class="inputForm" tabindex="5" onChange="javascript:no_vacio(this.name,'prp_edit_form');" onblur="showAddress();" />
            <span class="destacado2">*</span></td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">M�s info domicilio:</div></td>
          <td colspan="3"><input style="width:150px;" type="text" name="prp_plano" value="{XMLTEXTO/propiedad/prp_plano}" class="inputForm" tabindex="4"/></td>
        </tr>



        <tr class="tableClara">
          <td><div align="right">Ubicaci�n en Mapa:</div></td>
          <td colspan="3">
            	<div id="map-canvas" style="width: 500px; height: 200px"></div>
          </td>
        </tr>
           <tr class="tableClara">
           <td align="center" colspan="3"> 
           Latitud:  <input style="width:150px;" type="text" name="prp_lat" value="{XMLTEXTO/propiedad/prp_lat}" readonly="readonly" class="inputForm" /> 
           Longitud: <input style="width:150px;" type="text" name="prp_lng" value="{XMLTEXTO/propiedad/prp_lng}" readonly="readonly" class="inputForm" />
           </td>
           <td align="center"><input name="borrar" type="button" class="botonForm" value="Borrar Ubicaci�n" onclick="load('1');"/></td>
        </tr>
        <!--tr class="tableClara">
          <td><div align="right"><strong>Geolocalizar -> </strong></div></td>
          <td colspan="3"><a href="https://maps.google.com?t=h&amp;q=-32.9,-68.8" target="blank" title="Ver Ubicaci�n"><img align="middle" src="../interfaz/images/googlemaps.jpg" alt="Geolocalizar" width="60"></a></td>
        </tr-->
        <input type="hidden" name="min" value="" />
        <input type="hidden" name="max" value="" />
        <input type="hidden" name="usuario" value="" />
        <tr class="tr1">
          <td colspan="4"><h1>&nbsp;&nbsp;&nbsp;&nbsp;Datos de la Propiedad</h1></td>
        </tr>
        <tr class="tableClara">
          <td><div align="right" id="tip_id_div"><strong>Barrio Privado:</strong></div></td>
          <td><select name="bar_id" class="inputForm" tabindex="6">
          	
          <xsl:for-each select="XMLTEXTO/datos/bar_priv/option">
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
          <td><div align="right" id="con_id_div"><strong>Oportunidad:</strong></div></td>
          <td>
          	<xsl:if test="XMLTEXTO/propiedad/prp_vip = 'SI'">
                    SI<input name="prp_vip" type="radio" class="inputForm"  value="1" tabindex="46" checked="checked"/>
	                NO<input name="prp_vip" type="radio" class="inputForm" value="0" tabindex="47"/>
			</xsl:if>
			<xsl:if test="XMLTEXTO/propiedad/prp_vip = 'NO'">
	        	    SI<input name="prp_vip" type="radio" class="inputForm"  value="1" tabindex="48" />
	                NO<input name="prp_vip" type="radio" class="inputForm" value="0" checked="checked" tabindex="49"/>
			</xsl:if>         
               </td>
        </tr>
        <tr class="tableClara">
          <td><div align="right" id="tip_id_div"><strong>Tipo Construcci�n:</strong></div></td>
          <td><select name="tip_id" class="inputForm" tabindex="6"  id="select_tip_id">
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
          <td><div align="right" id="con_id_div"><strong>Condici�n:</strong></div></td>
          <td ><select name="con_id" class="inputForm" tabindex="7" id="select_con_id">
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
          <td><div align="right">Orientaci�n:</div></td>
          <td colspan="3"><select name="ori_id" class="inputForm" tabindex="8">
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
          </tr>
        <tr class="tableClara">
          <td><div align="right" id="prp_pre_div"><strong>Valor Publicado $:</strong></div></td>
          <td><input type="text" style="width:150px;" name="prp_pre" value="{XMLTEXTO/propiedad/prp_pre}" class="inputForm" tabindex="9"/>
            <span class="destacado2"></span>          </td>
          <td><div align="right">Valor Publicado U$S:</div></td>
          <td><input type="text" style="width:150px;" name="prp_pre_dol" value="{XMLTEXTO/propiedad/prp_pre_dol}" class="inputForm" tabindex="10"/>          </td>
        </tr>
        <tr class="tr3">
          <td><div align="right">Tasaci�n/Exp. $:</div></td>
          <td><input type="text" style="width:150px;" name="precio_inmo" value="{XMLTEXTO/propiedad/precio_inmo}" class="inputForm" tabindex="12"/>          </td>
          <td><div align="right">Valor Propietario:</div></td>
          <td><input type="text" style="width:150px;" name="precio_prop" value="{XMLTEXTO/propiedad/precio_prop}" class="inputForm" tabindex="13"/>          </td>
        </tr>
        <tr class="tableClara">
          <td class="tr3"><div align="right">Tasaci�n en U$S:</div></td>
          <td class="tr3"><input type="text" style="width:150px;" name="precio_trans" value="{XMLTEXTO/propiedad/precio_trans}" class="inputForm" tabindex="14"/>          </td>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr class="tableClara">
          <td><div align="right">Descripci�n:</div></td>
          <td colspan="3"><textarea name="prp_desc" id="prp_desc" rows="4" tabindex="15" style="width:490px;" class="inputForm"><xsl:value-of select="XMLTEXTO/propiedad/prp_desc" disable-output-escaping="yes"/>&#160;</textarea>          </td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Nota:</div></td>
          <td colspan="3"><textarea name="prp_nota" rows="4" tabindex="16" style="width:490px;" class="inputForm"><xsl:value-of select="XMLTEXTO/propiedad/prp_nota" disable-output-escaping="yes" />&#160;</textarea>          </td>
        </tr>
        <tr class="tr1">
		        <td colspan="4" ><h1>&nbsp;&nbsp;&nbsp;&nbsp;Servicios:</h1></td>
		</tr>
			  
		<xsl:if test="prp_servicios != ''">
	      <tr class="tableClara">
		        <td colspan="4" ><xsl:value-of select="prp_servicios"/>				</td>
              </tr>
		</xsl:if>
			<tr class="tableClara">
			   <td valign="top" colspan="2">
<div style="display:block">
			  <xsl:for-each select="XMLTEXTO/propiedad/servicios/serv">
 				<xsl:variable name="modulo" select="(position()-1) mod 2" />
					<xsl:if test="$modulo = 0">
	<div style="height:25px; border-bottom:#CCCCCC 1px solid; padding-right:10px; padding-top:3px;" align="right" >
                      <div id="{serv_name}_div" align="right" style='float:left;width:210px'><xsl:value-of select="serv_desc"/></div>
					<xsl:choose>
							<xsl:when test="serv_type='text'">:&nbsp;
	              					<input type='{serv_type}' name='{serv_name}' value='{serv_valor}' style="width:75px;"  class="inputForm" tabindex="{position()+15}"/>	
	  	                    		<input type="hidden" name="ser_id0" value="2" />              
                      		</xsl:when>
                      		
              				<xsl:when test="serv_type='select'">:&nbsp;
	              					<select name='{serv_name}' class="inputForm" tabindex="{position()+16}"/>
	  	                    		<xsl:for-each select="serv_opciones/opcion">
										<xsl:if test="@selected = '1'">
											<option value='{.}' selected="selected"><xsl:value-of select="."/></option>
										</xsl:if>
										<xsl:if test="@selected = '0'">
											<option value='{.}'><xsl:value-of select="."/></option>
										</xsl:if>
	              					</xsl:for-each>
	              					<input type="hidden" name="ser_id0" value="2" />              
                      		</xsl:when>
							
              				<xsl:when test="serv_type='checkbox'">:&nbsp;
	              					<input type='{serv_type}' name='{serv_name}' value='{serv_valor}' style="width:100px;"  class="inputForm" tabindex="{position()+15}"/>	
	  	                    		<input type="hidden" name="ser_id0" value="2" />              
                      		</xsl:when>
					</xsl:choose>
					<br/>
					</div>
					</xsl:if>
		        </xsl:for-each>
</div>				</td>
				
			   <td valign="top" colspan="2">
<div style="display:block">
			  <xsl:for-each select="XMLTEXTO/propiedad/servicios/serv">
 				<xsl:variable name="modulo" select="(position()-1) mod 2" />
					<xsl:if test="$modulo = 1">
			<div style="height:25px; border-bottom:#CCCCCC 1px solid; padding-left:10px; padding-top:3px;" align="left" >
                      <xsl:value-of select="serv_desc"/>:&nbsp;
						<xsl:choose>
							<xsl:when test="serv_type='text'">
	              					<input type='{serv_type}' name='{serv_name}' value='{serv_valor}' style="width:75px;" class="inputForm" tabindex="{position()+16}"/>	
	  	                    		<input type="hidden" name="ser_id0" value="2" />              
                      		</xsl:when>
                      		
              				<xsl:when test="serv_type='select'">
	              					<select name='{serv_name}' class="inputForm" tabindex="{position()+16}"/>
	  	                    		<xsl:for-each select="serv_opciones/opcion">
										<xsl:if test="@selected = '1'">
											<option value='{.}' selected="selected"><xsl:value-of select="."/></option>
										</xsl:if>
										<xsl:if test="@selected = '0'">
											<option value='{.}'><xsl:value-of select="."/></option>
										</xsl:if>
	              					</xsl:for-each>
	              					<input type="hidden" name="ser_id0" value="2" />              
                      		</xsl:when>
							
              				<xsl:when test="serv_type='checkbox'">
	              					<input type='{serv_type}' name='{serv_name}' value='{serv_valor}' style="width:100px;" class="inputForm" tabindex="{position()+16}"/>	
	  	                    		<input type="hidden" name="ser_id0" value="2" />              
                      		</xsl:when>
					</xsl:choose>
					<br/>
					</div>
					</xsl:if>
		        </xsl:for-each>
</div>				</td>
              </tr>
        <tr class="tableClara">
          <td><div align="right">Otros Servicios:</div></td>
          <td colspan="3"><textarea name="prp_servicios" rows="4" tabindex="36" class="inputForm" style="width:490px;" ><xsl:value-of select="XMLTEXTO/propiedad/prp_servicios" disable-output-escaping="yes"/>&#160;</textarea></td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Link de Video:</div></td>
          <td colspan="3">
            <input type="text" style="width:450px;" name="prp_visibilidad" value="{XMLTEXTO/propiedad/prp_visibilidad}" class="inputForm" tabindex="37"/>
          </td>
        </tr>      
	    <tr class="tr1">
          <td colspan="4"><h1>&nbsp;&nbsp;&nbsp;&nbsp;Otros Medios </h1></td>
          </tr>
		  
           <tr class="tr3">
           

           
          <td><div align="right" id="prp_pub_div"><strong>Aviso Publicitario:</strong></div></td>
  
            <td colspan="3" rowspan="2">
		<textarea id="prp_pub" name="prp_pub" rows="5" tabindex="36" class="inputForm" style="width:490px;"  onChange="javascript:no_vacio(this.name,'prp_edit_form');"  onkeypress="contar_palabras('prp_pub');"><xsl:value-of select="XMLTEXTO/propiedad/prp_pub" disable-output-escaping="yes"/>&#160;</textarea>
          <span class="destacado2">*</span> </td>

        </tr>
        
		<tr class="tr3">
          <td><div align="right">palabras escritas:&nbsp;
                <input name="palabras_prp_pub" tabindex="99" type="text" id="palabras_prp_pub" value="0" class="inputFecha" style="width:23px" size="3" maxlength="3" readonly="" />
          </div></td>
        </tr>
        <tr class="tableClara">
          <td ><div align="right">Formatos Digitales:</div></td>
          <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="45%"><div align="right">Web Propia:</div></td>
                <td width="5%"><div align="center">

						<xsl:if test="XMLTEXTO/propiedad/prp_publica = '1'">
    	            		<input type="checkbox" name="publica" class="inputForm" tabindex="37" checked="checked" />
						</xsl:if>
						<xsl:if test="XMLTEXTO/propiedad/prp_publica = '0'">
	                		<input type="checkbox" name="publica" class="inputForm" tabindex="37" />
						</xsl:if>
						

                </div>
                </td>
                <td width="50%">&nbsp;</td>
              </tr>
              
              <xsl:if test="XMLTEXTO/propiedad/pro_id = '21'">
              <tr>
                <td class="tableClara"><div align="right">C.I.M.:</div></td>
                <td class="tableClara"><div align="center">

						<xsl:if test="XMLTEXTO/propiedad/mos_por_2 = '1'">
	                		<input type="checkbox" name="mos_por_2" class="inputForm" tabindex="38" checked="checked"/>
						</xsl:if>
						<xsl:if test="XMLTEXTO/propiedad/mos_por_2 = '0'">
	                		<input type="checkbox" name="mos_por_2" class="inputForm" tabindex="38"/>
						</xsl:if>

                </div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="tableClara"><div align="right">C.C.P.I.M.:</div></td>
                <td class="tableClara"><div align="center">

						<xsl:if test="XMLTEXTO/propiedad/mos_por_3 = '1'">
	                		<input type="checkbox" name="mos_por_3" class="inputForm" tabindex="39" checked="checked"/>
						</xsl:if>
						<xsl:if test="XMLTEXTO/propiedad/mos_por_3 = '0'">
	                		<input type="checkbox" name="mos_por_3" class="inputForm" tabindex="39"/>
						</xsl:if>

                </div></td>
                <td >&nbsp;</td>
              </tr>
              
              </xsl:if>
              
              <tr>
                <td colspan="3"><hr />
                <xsl:choose>
				  <xsl:when test="XMLTEXTO/propiedad/prp_anonimo = 1">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="botonForm" id="trAnonimo">    
                      <tr>
                        <td width="45%"><div align="right"><strong>Inmoclick:</strong></div></td>
                        <td width="5%"><div align="center">
                        <xsl:if test="XMLTEXTO/propiedad/mos_por_1 = '1'">
	                		<input type="checkbox" name="mos_por_1" class="inputForm" tabindex="40" checked="checked"/>
						</xsl:if>
						<xsl:if test="XMLTEXTO/propiedad/mos_por_1 = '0'">
	                		<input type="checkbox" name="mos_por_1" class="inputForm" tabindex="40"/>
						</xsl:if>
                        </div></td>
                        <td width="50%" rowspan="2"><div align="center" class="tr3"><strong>Publicaci�n An�nima</strong><br />
                        		
		                        <xsl:choose>
									  <xsl:when test="XMLTEXTO/propiedad/prp_anonimo = 1">
					                         <input type='checkbox' checked='true' name='prp_anonimo' value='1' onclick="changeStyle('trAnonimo', 'tableClara', 'botonForm');" tabindex="41"/>										 
									  </xsl:when>
									  <xsl:otherwise>
						                     <input type='checkbox' name='prp_anonimo' value='1' onclick="changeStyle('trAnonimo', 'tableClara', 'botonForm');" tabindex="41"/>
									  </xsl:otherwise>
								</xsl:choose>
                        
                        
      
                                <br />
                        </div></td>
                      </tr>
                  </table>
				  </xsl:when>
				  <xsl:otherwise>
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tableClara" id="trAnonimo">    
                      <tr>
                        <td width="45%"><div align="right"><strong>Inmoclick:</strong></div></td>
                        <td width="5%"><div align="center">
                        <xsl:if test="XMLTEXTO/propiedad/mos_por_1 = '1'">
	                		<input type="checkbox" name="mos_por_1" class="inputForm" tabindex="40" checked="checked"/>
						</xsl:if>
						<xsl:if test="XMLTEXTO/propiedad/mos_por_1 = '0'">
	                		<input type="checkbox" name="mos_por_1" class="inputForm" tabindex="40"/>
						</xsl:if>
                        </div></td>
                        <td width="50%" rowspan="2"><div align="center" class="tr3"><strong>Publicaci�n An�nima</strong><br />
                        		
		                        <xsl:choose>
									  <xsl:when test="XMLTEXTO/propiedad/prp_anonimo = 1">
					                         <input type='checkbox' checked='true' name='prp_anonimo' value='1' onclick="changeStyle('trAnonimo', 'tableClara', 'botonForm');" tabindex="41"/>										 
									  </xsl:when>
									  <xsl:otherwise>
						                     <input type='checkbox' name='prp_anonimo' value='1' onclick="changeStyle('trAnonimo', 'tableClara', 'botonForm');" tabindex="41"/>
									  </xsl:otherwise>
								</xsl:choose>
                        
                        
      
                                <br />
                        </div></td>
                      </tr>
                  </table>
				  </xsl:otherwise>
				</xsl:choose>
					
		            
                  </td>
              </tr>
          </table></td>
        </tr>
        <tr class="tr1">
          <td colspan="4"><h1>&nbsp;&nbsp;&nbsp;&nbsp;Referencias</h1></td>
          </tr>
        <tr class="tableClara">
          <td><div align="right">Referente: </div></td>
          <td>
		  
	<select name="emp_id" class="inputForm" tabindex="42">
          <xsl:for-each select="XMLTEXTO/datos/referentes/option">
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
          <td class="tr3"><div align="right">N� de Llave:</div></td>
          <td class="tr3"><input name="prp_llave" type="text" class="inputForm" style="width:120px;" value="{XMLTEXTO/propiedad/prp_llave}" tabindex="43" />          </td>
        </tr>
        <tr class="tr3">
          <td><div align="right">N� Tasaci�n:</div></td>
          <td><input name="prp_tas" type="text" class="inputForm"  style="width:120px;" value="{XMLTEXTO/propiedad/prp_tas}" tabindex="44" />          </td>
          <td><div align="right">Matr�cula:</div></td>
          <td><input name="prp_insc_dom" type="text" class="inputForm" style="width:120px;" value="{XMLTEXTO/propiedad/prp_insc_dom}" tabindex="45" />      
         </td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Cartel:</div></td>
          <td> 
			<xsl:if test="XMLTEXTO/propiedad/cartel = 'SI'">
                    SI<input name="prp_cartel" type="radio" class="inputForm"  value="1" tabindex="46" checked="checked"/>
	                NO<input name="prp_cartel" type="radio" class="inputForm" value="0" tabindex="47"/>
			</xsl:if>
			<xsl:if test="XMLTEXTO/propiedad/cartel = 'NO'">
	        	    SI<input name="prp_cartel" type="radio" class="inputForm"  value="1" tabindex="48" />
	                NO<input name="prp_cartel" type="radio" class="inputForm" value="0" checked="checked" tabindex="49"/>
			</xsl:if>          
          </td>
          <td class="tr3"><div align="right">Autorizada:</div></td>
          <td class="tr3"> 
          <xsl:if test="XMLTEXTO/propiedad/prp_aut = '1'">
                    SI<input name="prp_aut" type="radio" class="inputForm"  value="1" tabindex="50" checked="checked"/>
	                NO<input name="prp_aut" type="radio" class="inputForm" value="0" tabindex="51"/>
			</xsl:if>
			<xsl:if test="XMLTEXTO/propiedad/prp_aut = '0'">
	        	    SI<input name="prp_aut" type="radio" class="inputForm"  value="1" tabindex="52" />
	                NO<input name="prp_aut" type="radio" class="inputForm" value="0" checked="checked" tabindex="53"/>
			</xsl:if>          
           </td>
        </tr>
        <tr class="tr1">
          <td colspan="4" ><h1>&nbsp;&nbsp;&nbsp;&nbsp;Datos del Propietario</h1></td>
        </tr>
        <tr class="tr3">
          <input type="hidden" name="prop_id" value="{XMLTEXTO/propiedad/prop_id}"/>
        	<td><div align="right" id='prop_nombre_div'><strong>Nombre:</strong></div></td>
          <td><input name="prop_nombre" type="text" class="inputForm"  style="width:150px;" value="{XMLTEXTO/propiedad/prop_nombre}" tabindex="54"/>
                <span class="destacado2">*</span></td>
          <td><div align="right" id='prop_apellido_div'><strong>Apellido:</strong></div></td>
          <td><input type="text"  style="width:150px;" name="prop_apellido" value="{XMLTEXTO/propiedad/prop_apellido}" class="inputForm" tabindex="55"/>
                <span class="destacado2">*</span></td>
        </tr>
        <tr class="tr3">
          <td><div align="right">Telefono:</div></td>
          <td><input name="prop_tel" type="text" class="inputForm"  style="width:150px;" value="{XMLTEXTO/propiedad/prop_tel}" tabindex="56" />          </td>
          <td><div align="right">Domicilio:</div></td>
          <td><input type="text" style="width:150px;" name="prop_dom"  value="{XMLTEXTO/propiedad/prop_dom}" class="inputForm" tabindex="57"/>          </td>
        </tr>
        <tr class="tr3">
          <td><div align="right">E-mail:</div></td>
          <td><input name="prop_mail" type="text" class="inputForm"  style="width:150px;" value="{XMLTEXTO/propiedad/prop_mail}" tabindex="58" /></td>
          <td colspan="2">&nbsp;</td>
          </tr>
        <tr class="tr3">
          <td><div align="right">Nota:</div></td>
          <td colspan="3"><textarea name="prop_nota" rows="4" tabindex="59" class="inputForm" style="width:490px;" ><xsl:value-of select="XMLTEXTO/propiedad/prop_nota" disable-output-escaping="yes"/>&#160;</textarea>          </td>
        </tr>
        <tr class="tr1">
          <td colspan="4" ><h1>&nbsp;&nbsp;&nbsp;&nbsp;Im�genes</h1></td>
        </tr>
		
        
<!-- FOTOS -->
		<tr>
		<td colspan='4'>	
          <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
          <tr class="tr3">
        		  <td align='center'>Nro</td>
          		  <td align='center'>Foto</td>
          		  <td align='center'>Descripcion</td>
          		  <td align='center'>Quitar</td>
           		  <td align='center'>Ver</td>
       	   </tr>
		<xsl:for-each select="XMLTEXTO/propiedad/imagenes/foto">
		<xsl:variable name="numero" select="position()"/>
        <tr class="tableClara">
         
		          <td><div align="right">Foto <xsl:value-of select="$numero"/>:</div></td>
		          <td>
		            
		            <input type="file" name="fo{$numero}" class="inputForm" tabindex="{position()+59}"/>
		            </td>
		            <td>
		            Descripci�n:
		            <input type='text' name='fo_desc{$numero}' value="{foto_desc}" style="width:125px;" class="inputForm" tabindex="{position()+59}"/>
		           </td>
		           <td> 
						
			        	<xsl:if test="foto_enl!=''">
			        	  <div style="display:inline; background:#EEEEEE; margin-left:3px;">&nbsp;[<input type='checkbox' name='quitar_fo{$numero}' title="QUITAR FOTO [Foto{$numero}]" id="quitar_fo{$numero}"  />]</div>
			        	</xsl:if>
			        </td>	
					<td>	        	
			        	<xsl:if test="foto_enl!=''">
			        	  <a href="javascript:;" onclick="parent.ver_foto('{foto_enl}');" class="aNulo" title="Ver Foto [Foto{$numero}]"><img src="../interfaz/inmohost/images/iconos/20/panoramica.png" width="20" height="20" hspace="6" align="right" /></a>
				        </xsl:if>
					
	    	</td>	
       	</tr>
            </xsl:for-each>
          	
		</table>
		</td>
	</tr>
<!-- FOTOS -->

        <input type="hidden" name="vect_fotos" value="x1x2x3x4x5x6x7x8x9x10x11x12x13x14x15" />
        <input type="hidden" name="cant_fotos" value="15" />
        <input type="hidden" name="prp_mostrar" value="{XMLTEXTO/propiedad/prp_mostrar}" />
      </table>
      <table width="100%">
        <tr class="tableClara">
          <td width="50%"><div align="center">
			<input name="cancelar" type="reset" class="botonForm" value="Cancelar" tabindex="58" onclick="parent.Windows.close('propiedad');" />            
            </div></td>
          <td width="50%"><div align="center">
			<input name="enviar" type="button" class="botonForm" value="Aceptar" tabindex="59" onclick="javascript:valida_propiedad('pai_id,2,Pais,pro_id,2,Provincias,loc_id,2,Localidades,prp_dom,1,Domicilio,tip_id,2,Tipo_de_Construccion,con_id,2,Condicion,prop_nombre,1,Nombre_Propietario,prop_apellido,1,Apellido_Propietario,prp_pub,1,Aviso_Publicitario','prp_edit_form');"/>
          
          </div></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
<!-- FIN PROPIEDAD -->
    </xsl:otherwise>
    </xsl:choose>
</xsl:template>
</xsl:stylesheet> 