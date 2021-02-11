<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/prp_medios.xml.php" -->
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
<xsl:param name="fileCalendario" />
<xsl:param name="prp_usr" />
<xsl:param name="acc_internet" />

<xsl:param name="FILE_XML_PRP_PUBLICACIONES_RESUMEN_LISTADO" />
<xsl:param name="FILE_XML_PRP_PUBLICACIONES_RESUMEN_HEAD" />
<xsl:param name="FILE_PHP_GENERICO_LISTADOS" />

<xsl:template match="/">
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr >
    <td width="50%"><a>
      <h1 onclick="window.parent.window.display('menuPrincipal');"><img src="../interfaz/inmohost/images/iconos/20/buscar.png" alt="Reformular Busqueda" width="20" height="20" hspace="5" border="0" align="absmiddle" />Reformular Busqueda</h1>
    </a></td>
    <td width="50%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><form id="formPrpMedios" name="formPrpMedios" method="post" action="env_medios.php">
     <input name="tempMedios" type="hidden" id="tempMedios" value="" />
     <input name="tempPosition" type="hidden" id="tempPosition" value="" />
	 <input name="fechasSeleccionadas" type="hidden" id="fechasSeleccionadas" value="" />
      <table width="99%" border="0" align="center" cellpadding="1" cellspacing="1" class="tableOscura">
        <tr class="tableClara">
          <td width="5%"><h1 align="center">-</h1></td>
          <td width="5%"><div align="center">
              <h1>ID</h1>
          </div></td>
          <td width="10%"><div align="center">
              <h1>Condición</h1>
          </div></td>
          <td width="10%"><div align="center">
              <h1>Tipo</h1>
          </div></td>
          <td width="35%"><div align="center">
              <h1>Texto a publicar </h1>
          </div></td>
           <td width="10%"><div align="center">
              <h1>Foto </h1>
          </div></td>
          <td width="25%">
          	<div align="center">
              <h1>Fechas</h1>
         	</div>          </td>
             </tr>
        <xsl:for-each select="XML/propiedades/columna">
		<xsl:variable name="ID" select="prp_id" />
		<xsl:variable name="POS" select="position()" />
          <tr class="tableClara" id="publi_{position()}">
            <td><div align="center">
            	
              <input name='check_{position()}' type='checkbox' id="check_{position()}" onclick="changeStyle('publi_{position()}', 'tableClara', 'botonForm');" value='1' />
              <input name="prp_id_{position()}" type="hidden" id="prp_id_{position()}" value="{prp_id}" />
              <br/>[<a href="javascript:;" onclick="parent.ventana('generico_listado','&amp;fileXMLListado={$FILE_XML_PRP_PUBLICACIONES_RESUMEN_LISTADO}&amp;fileXMLHead={$FILE_XML_PRP_PUBLICACIONES_RESUMEN_HEAD}&amp;prp_id={prp_id}', '{$FILE_PHP_GENERICO_LISTADOS}', 'Historial de envios');">historial</a>]
            </div></td>
            <td><div align="center"><xsl:value-of select="prp_id" disable-output-escaping="yes"/></div></td>
            <td><div align="center"><xsl:value-of select="prp_tip" disable-output-escaping="yes"/></div></td>
            <td><div align="center"><xsl:value-of select="prp_con" disable-output-escaping="yes"/></div></td>
            <td><div align="left">
              <textarea name="prp_pub_{position()}" rows="4" class="inputForm" id="prp_pub{position()}" style="width:300px;" tabindex="" onkeypress="contar_palabras('prp_pub{position()}');" onfocus="$('div_palabras_prp_pub{position()}').show(); contar_palabras('prp_pub{position()}');"><xsl:value-of select="prp_txtmedios" disable-output-escaping="yes"/></textarea>
			</div>
			<div align="center" id="div_palabras_prp_pub{position()}" style="display:none">palabras escritas:&nbsp;<input name="palabras_prp_pub{position()}" type="text" id="palabras_prp_pub{position()}" value="0" class="inputFecha" style="width:23px" size="3" maxlength="3" readonly="" /></div>          
 			<td><div align="center"><img src="php/funciones/foto.php?foto=../../../fotos/{fo_enl}&amp;tam=80"/> </div></td>
			</td>
            <td valign="top"><div align="center">
              <xsl:for-each select="../../medios/columna">
                <table width="99%" border="0" align="center" cellpadding="2" cellspacing="1" class="tableOscura" id="alta_{med_id}_{$ID}" style="margin:1px">
                  <tr class="tableClara">
                    <td width="80%"><h2>
                    					<xsl:value-of select="med_name" disable-output-escaping="yes"/>
                    					<xsl:variable name="med_id" select="med_id"/>
                    					</h2>
                    					<input name="tempPosition_{$POS}" type="hidden" id="tempPosition_{$POS}"/>
                    					<input name="fecha_{$POS}_{position()}" type="hidden" id="fecha_{$POS}_{position()}" />
                    					<input type="hidden" name="dia_id_{$POS}_{position()}" value="{med_id}"/>                    					</td>
                            <td width="20%"><h1 align="center" onclick="mostrar_cal(event,'{$fileCalendario}','{$POS}',{med_id},{$ID},'check_{$POS}',{position()},{$acc_internet} )"><a title="Ingresar fecha" ><img src="../interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" hspace="5" align="absmiddle" /></a></h1></td>
                          </tr>
                </table>
              </xsl:for-each>
            </div>            </td>
            </tr>
        </xsl:for-each>
            </table>
            <div style='display:none;' id='div_comp'>
            		Comprobando conexion. Aguarde un momento por favor...
            </div>

            <div align="center"><br />        
              <input name="Submit" type="button" class="botonForm" value="Publicar" onclick="document.getElementById('div_comp').style.display='';document.formPrpMedios.submit();"/>
              <input name="count_pub" type="hidden" id="count_pub" value="{count(XML/propiedades/columna)}"/>
            </div>
    </form>
    </td>
  </tr>
</table>
</xsl:template>
</xsl:stylesheet>