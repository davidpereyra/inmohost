<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://localhost/inmohostV2.0/system/datos/informes.xml.php?tipo_inf=demandas" -->
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

<xsl:param name="fileCalendario"/>
<xsl:param name="destino1"/>
<xsl:param name="titulo"/>
<xsl:param name="url"/>
<xsl:param name="parametros"/>
<xsl:template match="/">

  <!-- ARMO EL FORMULARIO DE ENVÍO -->
  
  <table width="100%" height="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
        <tr class="tableClara">
          <td width="150%" colspan="5">
            <h1 align="left">Demandas</h1>
					</td>
          </tr>
		<tr class="tableClara">
		  <td colspan="5">
		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarDemandas" >
              <tr class="tableClara">
                <td><div align="right" id="pro_id_div">Provincia:</div></td>
                <td><span id="div_pro_id"><select name="pro_id" class="inputForm" id="pro_id" tabindex="1" onchange="act_select('loc_id,loc_desc','localidades','pro_id='+this.value,'loc_id',' multiple size=3 ','php/funciones','loc_desc');" >
					<xsl:for-each select="informes/provincias/option">
						<xsl:choose>
							<xsl:when test="../selected = @value">
							 <option value="{@value}" selected="selected"><xsl:value-of select="." disable-output-escaping="yes"/></option>
						  </xsl:when>
						  <xsl:otherwise>
							 <option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
						  </xsl:otherwise>
						</xsl:choose>
		          </xsl:for-each>
                </select></span></td>
				<td>&#160;</td><td>&#160;</td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="aux_loc_id_div">Localidad:</div></td>
                <td><span id="div_loc_id">
                		<select size="3" name="loc_id[]" multiple="true" class="inputForm" id="loc_id" tabindex="2">
							<xsl:for-each select="informes/localidades/option">
									 <option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
					      	</xsl:for-each>
               			</select>
               		</span>	
                </td>
                <td>
                <input name="quitar" type="button" class="botonForm" id="quitar" tabindex="3" value=" &#60;&#60; Quitar  &#160;&#160; " onclick="quitar_item_select('aux_loc_id','informesPrp');" />&#160;
                <input name="agregar" type="button" class="botonForm" id="agregar" tabindex="4" value="Agregar &#62;&#62;" onclick="agregar_item_select('loc_id','aux_loc_id','informesPrp');" />
                </td>
                <td>
                		<select size="3" name="aux_loc_id" multiple="true" class="inputForm" id="aux_loc_id" tabindex="5">
							<xsl:for-each select="informes/localidades/option">
								<xsl:choose>
									<xsl:when test="../selected = @value">
									 <option value="{@value}" selected="selected"><xsl:value-of select="." disable-output-escaping="yes"/></option>
								  </xsl:when>
							</xsl:choose>
					      </xsl:for-each>
               			</select>
                </td>
              </tr>
              
              
              <tr class="tableClara">
                <td><div align="right" id="aux_tip_id_div">Tipo de Cons.:</div></td>
                <td><span id="div_tip_id">
                	<select  multiple="true" size="3" name="tip_id[]" class="inputForm" id="tip_id" tabindex="6" >
						<xsl:for-each select="informes/tipoCons/option">
							<option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
						</xsl:for-each>							
                	</select></span></td>
                <td>
                <input name="quitar" type="button" class="botonForm" id="quitar" tabindex="3" value=" &#60;&#60; Quitar  &#160;&#160; " onclick="quitar_item_select('aux_tip_id','informesPrp');" />&#160;
                <input name="agregar" type="button" class="botonForm" id="agregar" tabindex="4" value="Agregar &#62;&#62;" onclick="agregar_item_select('tip_id','aux_tip_id','informesPrp');" />
                </td>
                <td>
                	<select  multiple="true" size="3" name="aux_tip_id" class="inputForm" id="aux_tip_id" tabindex="9" >
						<xsl:for-each select="informes/tipoCons/option">
						<xsl:choose>
							  <xsl:when test="../selected = @value">
								 <option value="{@value}" selected="selected"><xsl:value-of select="." disable-output-escaping="yes"/></option>
							  </xsl:when>
						</xsl:choose> 
			          </xsl:for-each>                		
					</select>
				</td>

              </tr>
              
              <tr class="tableClara">
                <td><div align="right" id="aux_con_id_div">Condici&oacute;n:</div></td>
                <td><span id="div_con_id">
                	<select multiple="true" size="3" name="con_id[]" class="inputForm" id="con_id" tabindex="10">
						<xsl:for-each select="informes/tipoCond/option">
							<option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
			          	</xsl:for-each>
                	</select></span>
                </td>
              	<td>
                <input name="quitar" type="button" class="botonForm" id="quitar" tabindex="3" value=" &#60;&#60; Quitar  &#160;&#160; " onclick="quitar_item_select('aux_con_id','informesPrp');" />&#160;
                <input name="agregar" type="button" class="botonForm" id="agregar" tabindex="4" value="Agregar &#62;&#62;" onclick="agregar_item_select('con_id','aux_con_id','informesPrp');" />
              	</td>  
              	<td>
              		<select multiple="true" size="3" name="aux_con_id" class="inputForm" id="aux_con_id" tabindex="13">
						<xsl:for-each select="informes/tipoCond/option">
						 <xsl:choose>
								<xsl:when test="../selected = @value">
								 <option value="{@value}" selected="selected"><xsl:value-of select="." disable-output-escaping="yes"/></option>
							  </xsl:when>
						</xsl:choose>
			          </xsl:for-each>              		
					</select>
				</td>  
              </tr>
              
              <tr class="tableClara">
                <td><div align="right">Domicilio:</div></td>
                <td><span id="div_dem_nom"><input name="dem_dom" type="text" class="inputForm" id="prp_id2" tabindex="14" style="width:80px" value="{informes/dem_dom}" /></span></td>
				<td>&#160;</td>
				<td>&#160;</td>
              </tr>
              
              <tr class="tableClara">
                <td><div align="right">Barrio:</div></td>
                <td><span id="div_dem_barr"><input name="dem_barr" type="text" class="inputForm" id="prp_id3" tabindex="15" style="width:80px" value="{informes/dem_barr}"/></span></td>
				<td>&#160;</td>
				<td>&#160;</td>
              </tr>
               <tr class="tableClara">
                <td><div align="right">Rango de Precio:</div></td>
                <td><span id="div_dem_pre_min"><input name="dem_pre_min" type="text" class="inputForm" id="prp_id4" tabindex="16" style="width:50px" value="{informes/dem_pre_min}"/></span> 
                  y
                    <span id="div_dem_pre_max"><input name="dem_pre_max" type="text" class="inputForm" id="prp_id5" tabindex="17" style="width:50px" value="{informes/dem_pre_max}"/></span></td>
					<td>&#160;</td>
				<td>&#160;</td>
              </tr>
              
               <tr class="tableClara">
                <td><div align="right">Demanda:</div></td>
                <td><textarea cols="17" rows="2" class="inputForm" name="dem_desc"><xsl:value-of select="informes/dem_desc" disable-output-escaping="yes"/></textarea> 
                </td>
				<td>&#160;</td>
				<td>&#160;</td>
              </tr>
               <tr class="tableClara">
		          <td width="150%" colspan="5">
		            <h1 align="left">Datos del demandante</h1>
								
					</td>
		          </tr>
		          <tr class="tableClara">
	                <td><div id="dem_raz_div" align="right">Razon Social:</div></td>
	                <td><input type="text" name="dem_raz" size="15" value="{informes/dem_raz}"/></td>
					<td>&#160;</td>
				<td>&#160;</td>
              	</tr>
              	 <tr class="tableClara">
	                <td><div id="dem_tel_div" align="right">Telefono:</div></td>
	                <td><input type="text" name="dem_tel" size="15" value="{informes/dem_tel}"/></td>
					<td>&#160;</td>
				<td>&#160;</td>
              	</tr>
              	<tr class="tableClara">
	                <td><div id="dem_mail_div" align="right">E-Mail:</div></td>
	                <td><input type="text" name="dem_mail" size="15" value="{informes/dem_mail}"/></td>
					<td>&#160;</td>
				<td>&#160;</td>
              	</tr>
				
              <tr class="tableClara">
                <td colspan="5"><div align="center">
                  
                  <input name="button" type="button" class="botonForm" value="Ver Informe" onclick="seleccionar('informesPrp','aux_loc_id');seleccionar('informesPrp','aux_con_id');seleccionar('informesPrp','aux_tip_id');chequeaForm('informesPrp', '{$destino1}', '{$titulo}', '{$url}', '{$parametros}');"/>
                </div></td>
                </tr>
				
             
          </table>
		
		  </td>
		  </tr>
        
      </table>


</xsl:template>
</xsl:stylesheet> 