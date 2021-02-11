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

<xsl:template match="/">

  <!-- ARMO EL FORMULARIO DE ENVÍO -->
  
	<input type="hidden" name="mod_tip" value="add"/>
	<input type="hidden" name="otro" value="22"/>
  <table width="100%" height="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
        <tr class="tableClara">
          <td width="150%" colspan="2">
            <h1 align="left">Alta Usuarios</h1>
					</td>
          </tr>
		  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaEditUsuarios">
		 	 <tr>
                <td colspan="2" class="tableClara"><h2>
                
                &#160;&#160;&#160;&#160;&#160;&#160;
                &#160;&#160;&#160;&#160;&#160;&#160;
                
                Empleado</h2></td>
                </tr>
              <tr class="tableClara">
                <td><div align="right" id="nombre_div">Nombre:</div></td>
                <td><input name="nombre" type="text" class="inputForm" id="usr_nom" style="width:60px" tabindex="9" /></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="apellido_div">Apellido:</div></td>
                <td><input name="apellido" type="text" class="inputForm" id="usr_ape" style="width:60px" tabindex="10"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="domicilio_div">Domicilio:</div></td>
                <td><input name="domicilio" type="text" class="inputForm" id="usr_dom" style="width:60px" tabindex="11"/></td>
              </tr>
                <tr class="tableClara">
                <td><div align="right" id="telefono_div">Telefono Particular:</div></td>
                <td><input name="telefono" type="text" class="inputForm" id="usr_tel" style="width:60px" tabindex="12" /></td>
              </tr>
              
              <tr class="tableClara">
                <td><div align="right" id="tel_inmo_div">Telefono Inmobiliaria:</div></td>
                <td><input name="tel_inmo" type="text" class="inputForm" id="tel_inmo" style="width:60px" tabindex="13" /></td>
              </tr>
               <tr class="tableClara">
                <td><div align="right" id="sec_id_div">Sector de Trabajo:</div></td>
                <td>
                <select name="sec_id" class="inputForm" tabindex="14">
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
                	<select name="sexo" class="inputForm" tabindex="15">
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
                	<select name="mostrar" class="inputForm" tabindex="16">
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
                <td><input name="email" type="text" class="inputForm" id="usr_mail" style="width:60px" tabindex="17" /></td>
              </tr>
               <tr class="tableClara">
                <td><div align="right" id="fo_id_div">Foto:</div></td>
                <td><input name="fo_id" type="file" class="inputForm" id="fo_id" tabindex="18" /></td>
              </tr>
              <tr>
                <td colspan="2" class="tableClara"><h2>
                &#160;&#160;&#160;&#160;&#160;&#160;
                &#160;&#160;&#160;&#160;&#160;&#160;
               
                Usuario</h2></td>
                </tr>
              <tr class="tableClara">
                <td><div align="right" id="usr_login_div">Login:</div></td>
                <td><input name="usr_login" type="text" class="inputForm" id="usr_login" style="width:60px" tabindex="19"/></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="usr_pass_div">Contraseña:</div></td>
                <td><input name="usr_pass" type="password" class="inputForm" id="usr_pass" style="width:60px" tabindex="20"  /></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="usr_pass2_div">Repita la Contraseña:</div></td>
                <td><input name="usr_pass2" type="password" class="inputForm" id="usr_pass2" style="width:60px" tabindex="21" /></td>
              </tr>
              
              <tr class="tableClara">
                <td><div align="right">Tiempo de sesion:</div></td>
                <td><select name="hh_s" class="inputForm" tabindex="22">
                      <option value="0">hh</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                    </select>
                  <select name="mm_s" class="inputForm" tabindex="23">
                      <option value="0">mm</option>
                      <option value="0">0</option>
                      <option value="5">5</option>
                      <option value="10">10</option>
                      <option value="15">15</option>
                      <option value="20">20</option>
                      <option value="25">25</option>
                      <option value="30">30</option>
                      <option value="35">35</option>
                      <option value="40">40</option>
                      <option value="45">45</option>
                      <option value="50">50</option>
                      <option value="55">55</option>
                    </select>
				</td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="priv_id">Privilegios:</div></td>
                <td>
				<select name="priv_id" class="inputForm" tabindex="24">
			 		<option value="0">Privilegios</option>
					<option value="1">admin</option>
					<option value="2">usuario</option>
				</select>
				</td>
              </tr>
          </table>
    	  <tr class="tableClara" height="32">
      <td colspan="2" ><div align="center">
        <input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="parent.Windows.close('edicionSimple')" tabindex="25" />
  &#160;&#160;
		<input name="agregar" type="button" class="botonForm" id="agregar" onclick="agregar_usr()" value="Agregar" tabindex="26" />
      </div></td>
    </tr>
  </table>
</xsl:template>
</xsl:stylesheet> 