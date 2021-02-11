<?xml version="1.0" encoding="iso-8859-1"?>
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
<xsl:param name="bar_id" />
<xsl:param name="mod_tip" />

<xsl:template match="/">

  <!-- ARMO EL FORMULARIO DE ENVÍO -->
  
	
	
  <table width="100%" height="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
        <tr class="tableClara">
          <td width="150%" colspan="2">
            <h1 align="left">
	             <xsl:choose>
			        <xsl:when test="$mod_tip='add'">
			       		 Alta Barrio Privado	
			        </xsl:when>
			        <xsl:otherwise>Edicion Barrio Privado</xsl:otherwise>
			     </xsl:choose>
             </h1>
			</td>
          </tr>
		  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaEditUsuarios">
              <tr class="tableClara">
                <td><div align="right" id="bar_comp_priv_div">Tipo:</div></td>
                <td>
                	<select name="bar_comp_priv" class="inputForm" tabindex="1">
                	
		                	<xsl:for-each select="bar_priv/bar_comp_priv/option">
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
                <td><div align="right" id="pro_id_div"><strong>Provincias:*</strong></div></td>
	          <td><span id="div_pro_id"><select name="pro_id" onchange="act_select('loc_id,loc_desc','localidades','pro_id='+this.value,'loc_id','','php/funciones','loc_desc');" class="inputForm" tabindex="2">
	          <xsl:for-each select="bar_priv/provincias/option">
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
         	</td>
              </tr>
              <tr class="tableClara">
                <td width="20%" ><div align="right" id="loc_id_div"><strong>Localidades:*</strong></div></td>
		          <td width="30%" ><span id="div_loc_id"><select name="loc_id" onchange="" class="inputForm" tabindex="3">
		          <xsl:for-each select="bar_priv/localidades/option">
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
           		</td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_zona_div">Zona:</div></td>
                <td><input name="bar_zona" type="text" class="inputForm" tabindex="4" value="{bar_priv/bar_zona}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_dir_div">Domicilio:*</div></td>
                <td><input name="bar_dir" type="text" class="inputForm" tabindex="5" value="{bar_priv/bar_dir}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_denom_div">Denominación:*</div></td>
                <td><input name="bar_denom" type="text" class="inputForm" tabindex="6" value="{bar_priv/bar_denom}"/></td>
              </tr>
               <tr class="tableClara">
                <td><div align="right" id="bar_cont_div">Contacto:</div></td>
                <td><input name="bar_cont" type="text" class="inputForm" tabindex="7" value="{bar_priv/bar_cont}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_tel_div">Teléfono:*</div></td>
                <td><input name="bar_tel" type="text" class="inputForm" tabindex="8" value="{bar_priv/bar_tel}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_mail_div">Mail:</div></td>
                <td><input name="bar_mail" type="text" class="inputForm" tabindex="9" value="{bar_priv/bar_mail}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_sup_tot_div">Superficie Total:</div></td>
                <td><input name="bar_sup_tot" type="text" class="inputForm" tabindex="10" value="{bar_priv/bar_sup_tot}"/></td>
              </tr>
               <tr class="tableClara">
                <td><div align="right" id="bar_sup_lot_div">Superficie Lote:</div></td>
                <td><input name="bar_sup_lot" type="text" class="inputForm" tabindex="11" value="{bar_priv/bar_sup_lot}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_cant_tot_div">Cantidad de Lotes:</div></td>
                <td><input name="bar_cant_lot" type="text" class="inputForm" tabindex="12" value="{bar_priv/bar_cant_lot}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_desc_div">Descripción:</div></td>
                <td><textarea name="bar_desc" type="text" cols="50" rows="5" class="inputForm" tabindex="13"><xsl:value-of select="bar_priv/bar_desc"  disable-output-escaping="yes"/>&#160;</textarea></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_serv_div">Servicios:</div></td>
                <td><textarea name="bar_serv" type="text" cols="50" rows="5" class="inputForm" tabindex="14"><xsl:value-of select="bar_priv/bar_serv"  disable-output-escaping="yes"/>&#160;</textarea></td>
              </tr>
               <tr class="tableClara">
                <td><div align="right" id="bar_url_div">Pag. Web (URL):</div></td>
                <td><input name="bar_url" type="text" class="inputForm" tabindex="15" value="{bar_priv/bar_url}"/></td>
              </tr>
               <tr class="tableClara">
                <td><div align="right" id="bar_logo_div">Logo:</div></td>
                <td><input name="bar_logo" type="file" class="inputForm" tabindex="16"/></td>
              </tr>
              <!-- FOTOS -->
				<xsl:for-each select="bar_priv/imagenes/foto">
				<xsl:variable name="numero" select="position()"/>
		        <tr class="tableClara">
		          <td><div align="right">Foto <xsl:value-of select="$numero"/>:</div></td>
		          <td colspan='3'>
		            <xsl:if test="foto_enl!=''">
			        	  <a href="javascript:;" onclick="parent.ver_foto('{foto_enl}');" class="aNulo" title="Ver Foto [Foto{$numero}]"><img src="../interfaz/inmohost/images/iconos/20/panoramica.png" width="20" height="20" hspace="6" align="right" /></a>
			        </xsl:if>
		            <input type="file" name="fo{$numero}" class="inputForm" tabindex="{position()+16}"/>
		           
						</td>
		       	</tr>
		            </xsl:for-each>
		            
		       <tr class="tableClara">
                <td><input type="hidden" name="cant_fotos" value="10"/></td>
               
              </tr>
		            
		            
			<!-- FOTOS -->
              
          </table>
    	  <tr class="tableClara" height="32">
      <td colspan="2" ><div align="center">
        <input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="parent.Windows.close('bar_priv')" tabindex="27" />
  &nbsp;&nbsp;
		<input name="agregar" type="button" class="botonForm" id="agregar" onclick="edicionBarPriv()" value="Aceptar" tabindex="28" />
      </div></td>
    </tr>
  </table>


</xsl:template>
</xsl:stylesheet> 