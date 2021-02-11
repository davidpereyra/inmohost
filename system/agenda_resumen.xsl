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
<xsl:param name="id" />
<xsl:param name="file0" />
<xsl:param name="file1" />
<xsl:param name="file2" />
<xsl:param name="prp_usr" />
<xsl:param name="fileAgenda" />
<xsl:param name="fileDemandaXML" />
<xsl:param name="fileTasacion" />
<xsl:param name="fileTelefonoFormulario" />
<xsl:param name="fileListadoGenerico" />
<xsl:param name="fileNovedadesXMLHead" />
<xsl:param name="fileNovedadesXMLResultado" />
<xsl:param name="fileNovedadNewPHP"/>
<xsl:param name="fileNovedadNewXML"/>
<xsl:param name="fileNovedadNewXSL"/>
<xsl:param name="fileMensajes" />
<xsl:param name="fileTelefonoNew" />
<xsl:param name="fileListadoPropiedades" />
<xsl:param name="fileXMLHeadTel" />
<xsl:param name="fileXMLListadoTel" />
<xsl:param name="fileXMLHeadCitas" />
<xsl:param name="fileXMLListadoCitas" />
<xsl:param name="fileXMLHeadTas" />
<xsl:param name="fileXMLListadoTas" />
<xsl:param name="limite1" />
<xsl:param name="emp_id" />
<xsl:param name="diaDesde" />
<xsl:param name="mesDesde" />
<xsl:param name="anoDesde" />
<xsl:param name="fileDemandasXMLHead" />
<xsl:param name="fileDemandasXMLResultado" />

<xsl:template match="/">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0" >
  <tr>
    <td width="33%" valign="top">
    
<xsl:comment>
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableClara" id="tablaResumenNovedades">
      <tr class="tableOscura">
        <td><h1>Mensajes</h1></td>
      </tr>
      <xsl:for-each select="XML/mensajes/item">
        <tr class="tableOscura" onclick="parent.ventana('red_inmobiliarios', '&amp;usr_id={@id}', '{$fileMensajes}', 'Red de Inmobiliarias');" title="{normalize-space(.)}">
          <td width="80%">
			<xsl:choose>
				<xsl:when test="@cant > $limite1">
				  <div class="destacado">
				  <a class="menuItem"><xsl:value-of select="../../varios/item" disable-output-escaping="yes"/></a></div>
				</xsl:when>
				<xsl:otherwise>
				  <a class="menuItem"><xsl:value-of select="../../varios/item" disable-output-escaping="yes"/></a>
				</xsl:otherwise>
			</xsl:choose>
			</td>
        </tr>
      </xsl:for-each>
    </table>
      <br />
