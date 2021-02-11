<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/agenda_citas.xml.php?usr_id=908&dia=14&mes=06&ano=2007" -->
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
<xsl:param name="fileAgendaCitasNew" />
<xsl:param name="fileAgendaCitasEdit" />
<xsl:param name="fileAgendaCitasInteresados" />
<xsl:param name="acc_internet" />
<xsl:param name="prp_usr" />
<xsl:param name="desdeCitas" />
<xsl:param name="desdeCitasDia" />
<xsl:param name="desdeCitasMes" />
<xsl:param name="desdeCitasAno" />
<xsl:param name="hastaCitas" />
<xsl:param name="hastaCitasDia" />
<xsl:param name="hastaCitasMes" />
<xsl:param name="hastaCitasAno" />

<xsl:template match="/">
<table width="100%" border="0" cellspacing="0" cellpadding="3">
  <tr >
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr >
    <td width="50%">
	    <h1 align="left"> Fecha: <xsl:value-of select="XML/datos/dia"/>/<xsl:value-of select="XML/datos/mes"/>/<xsl:value-of select="XML/datos/ano"/></h1>	 </td>
    <td width="50%"><h1 align="right" onclick="position(event); toolTip('{$fileCalendario}&amp;destino=citasListado&amp;prp_id={$prp_id}&amp;acc_internet={$acc_internet}',this);"><a title="buscar fecha" ><img src="../interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" hspace="5" align="absmiddle" />buscar fecha&nbsp;&nbsp;&nbsp;</a></h1></td>
  </tr>
  
  <tr >
    <td colspan="2"><table width="99%" border="0" align="center" cellpadding="1" cellspacing="1" class="tableOscura">
      <tr class="tableClara">
        <td width="5%"><h1 align="center">-</h1></td>
        <td width="5%"><h1 align="center">-</h1></td>
        <td width="50"><div align="center">
            <h1>-</h1>
        </div></td>
        <td width="45"><div align="center">
          <h1>hora</h1>
        </div></td>
        <td width="45"><div align="center">
          <h1>ID</h1>
        </div></td>
        <td width="20%"><div align="center">
          <h1>Detalles</h1>
        </div></td>
        <td width="50"><div align="center">
          <h1>Precio</h1>
        </div></td>
        <td width="50"><div align="center">
          <h1>Llave</h1>
        </div></td>
        <td width="25%"><div align="center">
          <h1>Nota</h1>
        </div></td>
        <td width="15%"><div align="center">
          <h1>Monitor</h1>
        </div></td>
        <!--td width="80"><div align="center">
          <h1>Interesados</h1>
        </div></td-->
        </tr>
      <xsl:for-each select="XML/hora">
        <tr class="tableClara">
          <td><div align="center"><a href="javascript:;" onclick="position(event); toolTip('{$fileAgendaCitasNew}&amp;usr_id={17}&amp;hora={@id}&amp;fecha={../datos/ano}-{../datos/mes}-{../datos/dia}&amp;prp_id={$prp_id}',this);" title="Agendar Cita en este Horario"><img src="../interfaz/inmohost/images/iconos/20/citas.png" width="20" height="20" border="0" /></a></div></td>
          <!--div align="center"><a href="javascript:;" onclick="position(event); window.parent.window.ventana('edicionSimple', '&amp;usr_id={$usr_id}&amp;hora={@id}&amp;fecha={../datos/ano}-{../datos/mes}-{../datos/dia}&amp;prp_id={$prp_id}&amp;ventanaDesde=agregarCita', '{$fileAgendaCitasNew}', 'Editar Cita');" title="Agendar Cita en este Horario"><img src="../interfaz/inmohost/images/iconos/20/citas.png" width="20" height="20" border="0" /></a></div></td-->
          
	  <td><div align="center">
		  	<xsl:value-of select="@id"/>:00<br />
			<xsl:value-of select="@id"/>:30
			</div></td>
          <td colspan="9"><xsl:for-each select="item">
            <table width="100%" border="0" cellpadding="2" cellspacing="1" class="tr1" style="margin-top:2px;">
                <tr class="tableClara">
                  <td width="50"><div align="center"><a href="javascript:;" onclick="position(event); window.parent.window.ventana('edicionSimple', '&amp;cita_id={@cita_id}&amp;{@usr_id}&amp;ventanaDesde=agregarCita', '{$fileAgendaCitasEdit}', 'Editar Cita');" title="Editar Cita"><img src="../interfaz/inmohost/images/iconos/20/editar.png" width="20" height="20" border="0" /></a></div></td>                																				
                  <td width="50"><div align="center">
                    <h2><xsl:value-of select="@hora"/></h2></div></td>
                  <td width="50"><div align="center"><xsl:value-of select="@prp_id"/></div></td>
                  <td width="30%"><div align="center"><xsl:value-of select="detalles" disable-output-escaping="yes"/></div></td>
                  <td width="50"><div align="center"><xsl:value-of select="precio" disable-output-escaping="yes"/></div></td>
                  <td width="50"><div align="center"><xsl:value-of select="@llave"/></div></td>
                  <td width="30%"><div align="center"><xsl:value-of select="nota" disable-output-escaping="yes"/></div></td>
                  <td width="17%"><div align="center"><xsl:value-of select="monitor" disable-output-escaping="yes"/> </div></td>
                  <!--td width="50"><div align="center">
					<xsl:choose>
						<xsl:when test="@interesados>=1">
							<a href="javascript:;" onclick="position(event); toolTip('{$fileAgendaCitasVerInt}&amp;cita_id={@cita_id}',this);" title="Ver Interesados ({@interesados})"><img src="../interfaz/inmohost/images/iconos/20/propietario.png" width="20" height="20" border="0" /></a>						
						</xsl:when>
						<xsl:otherwise>
							<img src="../interfaz/inmohost/images/iconos/20_des/propietario.png" width="20" height="20" border="0" />						
						</xsl:otherwise>
					</xsl:choose>
				  </div></td>
                  <td width="50"><div align="center"><a href="javascript:;" onclick="position(event); toolTip('{$fileAgendaCitasInteresados}&amp;param={@cita_id}&amp;fecha={../../datos/ano}-{../../datos/mes}-{../../datos/dia}&amp;prp_id={$prp_id}',this);" title="Agregar Interesado"><img src="../interfaz/inmohost/images/iconos/20/vercitas.png" width="20" height="20" border="0" /></a></div></td-->
                  </tr>
                      </table>
          </xsl:for-each></td>
          </tr>
      </xsl:for-each>
    </table></td>
  </tr>
</table>
</xsl:template>
</xsl:stylesheet>