<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/prp_ficha.xml.php?&chequea=dom,1,prp_id,1&tipoForm=buscar&orden=1&usr_id=886&mod_tip=edit&mod_edit=1&usr_id=886&usr_id=908&tip_id=0&con_id=0&pes_ent=&pes_y=&dol_ent=&dol_y=&dom=&prp_inmoID=908&prp_id=1" -->
<!DOCTYPE xsl:stylesheet  [
  <!ENTITY nbsp   "&#160;">
  <!ENTITY nl      "&#xa;">
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
<xsl:param name="usr_id_prp" />
<xsl:param name="fileFicha" />
<xsl:param name="fileFichaEdit" />
<xsl:param name="fileFichaEstado" />
<xsl:param name="fileCita" />
<xsl:param name="fileBarPrivXML" />
<xsl:param name="fileBarPrivXSL" />
<xsl:param name="fileBarPrivPHP" />
<xsl:param name="fileExportar" />
<xsl:param name="filePropietario" />
<xsl:param name="display" />
<xsl:param name="border" />
<xsl:param name="rutaFotos" />

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
      <td width="20%"><div align="center">
        <h2><xsl:value-of select="XMLTEXTO/propiedad/usr_raz"/></h2>
      </div></td>
      <td width="25%"><div align="center">
        <h3>Publicación: <xsl:value-of select="XMLTEXTO/propiedad/prp_alta"/></h3>
      </div></td>
      <td width="25%">
        <h3 align="center">Modificación: <xsl:value-of select="XMLTEXTO/propiedad/prp_mod"/></h3>      </td>
    </tr>
  </table>
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" style="margin-bottom:2px;" id="tablaMenu">
    <tr class="tableClara">
<xsl:if test="XMLTEXTO/propiedad/editCitas = '1'">
	<td width="10%">
      	<div id="div_ver_citas" style="display:{$display}">
	    	<p align="center"><a href="javascript:parent.ventana('agenda_citas', '&amp;prp_id={$prp_id}&amp;usr_id={$usr_id_prp}&amp;mod_edit=0', '{$fileCita}', 'Ver Citas');"  class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/citas.png" width="32" height="32" /><br />
	      	Ver citas</a> </p>	   
	      </div>	
	      
	   </td>
</xsl:if>
<xsl:if test="XMLTEXTO/propiedad/editPro = '1'">
      <td width="10%">
	    <div align="center" id="div_ver_prop" style="display:{$display}">
	    	<a href="javascript:;" onclick="position(event); toolTip('{$filePropietario}&amp;inmo_id={XMLTEXTO/propiedad/usr_id}',this);"  class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/propietario.png" width="32" height="32" /><br />
  &nbsp;Propietario</a> </div></td>
</xsl:if>
<xsl:if test="XMLTEXTO/propiedad/editImprimir = '1'">
      <td width="10%">
 		<div align="center" id="div_imp" style="display:{$display}">
			<a href="javascript:parent.ventana('ficha_imp', '&amp;mod_edit=1&amp;prp_id={$prp_id}&amp;usr_id={XMLTEXTO/propiedad/usr_id}&amp;imprimir=1', 'system/prp_ficha.php', 'Vista Previa Impresion');" title="Imprimir" class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/imprimir.png" width="32" height="32" />
			<br />
			Imprimir
		</a>
		</div>
	   <!-- 	<div align="center"><a href="javascript:parent.dialogos('alerta', '&amp;prp_id={$prp_id}&amp;usr_id={$usr_id}&amp;mod_edit=1', '{$fileExportar}', 'Exportar');" title="Imprimir" class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/imprimir.png" width="32" height="32" /><br />
  &nbsp;Imprimir</a> </div>
  		-->
  </td>
</xsl:if>
	
<xsl:if test="XMLTEXTO/propiedad/editFicha = '1'">
      <td width="10%">
	    <div align="center" id="div_video" style="display:{$display}"><a href="#" title="Video" class="aNulo" ><img src="../interfaz/inmohost/images/iconos/32/ficha.png" width="32" height="32" /><br />
	      Video</a></div></td>
</xsl:if>
<xsl:if test="XMLTEXTO/propiedad/editPro = '1'">
      <td width="10%">
	    <div align="center" id="div_ver_prop" style="display:{$display}">
	    	<a href="javascript:;" onclick="position(event); toolTip('{$fileTasacion}&amp;inmo_id={XMLTEXTO/propiedad/usr_id}',this);"  class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/propietario.png" width="32" height="32" /><br />
  &nbsp;Tasación</a> </div></td>
</xsl:if>
<xsl:if test="XMLTEXTO/propiedad/editBarPriv != '' ">
      <td width="10%">
	    <div align="center" id="div_pano" style="display:{$display}"><a href="javascript:parent.ventana('bar_priv','&amp;fileXML={$fileBarPrivXML}?mod_tip=edit&amp;bar_id={XMLTEXTO/propiedad/editBarPriv}&amp;fileXSL={$fileBarPrivXSL}','{$fileBarPrivPHP}','Barrio Privado');" title="Barrio Privado"  class="aNulo"><img src="../interfaz/inmohost/images/iconos/32/barrios.png" width="32" height="32" /><br />
  &nbsp;Barrio Privado</a> </div></td>
</xsl:if>
    </tr>
  </table>
</xsl:if>
<xsl:if test="$display = 'none'">
	<xsl:if test="XMLTEXTO/propiedad/fo_enl != '0-0-0.jpg'">
		<table  border="0" cellpadding="1" cellspacing="1"><tr>
			<div style="display:'';border:1px solid;" >
               <td><img src="php/funciones/foto.php?foto=../../../fotos/{XMLTEXTO/propiedad/fo_enl}&amp;tam=80"/>   </td>
                <!--td> <img src="http://localhost/inmohostV2.0/fotos/0-0-0.jpg"/>     </td-->
               </div> 
            </tr>
            
        </table>
	</xsl:if>
    
</xsl:if>
<form name="prp_edit_form" id="prp_edit_form">
  <input type="hidden" name="prp_lat" value="{XMLTEXTO/propiedad/prp_lat}" /> 
  <input type="hidden" name="prp_lng" value="{XMLTEXTO/propiedad/prp_lng}" />
  
  <table width="100%" border="0" align="left" cellpadding="3" cellspacing="1" class="tableOscura">
    
    <tr class="tableClara">
     
    
      <td width="300" align="center" valign="top" bgcolor="#EEEEEE" style="display:{$display}">
        <div id="prp_fotos">&nbsp;</div></td>
        	<script type="text/JavaScript">
						<xsl:text disable-output-escaping="yes">
						<![CDATA[
							var so = new SWFObject("extra/prp_fotos.swf", "FOTOS", "350", "350", "8", "#EEEEEE");
							so.addParam("scale", "noscale");
							so.addParam("quality", "high");
							so.addParam("salign", "lt");
							so.addParam("wmode", "opaque");
							so.addVariable("prp_fotosXML", "]]></xsl:text><xsl:value-of select="$prp_fotosXML" disable-output-escaping="yes"/><xsl:text disable-output-escaping="yes"><![CDATA[");
							so.addVariable("prp_fotosRuta", "../fotos/");
							so.addVariable("usr_id", "]]></xsl:text><xsl:value-of select="$usr_id_prp" disable-output-escaping="yes"/><xsl:text disable-output-escaping="yes"><![CDATA[");
							so.addVariable("prp_id", "]]></xsl:text><xsl:value-of select="$prp_id" disable-output-escaping="yes"/><xsl:text disable-output-escaping="yes"><![CDATA[");
							so.addVariable("mod_edit", "]]></xsl:text><xsl:value-of select="$mod_edit"/><xsl:text disable-output-escaping="yes"><![CDATA[");
							so.write("prp_fotos");
						]]>
						</xsl:text>
			</script>
        			
      <td valign="top">
        <table width="100%" border="{$border}" cellspacing="1" cellpadding="3" class="tableOscura">
          <tr class="tableClara">
          	<td colspan="2"><b>Referente del inmueble</b></td>
          </tr>
          <tr class="tableClara">
          	<td align="center"> 
          		<xsl:choose>
	          		<xsl:when test="XMLTEXTO/propiedad/referente/fotos > 0">
	          			<img src="{$rutaFotos}fotos/{XMLTEXTO/propiedad/referente/foto}" width="70px"/>		          		
	          		</xsl:when>
		          	<xsl:otherwise>	
		          			Sin Foto	
		          	</xsl:otherwise>
				</xsl:choose>
          	</td>
          	<td> Referente:<xsl:value-of select="XMLTEXTO/propiedad/referente/nombre"/><br/>
          		 Telefono:<xsl:value-of select="XMLTEXTO/propiedad/referente/telefono"/><br/>
          		 E-mail:<xsl:value-of select="XMLTEXTO/propiedad/referente/email"/>  
            </td>
          </tr>
           <tr class="tableClara">
          	<td colspan="2"><b>Inmueble</b></td>
          </tr>
          <tr class="tableClara">
            <td><strong>ID: </strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_id"/></td>
                  <td><strong>Precio: </strong>
                    <xsl:if test="XMLTEXTO/propiedad/prp_pre != 0">
                      $<xsl:value-of select="XMLTEXTO/propiedad/prp_pre"/>
                    </xsl:if>
                    <xsl:if test="XMLTEXTO/propiedad/prp_pre != 0 and XMLTEXTO/propiedad/prp_pre_dol != 0">
                      &nbsp;||&nbsp;
                    </xsl:if>              
                    <xsl:if test="XMLTEXTO/propiedad/prp_pre_dol != 0">
                      u$s<xsl:value-of select="XMLTEXTO/propiedad/prp_pre_dol"/>
                    </xsl:if>      
                 </td>

                   
                </tr>
            <!--tr class="tableClara">
         		<td colspan="2"><strong>Precio Tasacion: </strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/pre_inmo" disable-output-escaping="yes"/></td>
             </tr-->     
          <tr class="tableClara">
            <td width="50%">
              <strong>Inmueble: </strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/tip_desc"/>		        </td>
                  <td width="50%"><strong>Cartel: </strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_cartel"/></td>
                </tr>
          <tr class="tableClara">
            <td><strong>Condición: </strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/con_desc"/></td>
                  <td><strong>Llave: </strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_llave"/></td>
                </tr>
          
          <tr class="tableClara">
            <td colspan="2"><strong>Domicilio: </strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_dom"/>&#160;<xsl:value-of select="XMLTEXTO/propiedad/prp_plano"/> - <xsl:value-of select="XMLTEXTO/propiedad/prp_bar"/></td>
                </tr>
          <tr class="tableClara">
            <td><strong>Localidad: </strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/loc_desc"/></td>
                  <td><strong>Provincia: </strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/pro_desc"/></td>
                </tr>
          
          <xsl:if test="XMLTEXTO/propiedad/prp_servicios != ''">
            <tr class="tableClara">
              <td colspan="2"><strong>Servicios: </strong>&nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_servicios" disable-output-escaping="yes"/>                </td>
                </tr>
            </xsl:if>
          
          <tr class="tableClara">
            <td valign="top">
              <xsl:for-each select="XMLTEXTO/propiedad/servicios/serv">
                <xsl:variable name="modulo" select="(position()-1) mod 2" />
                <xsl:if test="$modulo = 0">
                  <strong><xsl:value-of select="serv_desc"/>: </strong> &nbsp;<xsl:value-of select="serv_valor"/><br />
                  </xsl:if>
                </xsl:for-each>              </td>
                  <td valign="top">
                    <xsl:for-each select="XMLTEXTO/propiedad/servicios/serv">
                      <xsl:variable name="modulo" select="(position()-1) mod 2" />
                      <xsl:if test="$modulo = 1">
                        <strong><xsl:value-of select="serv_desc"/>: </strong> &nbsp;<xsl:value-of select="serv_valor"/><br />
                      </xsl:if>
                    </xsl:for-each>                  </td>
               </tr>
          
          <xsl:if test="XMLTEXTO/propiedad/prp_nota != ''">
            <tr class="tableClara">
              <td colspan="2">
              		<strong>Nota: </strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_nota" disable-output-escaping="yes"/></td>
            </tr>
          </xsl:if>
          
          </table>
          <tr class="tableClara">
              <td colspan="2">
              		<strong>Descripcion: </strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_desc" disable-output-escaping="yes" /></td>
             </tr>
          
          <xsl:if test="XMLTEXTO/propiedad/prp_lat != ''">   
          <tr class="tableClara" style="valign:middle;" >
              <td colspan="2">
			<strong>Ver Ubicación: </strong> &nbsp; <a href="{XMLTEXTO/propiedad/prp_ubicacion}" target="blank" title="Ver Ubicación"><img align="middle" src="../interfaz/images/googlemaps.jpg" alt="Ubicación" width="60" /></a>
              		<!--div id="map-canvas" style="width: 100%; height: 200px"></div-->
		</td>
             </tr>   
          </xsl:if>
             
          <xsl:if test="XMLTEXTO/propiedad/prp_pub != ''">   
          <tr class="tableClara">
              <td colspan="2">
              		<strong>Aviso Publicitario: </strong> &nbsp;<xsl:value-of select="XMLTEXTO/propiedad/prp_pub" disable-output-escaping="yes" /></td>
             </tr>   
          </xsl:if>
             
        </td>
      </tr>
 </table>
</form> 
  
<!-- FIN PROPIEDAD -->
    </xsl:otherwise>
</xsl:choose>

</xsl:template>
</xsl:stylesheet> 