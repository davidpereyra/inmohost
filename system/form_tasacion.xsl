<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/prp_ficha_edit.xml.php?usr_id=886&prp_id=5" -->
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
  </table>
</xsl:if>

<!--//MENUEXTRA-->

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
        <tr class="tableClara">
          <td colspan="4" align="left"><strong>Fecha: ____ / ____ / _____</strong></td>
        </tr>
      	<tr class="tr1">
          <td colspan="4"><h1>UBICACION</h1></td>
        </tr>
        <tr class="tableClara">
          <td><div align="right" id="pro_id_div"><strong>Provincia:</strong></div></td>
          <td><span id="div_pro_id">
          <input style="width:150px;" type="text" name="provincia" value="" class="inputForm" tabindex="4"/>
          </span>
            <span class="destacado2">*</span></td>
          <td width="20%" ><div align="right" id="loc_id_div"><strong>Localidad:</strong></div></td>
          <td width="30%" ><span id="div_loc_id">
          <input style="width:150px;" type="text" name="localidad" value="" class="inputForm" tabindex="4"/>
          </span>
            <span class="destacado2">*</span></td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Barrio:</div></td>
          <td><input style="width:150px;" type="text" name="barrio" value="" class="inputForm" tabindex="4"/></td>
          <td><div align="right" id="prp_dom_div"><strong>Domicilio:</strong></div></td>
          <td><input style="width:150px;" type="text" name="domicilio" value="" class="inputForm" tabindex="4"/>
            <span class="destacado2">*</span></td>
        </tr>
        <input type="hidden" name="min" value="" />
        <input type="hidden" name="max" value="" />
        <input type="hidden" name="usuario" value="" />
        <tr class="tr1">
          <td colspan="4"><h1>DATOS DE LA PROPIEDAD</h1></td>
        </tr>
        <tr class="tableClara">
          <td><div align="right" id="tip_id_div"><strong>Barrio Privado / Complejo:</strong></div></td>
          <td><input style="width:150px;" type="text" name="barrio_privado" value="" class="inputForm" tabindex="4"/>
            </td>
          <td><div align="right" id="con_id_div"><strong>Inmueble VIP:</strong></div></td>
          <td>&#160;&#160;&#160;SI&#160;&#160;&#160;NO</td>
        </tr>
        <tr class="tableClara">
          <td><div align="right" id="tip_id_div"><strong>Tipo Construcción:</strong></div></td>
          <td><input style="width:150px;" type="text" name="tipo_cons" value="" class="inputForm" tabindex="4"/>
            <span class="destacado2">*</span>          </td>
          <td><div align="right" id="con_id_div"><strong>Condición:</strong></div></td>
          <td ><input style="width:150px;" type="text" name="tipo_con" value="" class="inputForm" tabindex="4"/>
            <span class="destacado2">*</span>          </td>
        </tr>
        <tr class="tableClara">
          <td><div align="right" id="prp_pre_div"><strong>Valor Alta ($):</strong></div></td>
          <td><input type="text" style="width:150px;" name="valor" value="" class="inputForm" tabindex="9"/>
            <span class="destacado2"></span>          </td>
          <td><div align="right">Valor Alta (U$S):</div></td>
          <td><input type="text" style="width:150px;" name="valor_dolares" value="" class="inputForm" tabindex="10"/>          </td>
        </tr>
        <tr class="tr3">
          <td><div align="right">Valor Tasación:</div></td>
          <td><input type="text" style="width:150px;" name="valor_tasacion" value="" class="inputForm" tabindex="11"/>          </td>
          <td><div align="right">Valor Propietario:</div></td>
          <td><input type="text" style="width:150px;" name="valor_propietario" value="" class="inputForm" tabindex="12"/>          </td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Descripción:</div></td>
          <td colspan="3"><textarea name="prp_desc" rows="5" tabindex="14" style="width:490px;" class="inputForm"><xsl:value-of select="XMLTEXTO/propiedad/prp_desc" disable-output-escaping="yes"/></textarea>          </td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Nota:</div></td>
          <td colspan="3"><textarea name="prp_nota" rows="1" tabindex="15" style="width:490px;" class="inputForm"><xsl:value-of select="XMLTEXTO/propiedad/prp_nota" disable-output-escaping="yes" /></textarea>          </td>
        </tr>

	      <tr class="tr1">
		        <td colspan="4" ><h1>SERVICIOS</h1></td>
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
                      <xsl:value-of select="serv_desc"/>
					<xsl:choose>
							<xsl:when test="serv_type='text'">:&#160;
	              					<input type='text' name='{serv_name}' value='' style="width:150px;"  class="inputForm" tabindex="{position()+15}"/>	
                      		</xsl:when>
              				<xsl:when test="serv_type='select'">:&#160;
	              					<input type='text' name='{serv_name}' value='' style="width:150px;"  class="inputForm" tabindex="{position()+15}"/>	
                      		</xsl:when>
              				<xsl:when test="serv_type='checkbox'">:&#160;
	              					<input type='text' name='{serv_name}' value='' style="width:150px;"  class="inputForm" tabindex="{position()+15}"/>	
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
			<div style="height:25px; border-bottom:#CCCCCC 1px solid; padding-left:10px; padding-top:3px;" align="right" >
                      <xsl:value-of select="serv_desc"/>:&#160;
						<xsl:choose>
							<xsl:when test="serv_type='text'">
									<input type='text' name='{serv_name}' value='' style="width:150px;"  class="inputForm" tabindex="{position()+15}"/>	                      		
							</xsl:when>
              				<xsl:when test="serv_type='select'">
	              					<input type='text' name='{serv_name}' value='' style="width:150px;"  class="inputForm" tabindex="{position()+15}"/>	
                      		</xsl:when>
              				<xsl:when test="serv_type='checkbox'">
									<input type='text' name='{serv_name}' value='' style="width:150px;"  class="inputForm" tabindex="{position()+15}"/>	                      		
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
          <td colspan="3"><textarea name="prp_servicios" rows="1" tabindex="35" class="inputForm" style="width:490px;" ><xsl:value-of select="XMLTEXTO/propiedad/prp_servicios" disable-output-escaping="yes"/></textarea></td>
        </tr>
        <tr class="tr1">
          <td colspan="4"><h1>REFERENCIAS</h1></td>
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
          <td class="tr3"><div align="right">N° de Llave:</div></td>
          <td class="tr3"><input name="prp_llave" type="text" class="inputForm" style="width:120px;" value="{XMLTEXTO/propiedad/prp_llave}" tabindex="43" />          </td>
        </tr>
        <tr class="tr3">
          <td><div align="right">N° Tasación:</div></td>
          <td><input name="prp_tas" type="text" class="inputForm"  style="width:120px;" value="{XMLTEXTO/propiedad/prp_tas}" tabindex="44" />          </td>
          <td><div align="right">Matrícula:</div></td>
          <td><input name="prp_insc_dom" type="text" class="inputForm" style="width:120px;" value="{XMLTEXTO/propiedad/prp_insc_dom}" tabindex="45" />      
         </td>
        </tr>
        <tr class="tableClara">
          <td><div align="right">Cartel:</div></td>
          <td>&#160;&#160;&#160;SI&#160;&#160;&#160;NO</td>
          <td class="tr3"><div align="right">Autorizada:</div></td>
          <td>&#160;&#160;&#160;SI&#160;&#160;&#160;NO</td>
        </tr>
        <tr class="tr1">
          <td colspan="4" ><h1>DATOS DEL PROPIETARIO</h1></td>
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
          <td colspan="3"><textarea name="prop_nota" rows="1" tabindex="59" class="inputForm" style="width:490px;" ><xsl:value-of select="XMLTEXTO/propiedad/prop_nota" disable-output-escaping="yes"/></textarea>          </td>
        </tr>
      </table>
      <table width="100%">
        <tr class="tableClara">
          <td width="50%"><div align="center">
			<input name="cancelar" type="reset" class="botonForm" value="Cancelar" tabindex="58" onclick="parent.Windows.close('listadoPropiedades');" />            
            </div></td>
          <td width="50%"><div align="center">
          	<input value="Imprimir" type="button" class="botonForm" name="imprimirBoton" onclick="window.print();"/>
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