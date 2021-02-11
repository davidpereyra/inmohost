<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://localhost/inmohostV2.0/system/datos/control_bar_priv.xml.php?bar_id=1&mod_tip=edit" -->
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
<xsl:param name="mod_tip" />
<xsl:param name="nomVentana" />
<xsl:param name="bar_id" />
<xsl:param name="fileEdit" />
<xsl:param name="rutaSystem" />
<xsl:param name="rutaAbsoluta" />

<xsl:template match="/">

  <table width="100%" height="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
        <tr class="tableClara">
          <td width="150%" colspan="2">
            <h1 align="left">Detalle Barrio Privado</h1>
					</td>
          </tr>
		  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaEditUsuarios">
              <tr class="tableClara">
                <td><div align="right" id="bar_comp_priv_div">Tipo:</div></td>
                <td>
                	<div align="center"><xsl:value-of select="bar_priv/bar_comp_priv_desc"/></div>
                </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="pro_id_div">Provincia:</div></td>
	          <td>
	          	<div align="center"><xsl:value-of select="bar_priv/pro_desc"/></div>
         	</td>
              </tr>
              <tr class="tableClara">
                <td width="20%" ><div align="right" id="loc_id_div">Localidad:</div></td>
		          <td width="30%">
		          <div align="center"><xsl:value-of select="bar_priv/loc_desc"/></div>
           		</td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_zona_div">Zona:</div></td>
                <td>
                <div align="center"><xsl:value-of select="bar_priv/bar_zona"/></div>
                </td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_dir_div">Domicilio:</div></td>
                <td><div align="center"><xsl:value-of select="bar_priv/bar_dir"/></div></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_denom_div">Denominación:</div></td>
                <td><div align="center"><xsl:value-of select="bar_priv/bar_denom"/></div></td>
              </tr>
               <tr class="tableClara">
                <td><div align="right" id="bar_cont_div">Contacto:</div></td>
                <td><div align="center"><xsl:value-of select="bar_priv/bar_cont"/></div></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_tel_div">Teléfono:</div></td>
                <td><div align="center"><xsl:value-of select="bar_priv/bar_tel"/></div></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_mail_div">Mail:</div></td>
                <td><div align="center"><xsl:value-of select="bar_priv/bar_mail"/></div></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_sup_tot_div">Superficie Total:</div></td>
                <td><div align="center"><xsl:value-of select="bar_priv/bar_sup_tot"/></div></td>
              </tr>
               <tr class="tableClara">
                <td><div align="right" id="bar_sup_lot_div">Superficie Lote:</div></td>
                <td><div align="center"><xsl:value-of select="bar_priv/bar_sup_lot"/></div></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_cant_tot_div">Cantidad de Lotes:</div></td>
                <td><div align="center"><xsl:value-of select="bar_priv/bar_cant_lot"/></div></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_desc_div">Descripción:</div></td>
                <td><div align="center"><xsl:value-of select="bar_priv/bar_desc"/></div></td>
              </tr>
              <tr class="tableClara">
                <td><div align="right" id="bar_serv_div">Servicios:</div></td>
                <td><div align="center"><xsl:value-of select="bar_priv/bar_serv"/></div></td>
              </tr>
               <tr class="tableClara">
                <td><div align="right" id="bar_url_div">Pag. Web (URL):</div></td>
                <td><div align="center"><xsl:value-of select="bar_priv/bar_url"/></div></td>
              </tr>
               <tr class="tableClara">
                <td><div align="right" id="bar_logo_div">Logo:</div></td>
                <td><div align="center"><img src="extra/logos/{bar_priv/bar_logo}" alt="Logo" width="90px"/></div></td>
              </tr>
              <!-- FOTOS -->
			     <tr class="tableClara">
		          <td colspan="2">
			          <xsl:for-each select="bar_priv/imagenes/foto">
			               <a href="javascript:parent.ventana('imagen','img={$rutaAbsoluta}fotos/{fo_enl}&amp;tam=500','{$rutaSystem}imagen.php','');"><img src="../fotos/{fo_enl}" width="100px"/></a>&#160;
			          </xsl:for-each>
		          </td>
		       	</tr>
		            
		            
		       <tr class="tableClara">
                <td colspan="2"><input type="hidden" name="cant_fotos" value="10"/></td>
              </tr>
			<!-- FOTOS -->
              
          </table>
    	  <tr class="tableClara" height="32">
      <td colspan="2" ><div align="center">
        <input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="parent.Windows.close('bar_priv')" tabindex="27" />
         <!--input name="Submit" type="button" class="botonForm" value="Modificar" onclick="location.href='../{$fileEdit}?mod_tip={$mod_tip}&amp;nomVentana={$nomVentana}&amp;bar_id={$bar_id}'" tabindex="27" /-->

	
      </div></td>
    </tr>
  </table>


</xsl:template>
</xsl:stylesheet> 