</xsl:comment>      
      <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableClara" id="tablaResumenCitas" >
      <tr class="tableOscura">
        <td colspan="2"><h1><a href="javascript:parent.ventana('agenda_citas', '&amp;prp_usr={$prp_usr}&amp;mod_edit=1', '{$fileAgenda}', 'Agregar Cita');" title="Agendar Cita"><img src="../interfaz/inmohost/images/iconos/20/citas.png" width="20" height="20" align="right" /></a>Citas</h1></td>
        </tr>
      <xsl:for-each select="XML/citas/item">
        <tr class="tableOscura" onclick="ver_citas({@emp_id},'{$fileXMLHeadCitas}','{$fileXMLListadoCitas}',{$diaDesde},{$mesDesde},{$anoDesde});" title="{normalize-space(.)} ({@cant})">
          <td width="80%">
			<xsl:choose>
				<xsl:when test="@cant > $limite1">
					  <div class="destacado">
					  <a class="menuItem"><xsl:value-of select="normalize-space(.)" disable-output-escaping="yes"/></a></div>
				</xsl:when>
				<xsl:otherwise>
				  <a class="menuItem"><xsl:value-of select="normalize-space(.)" disable-output-escaping="yes"/></a>
				</xsl:otherwise>
			</xsl:choose>		  </td>
          <td width="20%">
			<xsl:choose>
				<xsl:when test="@cant > $limite1">
					  <div align="center" class="destacado">
					  <a class="menuItem"><strong><xsl:value-of select="@cant"/></strong></a></div>
				</xsl:when>
				<xsl:otherwise>
					  <div align="center">
					  <a class="menuItem"><strong><xsl:value-of select="@cant"/></strong></a></div>
				</xsl:otherwise>
			</xsl:choose>          </td>
        </tr>
      </xsl:for-each>
    </table>
     
      <br /></td>
    <td width="34%" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableClara" id="tablaResumenNovedades">
      <tr class="tableOscura">
        <td colspan="2"><h1><a href="javascript:parent.ventana('alt_nov','&amp;fileXML={$fileNovedadNewXML}&amp;fileXSL={$fileNovedadNewXSL}','{$fileNovedadNewPHP}','Alta de Novedad'); " title="Agregar"><img src="../interfaz/inmohost/images/iconos/20/novedades.png" width="20" height="20" align="right" /></a>Novedades</h1></td>
      </tr>
      <xsl:for-each select="XML/novedades/item">
        <tr class="tableOscura" onclick="parent.ventana('generico_listado', '&amp;fileXMLListado={$fileNovedadesXMLResultado}&amp;fileXMLHead={$fileNovedadesXMLHead}&amp;desde=00-00-0000&amp;desdeDia=00&amp;desdeMes=00&amp;desdeAno=0000&amp;hasta=00-00-0000&amp;hastaDia=00&amp;hastaMes=00&amp;hastaAno=0000&amp;emp_hacia={@emp}&amp;estado=0&amp;mod_edit=mod_edit', '{$fileListadoGenerico}', 'Novedades');" title="{normalize-space(.)} ({@cant})">
          <td width="80%">
		  <xsl:choose>
				<xsl:when test="@cant > $limite1">
					  <div class="destacado">
					  <a class="menuItem"><xsl:value-of select="normalize-space(.)" disable-output-escaping="yes"/></a></div>
				</xsl:when>
				<xsl:otherwise>
				  <a class="menuItem"><xsl:value-of select="normalize-space(.)" disable-output-escaping="yes"/></a>
				</xsl:otherwise>
			</xsl:choose>
		         </td>
          <td width="20%"><xsl:choose>
              <xsl:when test="@cant &gt; $limite1">
                <div align="center" class="destacado"> <a class="menuItem"><strong><xsl:value-of select="@cant"/></strong></a> </div>
              </xsl:when>
              <xsl:otherwise>
                <div align="center"> <a class="menuItem"><strong><xsl:value-of select="@cant"/></strong></a> </div>
              </xsl:otherwise>
            </xsl:choose>          </td>
        </tr>
      </xsl:for-each>
    </table>
      <br />
    <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableClara" id="tablaResumenTasaciones">
      <tr class="tableOscura">
        <td colspan="2"><h1><a href="javascript: parent.ventana('alta_tasacion', '&amp;nomVentana=alta_tasacion', '{$fileTasacion}', 'Agregar Tasacion');" title="Agregar"><img src="../interfaz/inmohost/images/iconos/20/tasaciones.png" width="20" height="20" align="right" /></a>Tasaciones</h1></td>
          </tr>
      <xsl:for-each select="XML/tasaciones/item">
        <tr class="tableOscura" onclick="parent.ventana('generico_listado', '&amp;mod_edit=mod_edit&amp;fileXMLListado={$fileXMLListadoTas}&amp;fileXMLHead={$fileXMLHeadTas}&amp;emp_id={@emp_id}&amp;estado_dis=2', '{$fileListadoGenerico}', 'Tasaciones');" title="{normalize-space(.)} ({@cant})">
          <td width="80%">
            <xsl:choose>
              <xsl:when test="@cant > $limite1">
                <div class="destacado">
                  <a class="menuItem"><xsl:value-of select="." disable-output-escaping="yes"/></a>                  </div>
				  </xsl:when>
              <xsl:otherwise>
                <a class="menuItem"><xsl:value-of select="." disable-output-escaping="yes"/></a>
                </xsl:otherwise>
              </xsl:choose>            </td>
              <td width="20%">
                <xsl:choose>
                  <xsl:when test="@cant > $limite1">
                    <div align="center" class="destacado">
                      <a class="menuItem"><strong><xsl:value-of select="@cant"/></strong></a>                      </div>
				  </xsl:when>
                  <xsl:otherwise>
                    <div align="center">
                      <a class="menuItem"><strong><xsl:value-of select="@cant"/></strong></a>                      </div>
				  </xsl:otherwise>
                  </xsl:choose>                </td>
            </tr>
        </xsl:for-each>
    </table></td><td width="33%" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableClara" id="tablaResumenDemandas">
        <tr class="tableOscura">
           	<td colspan="3" class="tableOscura"><h1><a href="javascript:parent.ventana('alt_dem','&amp;mod_tip=add&amp;ventana=alt_dem&amp;fileXML={$fileDemandaXML}&amp;fileXSL=./agenda_demandas.xsl','system/agenda_demandas.php','Alta de Demanda');" title="Agregar"><img src="../interfaz/inmohost/images/iconos/20/demanda.png" width="20" height="20" align="right" /></a>Demandas</h1></td>
        </tr>
        <tr class="tableOscura">
          <td class="tableOscura"><h2>Inmueble</h2></td>
          <td><h2 align="center">Venta</h2></td>
          <td><h2 align="center">Alquiler</h2></td>
        </tr>
        <xsl:for-each select="XML/demandas/item">
          <tr class="tableOscura" >
            <td><xsl:value-of select="." disable-output-escaping="yes"/></td>
            <td align="center"><a href="javascript:parent.ventana('generico_listado', '&amp;mod_edit=mod_edit&amp;fileXMLListado={$fileDemandasXMLResultado}&amp;fileXMLHead={$fileDemandasXMLHead}&amp;tip_id={@tip}&amp;con_id=1&amp;otros={@otr}', '{$fileListadoGenerico}', 'Demandas');" title="{normalize-space(.)} en Venta ({@cant1})" class="menuItem"><strong><xsl:value-of select="@cant1"/></strong></a></td>
            <td align="center"><a href="javascript:parent.ventana('generico_listado', '&amp;mod_edit=mod_edit&amp;fileXMLListado={$fileDemandasXMLResultado}&amp;fileXMLHead={$fileDemandasXMLHead}&amp;tip_id={@tip}&amp;con_id=2&amp;otros={@otr}', '{$fileListadoGenerico}', 'Demandas');" title="{normalize-space(.)} en Alquiler ({@cant2})" class="menuItem"><strong><xsl:value-of select="@cant2"/></strong></a></td>
          </tr>
        </xsl:for-each>
      </table>
      
           <br />
      <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableClara" id="tablaresumenUltimos">
        <tr class="tableOscura">
          <td><h1><a href="javascript:;" onclick="parent.position(event); parent.toolTip('{$fileTelefonoNew}',this)" title="Agregar Teléfono" class="menuItem"><img src="../interfaz/inmohost/images/iconos/20/telefono.png" width="20" height="20" align="right" /></a>Teléfonos</h1></td>
        </tr>
        
        <tr class="tableOscura">
          <td align='left'>
          		<form id="FormAgendaTelefonosR" name="FormAgendaTelefonosR" method="post" action="">
                <div>
                  <input name="texto" type="text" id="text_buscar" onkeypress="if(event.keyCode==13)buscar_telefono('{$fileXMLHeadTel}','{$fileXMLListadoTel}')" size='15' style='border:1px solid #FFFFFF;background-color:#CCCCCC' />&#160;<a href="javascript:;" onclick="buscar_telefono('{$fileXMLHeadTel}','{$fileXMLListadoTel}')" title="Buscar Teléfono"><img src="../interfaz/inmohost/images/iconos/20/buscar.png" width="20" height="20"/></a> 
                  <!--input name="buscar" type="button" class="botonForm" id="buscar" value="Buscar" tabindex="1" onclick="parent.displayMenu('menu2', '6', 'Agenda'); parent.traeURL('{$fileTelefonoFormulario}', 'contenidoMenuActual2');" onkeypress="" /--> 
              </div>
              </form>
              </td>
          </tr>
      </table>
      
	<xsl:comment>        
		<br />
        <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableClara" id="tablaresumenUltimos">
          <tr class="tableOscura">
            <td><h1>Otros Informes </h1></td>
          </tr>
          <xsl:for-each select="XML/otros/item">
            <tr class="tableOscura" onclick="parent.ventana('prp_listado', '&amp;mod_edit=mod_edit', '{$fileListadoPropiedades}', 'Propiedades');" title="{normalize-space(.)}">
              <td><a class="menuItem"><xsl:value-of select="." disable-output-escaping="yes"/></a></td>
              </tr>
          </xsl:for-each>
        </table>
        <br />
		</xsl:comment>
		</td>
  </tr>
  
  
  
  <!--tr>
    <td colspan="3" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableClara" id="tablaResumenDemandas">
      <tr class="tableOscura">
        <td colspan="5" class="tableOscura"><h1>Movimientos a la fecha </h1></td>
      </tr>
      <tr class="tableOscura">
        <td width="40%" class="tableOscura"><h2 align="center">Tipo</h2></td>
        <td width="10%"><div align="center">Publicadas en Venta</div></td>
        <td width="10%"><div align="center">Publicadas en Alquiler</div></td>
        <td width="10%"><div align="center">Vendidas</div></td>
        <td width="10%"><div align="center">Alquiladas</div></td>
        </tr>
      <xsl:for-each select="XML/varios/item">
        <xsl:if test="@venta>0 or @alquiler>0 or @vendidas>0 or @alquiladas>0">
		  <tr class="tableOscura" >
          <td><div align="right"><xsl:value-of select="desc" disable-output-escaping="yes"/></div></td>
		  <td align="center"><strong><xsl:value-of select="@venta"/></strong></td>
  		  <td align="center"><strong><xsl:value-of select="@alquiler"/></strong></td>
  		  <td align="center"><strong><xsl:value-of select="@vendidas"/></strong></td>
  		  <td align="center"><strong><xsl:value-of select="@alquiladas"/></strong></td>
         </tr>
        </xsl:if>
      </xsl:for-each>
	    <tr class="tableOscura" >
		  <td><div align="right">Totales</div></td>
  		  <td align="center"><strong><xsl:value-of select="XML/varios/tot_venta"/></strong></td>
  		  <td align="center"><strong><xsl:value-of select="XML/varios/tot_alquiler"/></strong></td>
  		  <td align="center"><strong><xsl:value-of select="XML/varios/tot_vendidas"/></strong></td>
  		  <td align="center"><strong><xsl:value-of select="XML/varios/tot_alquiladas"/></strong></td>
         </tr>
    </table></td>
    </tr-->
    </table>
</xsl:template>
</xsl:stylesheet>