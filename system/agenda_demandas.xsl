<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/send_mail.xml.php?&chequea=dom,1,prp_id,1&tipoForm=buscar&orden=1&usr_id=886&mod_tip=edit&mod_edit=1&usr_id=886&usr_id=908&tip_id=0&con_id=0&pes_ent=&pes_y=&dol_ent=&dol_y=&dom=&prp_inmoID=908&prp_id=1" -->
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

<xsl:param name="dem_id" />
<xsl:param name="mod_tip" />
<xsl:param name="fileABM" />
<xsl:param name="demandas_mensajes" />
<xsl:template match="/">

  <!-- ARMO EL FORMULARIO DE ENVÍO -->
  <form id="agendaDemandaAgregar" name="agendaDemandaAgregar" method="post" style="height:100%" action="{$demandas_mensajes}">
	<input type="hidden" name="mod_tip" value="{$mod_tip}"/>
	<input type="hidden" name="dem_id" value="{XMLTEXTO/datos/dem_id}"/>
	<input type="hidden" name="otro" value="22"/>
  <table width="100%" height="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
        <tr class="tableClara">
          <td width="150%" colspan="5">
            <h1 align="left">Demandas</h1>
			<hr />			</td>
          </tr>
		<tr>
		  <td colspan="5">
		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableClara" id="tablaListarDemandas" >
              <tr class="tableClara">
                <td><div align="right" id="pro_id_div">Provincia:</div></td>
                <td><span id="div_pro_id"><select name="pro_id" class="inputForm" id="pro_id" tabindex="1" onchange="act_select('loc_id,loc_desc','localidades','pro_id='+this.value,'loc_id',' multiple size=3 ','php/funciones','loc_desc');" >
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
                </select></span></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="aux_loc_id_div">Localidad:</div></td>
                <td ><span id="div_loc_id">
                		<select size="3" name="loc_id[]" class="inputForm" id="loc_id" tabindex="2" multiple="true">
							<xsl:for-each select="XMLTEXTO/datos/localidades/option">
									 <option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
					      	</xsl:for-each>
               			</select>
               		</span>	
                </td>
                <td>
                <input name="quitar" type="button" class="botonForm" id="quitar" tabindex="3" value=" &#60;&#60; Quitar  &#160;&#160; " onclick="quitar_item_select('aux_loc_id','agendaDemandaAgregar');" />&#160;
                <input name="agregar" type="button" class="botonForm" id="agregar" tabindex="4" value="Agregar &#62;&#62;" onclick="agregar_item_select('loc_id','aux_loc_id','agendaDemandaAgregar');" />
                </td>
                <td>
                		<select size="3" name="aux_loc_id[]" class="inputForm" id="aux_loc_id" tabindex="5" multiple="true">
							<xsl:for-each select="XMLTEXTO/datos/localidades/option">
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
                	<select size="3" name="tip_id[]" class="inputForm" id="tip_id" tabindex="6" multiple="true">
						<xsl:for-each select="XMLTEXTO/datos/tipoCons/option">
							<option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
						</xsl:for-each>							
                	</select></span></td>
                <td>
                <input name="quitar" type="button" class="botonForm" id="quitar" tabindex="7" value=" &#60;&#60; Quitar  &#160;&#160; " onclick="quitar_item_select('aux_tip_id','agendaDemandaAgregar');" />&#160;
                <input name="agregar" type="button" class="botonForm" id="agregar" tabindex="8" value="Agregar &#62;&#62;" onclick="agregar_item_select('tip_id','aux_tip_id','agendaDemandaAgregar');" />
                </td>
                <td>
                	<select  multiple="true" size="3" name="aux_tip_id[]" class="inputForm" id="aux_tip_id" tabindex="9" >
						<xsl:for-each select="XMLTEXTO/datos/tipoCons/option">
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
                	<select  size="3" name="con_id[]" class="inputForm" id="con_id" tabindex="10">
						<xsl:for-each select="XMLTEXTO/datos/tipoCond/option">
							<option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
			          	</xsl:for-each>
                	</select></span>
                </td>
              	<td>
                <input name="quitar" type="button" class="botonForm" id="quitar" tabindex="11" value=" &#60;&#60; Quitar  &#160;&#160; " onclick="quitar_item_select('aux_con_id','agendaDemandaAgregar');" />&#160;
                <input name="agregar" type="button" class="botonForm" id="agregar" tabindex="12" value="Agregar &#62;&#62;" onclick="agregar_item_select('con_id','aux_con_id','agendaDemandaAgregar');" />
              	</td>  
              	<td>
              		<select  size="3" name="aux_con_id[]" class="inputForm" id="aux_con_id" tabindex="13">
						<xsl:for-each select="XMLTEXTO/datos/tipoCond/option">
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
                <td><div align="right">Domicilio/Barrio:</div></td>
                <td><span id="div_dem_nom"><input name="dem_dom" type="text" class="inputForm" id="prp_id2" tabindex="14" style="width:80px" value="{XMLTEXTO/datos/dem_dom}" /></span></td>
              </tr>
              
              <!--tr class="tableClara">
                <td><div align="right">Barrio:</div></td>
                <td><span id="div_dem_barr"><input name="dem_barr" type="text" class="inputForm" id="prp_id3" tabindex="15" style="width:80px" value="{XMLTEXTO/datos/dem_barr}"/></span></td>
              </tr-->
               <tr class="tableClara">
                <td><div align="right">Rango de Precio:</div></td>
                <td><span id="div_dem_pre_min"><input name="dem_pre_min" type="text" class="inputForm" id="prp_id4" tabindex="15" style="width:50px" value="{XMLTEXTO/datos/dem_pre_min}"/></span> 
                  y
                    <span id="div_dem_pre_max"><input name="dem_pre_max" type="text" class="inputForm" id="prp_id5" tabindex="16" style="width:50px" value="{XMLTEXTO/datos/dem_pre_max}"/></span></td>
              </tr>
              
               <tr class="tableClara">
                <td><div align="right">Demanda:</div></td>
                <td><textarea cols="17" rows="2" class="inputForm" name="dem_desc" tabindex="17">&nbsp; <xsl:value-of select="XMLTEXTO/datos/dem_desc" disable-output-escaping="yes"/></textarea> 
                </td>
              </tr>
               <tr class="tableClara">
		          <td width="150%" colspan="5">
		            <h1 align="left">Datos del demandante</h1>
					<hr />			
					</td>
		          </tr>
		          <tr class="tableClara">
	                <td><div id="dem_raz_div" align="right">Nombre:</div></td>
	                <td><input type="text" name="dem_raz" size="15" value="{XMLTEXTO/datos/dem_raz}" tabindex="18"/></td>
              	</tr>
              	 <tr class="tableClara">
	                <td><div id="dem_tel_div" align="right">Telefono:</div></td>
	                <td><input type="text" name="dem_tel" size="15" value="{XMLTEXTO/datos/dem_tel}" tabindex="19"/></td>
              	</tr>
              	<tr class="tableClara">
	                <td><div id="dem_mail_div" align="right">E-Mail:</div></td>
	                <td><input type="text" name="dem_mail" size="15" value="{XMLTEXTO/datos/dem_mail}" tabindex="20"/></td>
              	</tr>
				
              <tr class="tableClara">
                <td colspan="5"><div align="center">
                  <input name="listar2" type="button" class="botonForm" id="listar2" tabindex="21" value="Cerrar" onclick="parent.Windows.close('alt_dem')" />
                  &#160;&#160;
                  <input type="button" class="botonForm" tabindex="22" value="Aceptar" onclick="valida_formulario('pro_id,2,Provincia,dem_raz,1,Razon Social,dem_tel,1,Telefono,dem_mail,3,E-Mail,aux_loc_id,7,Localidad,aux_tip_id,7,Tipo de Construccion,aux_con_id,7,Condicion','agendaDemandaAgregar');"/>
                  
                  
                </div></td>
                </tr>
				
             
          </table>
		
		  </td>
		  </tr>
        
      </table>
</form>

</xsl:template>
</xsl:stylesheet> 