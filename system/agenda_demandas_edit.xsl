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
<xsl:param name="dem_id" />

<xsl:template match="/">

  
	<input type="hidden" name="mod_tip" value="edit"/>
	<input type="hidden" name="otro" value="22"/>
	<input type="hidden" name="dem_id" value="{XMLTEXTO/datos/dem_id}"/>
  <table width="100%" height="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
        <tr class="tableClara">
          <td width="150%" colspan="3">
            <h1 align="left">Demandas</h1>
			<hr />			</td>
          </tr>
		<tr>
		  <td colspan="3">
		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaListarDemandas" >
              <tr class="tableClara">
                <td><div align="right">Provincia:</div></td>
                <td><span id="div_pro_id"><select name="pro_id" class="inputForm" id="inmo" tabindex="1" onchange="act_select('loc_id,loc_desc','localidades','pro_id='+this.value,'loc_id',' multiple size=3 ','php/funciones'.'loc_desc');" >
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
                <td><div align="right">Localidad:</div></td>
                <td><span id="div_loc_id">
                		<select size="3" name="loc_id[]" class="inputForm" id="select" tabindex="2" multiple="true">
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
                </span></td>
              </tr>
              
              
              <tr class="tableClara">
                <td><div align="right">Tipo de Cons.:</div></td>
                <td><select size="3" name="tip_id[]" class="inputForm" id="select2" tabindex="3" multiple="true">
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
                </select></td>
              </tr>
              
              <tr class="tableClara">
                <td><div align="right">Condici&oacute;n:</div></td>
                <td><select  size="3" name="con_id[]" class="inputForm" id="select3" tabindex="4" multiple="true">
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
                </select></td>
              </tr>
              
              <tr class="tableClara">
                <td><div align="right">Domicilio/Barrio:</div></td>
                <td><input name="dem_dom" type="text" class="inputForm" id="prp_id2" tabindex="5" style="width:80px" value="{XMLTEXTO/datos/dem_dom}"/></td>
              </tr>
              
              <!--tr class="tableClara">
                <td><div align="right">Barrio:</div></td>
                <td><input name="dem_barr" type="text" class="inputForm" id="prp_id3" tabindex="6" style="width:80px" value="{XMLTEXTO/datos/dem_barr}"/></td>
              </tr-->
               <tr class="tableClara">
                <td><div align="right">Rango de Precio:</div></td>
                <td><input name="dem_pre_min" type="text" class="inputForm" id="prp_id4" tabindex="7" style="width:90px"  value="{XMLTEXTO/datos/dem_pre_min}"/> 
                  y
                    <input name="dem_pre_max" type="text" class="inputForm" id="prp_id5" tabindex="8" style="width:90px"  value="{XMLTEXTO/datos/dem_pre_max}"/></td>
              </tr>
              
               <tr class="tableClara">
                <td><div align="right">Demanda:</div></td>
                <td><textarea cols="17" rows="2" name="dem_desc"><xsl:value-of select="XMLTEXTO/datos/dem_desc" disable-output-escaping="no"/></textarea> 
                </td>
              </tr>
               <tr class="tableClara">
		          <td width="150%" colspan="3">
		            <h1 align="left">Datos del demandante</h1>
					<hr />			
					</td>
		          </tr>
		          <tr class="tableClara">
	                <td><div align="right">Razon Social:</div></td>
	                <td> <input type="text" name="dem_raz" size="15" value="{XMLTEXTO/datos/dem_raz}"/> </td>
              	</tr>
              	 <tr class="tableClara">
	                <td><div align="right">Telefono:</div></td>
	                <td> <input type="text" name="dem_tel" size="15" value="{XMLTEXTO/datos/dem_tel}"/> </td>
              	</tr>
              	<tr class="tableClara">
	                <td><div align="right">E-Mail:</div></td>
	                <td> <input type="text" name="dem_mail" size="15" value="{XMLTEXTO/datos/dem_mail}"/> </td>
              	</tr>
				
              <tr class="tableClara">
                <td colspan="2"><div align="center">
                  <input name="listar2" type="button" class="botonForm" id="listar2" tabindex="9" value="Cerrar" onclick="window.close()" />
                  <input type="button" class="botonForm" tabindex="9" value="Modificar" onclick="valida_formulario('pro_id,2,Provincia,dem_raz,1,Razon Social,dem_tel,1,Telefono,dem_mail,3,E-Mail,aux_loc_id,7,Localidad,aux_tip_id,7,Tipo de Construccion,aux_con_id,7,Condicion','agendaDemandaEditar');"/>
                </div></td>
                </tr>
				
             
          </table>
		
		  </td>
		  </tr>
        
      </table>

</xsl:template>
</xsl:stylesheet>