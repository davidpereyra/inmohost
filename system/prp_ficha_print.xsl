<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/prp_ficha.xml.php?&chequea=dom,1,prp_id,1&tipoForm=buscar&orden=1&usr_id=886&mod_tip=edit&mod_edit=1&usr_id=886&usr_id=908&tip_id=0&con_id=0&pes_ent=&pes_y=&dol_ent=&dol_y=&dom=&prp_inmoID=908&prp_id=1" -->
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
  <!-- EN EL CASO QUE SI EXISTA LA PROPIEDAD -->


<xsl:if test="$mod_tip!='add'">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr class="tr1">
      <td width="30%"><div align="center">
        <h2><xsl:value-of select="XMLTEXTO/propiedad/usr_raz"/></h2>
      </div></td>
      <td width="35%"><div align="center">
        <h3>Publicación: <xsl:value-of select="XMLTEXTO/propiedad/prp_alta"/></h3>
      </div></td>
      <td width="35%">
        <h3 align="center">Modificación: <xsl:value-of select="XMLTEXTO/propiedad/prp_mod"/></h3>      </td>
    </tr>
  </table>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" style="margin-bottom:2px;">
    <tr class="tableClara">
<xsl:if test="XMLTEXTO/propiedad/editCitas = '1'">
      <td width="20%">
	    <p align="center"><a href="javascript:parent.ventana('agenda_citas', '&amp;prp_id={$prp_id}&amp;usr_id={$usr_id}&amp;mod_edit=0', '{$fileCita}', 'Ver Citas');"  class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/citas.png" width="32" height="32" /><br />
	      Ver citas</a> </p>	    </td>
</xsl:if>
<xsl:if test="XMLTEXTO/propiedad/editPro = '1'">
      <td width="20%">
	    <div align="center"><a href="javascript:;" onclick="position(event); toolTip('{$filePropietario}',this);"  class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/propietario.png" width="32" height="32" /><br />
  &nbsp;Propietario</a> </div></td>
</xsl:if>
<xsl:if test="XMLTEXTO/propiedad/editImprimir = '1'">
      <td width="20%">
	    <div align="center"><a href="javascript:parent.dialogos('alerta', '&amp;prp_id={$prp_id}&amp;usr_id={$usr_id}&amp;mod_edit=1', '{$fileExportar}', 'Exportar');" title="Imprimir" class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/imprimir.png" width="32" height="32" /><br />
  &nbsp;Imprimir</a> </div></td>
</xsl:if>
	
<xsl:if test="XMLTEXTO/propiedad/editFicha = '1'">
      <td width="20%">
	    <div align="center"><a href="#" title="Video" class="aNulo" ><img src="../interfaz/inmohost/images/iconos/32/ficha.png" width="32" height="32" /><br />
	      Video</a></div></td>
</xsl:if>
<xsl:if test="XMLTEXTO/propiedad/editEstado = '1'">
      <td width="20%">
	    <div align="center"><a href="#" title="Panorámica"  class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/panoramica.png" width="32" height="32" /><br />
  &nbsp;Panor&aacute;mica</a> </div></td>
</xsl:if>
    </tr>
  </table>
</xsl:if>

  <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
    
    <tr>
       <td valign="top" >
        <table width="100%" border="0" cellspacing="1" cellpadding="3" class="tableOscura">
          <tr class="tableClara">
            <td><strong>ID:</strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_id"/></td>
          </tr>
          <tr class="tableClara">
            <td width="50%">
              <strong>Inmueble:</strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/tip_desc"/>		        </td>
                  <td width="50%"><strong>Cartel:</strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_cartel"/></td>
                </tr>
          <tr class="tableClara">
            <td><strong>Condición:</strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/con_desc"/></td>
                  <td><strong>Llave:</strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_cartel"/></td>
                </tr>
          
          <tr class="tableClara">
            <td colspan="2"><strong>Domicilio:</strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_dom"/> - <xsl:value-of select="XMLTEXTO/propiedad/prp_bar"/></td>
                </tr>
          <tr class="tableClara">
            <td><strong>Localidad:</strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/loc_desc"/></td>
                  <td><strong>Provincia:</strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/pro_desc"/></td>
                </tr>
          
          <tr class="tableClara">
            <td colspan="2"><xsl:value-of select="XMLTEXTO/propiedad/prp_desc" disable-output-escaping="yes"/></td>
                </tr>
          
          <xsl:if test="prp_servicios != ''">
            <tr class="tableClara">
              <td colspan="2"><strong>Servicios:</strong>&nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_servicios" disable-output-escaping="yes"/>                </td>
                </tr>
            </xsl:if>
          
          <tr class="tableClara">
            <td valign="top">
              <xsl:for-each select="XMLTEXTO/propiedad/servicios/serv">
                <xsl:variable name="modulo" select="(position()-1) mod 2" />
                <xsl:if test="$modulo = 0">
                  <strong><xsl:value-of select="serv_desc"/>:</strong> &nbsp;<xsl:value-of select="serv_valor"/><br />
                  </xsl:if>
                </xsl:for-each>              </td>
                  <td valign="top">
                    <xsl:for-each select="XMLTEXTO/propiedad/servicios/serv">
                      <xsl:variable name="modulo" select="(position()-1) mod 2" />
                      <xsl:if test="$modulo = 1">
                        <strong><xsl:value-of select="serv_desc"/>:</strong> &nbsp;<xsl:value-of select="serv_valor"/><br />
                      </xsl:if>
                    </xsl:for-each>                  </td>
               </tr>
          
          <xsl:if test="prp_nota != ''">
            
            <tr class="tableClara">
              <td colspan="2"><strong>Nota:</strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_nota"/></td>
                </tr>
            </xsl:if>
          </table></td></tr>
  </table>
<!-- FIN PROPIEDAD -->
    </xsl:otherwise>
</xsl:choose>

</xsl:template>
</xsl:stylesheet> 