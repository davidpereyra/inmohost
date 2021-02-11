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
<xsl:param name="novedades_mensajes" />
<xsl:template match="/">

  <!-- ARMO EL FORMULARIO DE ENVÍO -->
  <form id="agendaNovedadAgregar" name="agendaNovedadAgregar" method="post" style="height:100%" action="{$novedades_mensajes}">
	<input type="hidden" name="mod_tip" value="add"/>
	<input type="hidden" name="otro" value="22"/>
  <table width="100%" height="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
        <tr class="tableClara">
          <td width="150%" colspan="2">
            <h1 align="left">Novedades</h1>
			<hr />			</td>
          </tr>
		 <tr class="tableClara" >
	       <td width="20%" align="center"><div id="nov_desc_div" align="right">Novedad:</div></td>


     	   <td width="80%">
		<textarea name="nov_desc" rows="3" cols="25" tabindex="4"><xsl:value-of select="XMLTEXTO/datos/nov_desc" disable-output-escaping="yes"/>&#160;</textarea></td>
	    </tr>
	     <tr class="tableClara" >
    	  <td><div align="right" id="emp_desde_div">De:</div></td>
    			  <td>
    			  	<select name="emp_desde" class="inputForm" id="emp_desde">
					  <xsl:for-each select="XMLTEXTO/datos/empleados_d/option">
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
	      <tr class="tableClara" >
    	  <td><div align="right" id="emp_hacia_div">Para:</div></td>
    			  <td>
    			  	<select name="emp_hacia[]" multiple="multiple" class="inputForm" id="emp_hacia" size="8">
					  <xsl:for-each select="XMLTEXTO/datos/empleados_p/option">
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
    	  <tr class="tableClara" height="6"><td colspan="2">&nbsp;</td></tr>
    	  <tr class="tableClara" height="32">
      <td colspan="2" ><div align="center">
        <input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="parent.Windows.close('alt_nov')" tabindex="8" />
  &#160;&#160;
		<input name="agregar" type="button" class="botonForm" id="agregar" onclick="valida_formulario('nov_desc,1,Novedad,emp_desde,2,De,emp_hacia,6,Para','agendaNovedadAgregar');" value="Enviar" tabindex="7" />
      </div></td>
    </tr>
  </table>
</form>

</xsl:template>
</xsl:stylesheet> 