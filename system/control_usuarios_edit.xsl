<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/control_medios_edit.xml.php?rec_id=10" -->
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
<xsl:template match="/">

	<input type="hidden" name="emp_id" value="{usuario/emp_id}" />
	<input type="hidden" name="mod_tip" value="edit" />
<table width="100%" height="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="tableOscura">
    <tr class="tableClara">
          <td width="150%" colspan="2">
            <h1 align="left">Editar Usuarios</h1>
					</td>
          </tr>
		  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaEditUsuarios">
             
              <tr class="tableClara">
                <td colspan="2"><h2>
                
                &#160;&#160;&#160;&#160;&#160;&#160;
                &#160;&#160;&#160;&#160;&#160;&#160;
                
                Empleado</h2></td>
                </tr>
              <tr class="tableClara">
                <td><div align="right" id="nombre_div">Nombre:</div></td>
                <td><input name="nombre" type="text" class="inputForm" id="usr_nom" style="width:120px" tabindex="15" value="{usuario/nombre}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="apellido_div">Apellido:</div></td>
                <td><input name="apellido" type="text" class="inputForm" id="usr_ape" style="width:120px" tabindex="16" value="{usuario/apellido}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="domicilio_div">Domicilio:</div></td>
                <td><input name="domicilio" type="text" class="inputForm" id="usr_dom" style="width:120px" tabindex="17" value="{usuario/domicilio}"/></td>
              </tr>
            
               <tr class="tableClara">
                <td><div align="right" id="telefono_div">Telefono Particular:</div></td>
                <td><input name="telefono" type="text" class="inputForm" id="usr_tel" style="width:60px" tabindex="18" value="{usuario/telefono}"/></td>
              </tr>
              
              <tr class="tableClara">
                <td><div align="right" id="tel_inmo_div">Telefono Inmobiliaria:</div></td>
                <td><input name="tel_inmo" type="text" class="inputForm" id="tel_inmo" style="width:60px" tabindex="19" value="{usuario/tel_inmo}"/></td>
              </tr>
               <tr class="tableClara">
                <td><div align="right" id="sec_id_div">Sector de Trabajo:</div></td>
                <td>
                <select name="sec_id" class="inputForm" tabindex="20">
                 <xsl:for-each select="usuario/sec_id/option">
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
                <td><div align="right" id="sexo_div">Sexo:</div></td>
                <td>
                	<select name="sexo" class="inputForm" tabindex="21">
	                	<xsl:for-each select="usuario/sexo/option">
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
                <td><div align="right" id="mostrar_div">Mostrar</div></td>
                <td>
                	<select name="mostrar" class="inputForm" tabindex="22">
	                	<xsl:for-each select="usuario/mostrar/option">
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
                <td><div align="right" id="email_div">e-mail:</div></td>
                <td><input name="email" type="text" class="inputForm" id="usr_mail" style="width:160px" tabindex="23" value="{usuario/email}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="fo_id_div">Foto:</div></td>
                <td><input name="fo_id" type="file" class="inputForm" id="fo_id" tabindex="24" /></td>
              </tr>
               <tr class="tableClara">
                <td colspan="2"><h2>
                &#160;&#160;&#160;&#160;&#160;&#160;
                &#160;&#160;&#160;&#160;&#160;&#160;
               
                Usuario</h2></td>
                </tr>
              <tr class="tableClara">
                <td><div align="right" id="usr_login_div">Login:</div></td>
                <td><input name="usr_login" type="text" class="inputForm" id="usr_login" style="width:70px" tabindex="25" value="{usuario/usr_login}"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="usr_pass_div">Contraseña:</div></td>
                <td><input name="usr_pass" type="password" class="inputForm" id="usr_pass" style="width:70px" tabindex="26"  /></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="usr_pass2_div">Repita la Contraseña:</div></td>
                <td><input name="usr_pass2" type="password" class="inputForm" id="usr_pass2" style="width:70px" tabindex="27" /></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right">Tiempo de sesion:</div></td>
                <td>
                	<select name="hh_s" class="inputForm" tabindex="28">
                    	<xsl:for-each select="usuario/hora/option">
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
                  <select name="mm_s" class="inputForm" tabindex="29">
                      <xsl:for-each select="usuario/minuto/option">
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
                <td><div align="right" id="priv_id">Privilegios:</div></td>
                <td>
				<select name="priv_id" class="inputForm" tabindex="30">
			 		<xsl:for-each select="usuario/priv_id/option">
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
          </table>
    	  <tr class="tableClara" height="32">
      <td colspan="2" ><div align="center">
        <input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="parent.Windows.close('edicionSimple')" tabindex="31" />
  &#160;&#160;
		<input name="agregar" type="button" class="botonForm" id="agregar" onclick="modificar_usr()" value="Modificar" tabindex="32" />
      </div></td>
    </tr>
  </table>
</xsl:template>
</xsl:stylesheet>