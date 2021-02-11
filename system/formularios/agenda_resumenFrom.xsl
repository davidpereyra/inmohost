<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="file:///C|/wamp/www/sistema inmohost/xml/agenda_resumen.xml" -->
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
<xsl:param name="file3" />
<xsl:param name="usr_login" />

<xsl:template match="/">
<xsl:if test="$id = 'citas'">
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaResumenCitas" >
            <xsl:for-each select="XML/citas/item">
              <tr class="tableClara" onclick="display('menuPrincipal'); ventana('agenda_citas', '&amp;emp_id={@emp_id}&amp;mod_edit=0', '{$file0}', 'Citas');" title="{.} ({@cant})">
                <td width="80%"><a class="menuItem"><xsl:value-of select="." disable-output-escaping="yes"/></a></td>
                <td width="20%"><a class="menuItem"><div align="center"><xsl:value-of select="@cant"/></div></a></td>
              </tr>
            </xsl:for-each>
</table>
</xsl:if>
<xsl:if test="$id = 'novedades'">
		<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaResumenNovedades">
            <xsl:for-each select="XML/novedades/item">
            <tr class="tableClara" onclick="display('menuPrincipal'); ventana('generico_listado', '&amp;mod_edit=mod_edit&amp;fileXMLListado={$file2}&amp;fileXMLHead={$file1}&amp;usr_login={$usr_login}', '{$file0}', 'Novedades');" title="{.} ({@cant})">
            <td width="80%">
			  	<a class="menuItem"><xsl:value-of select="." disable-output-escaping="yes"/></a>
			</td>
            <td width="20%"><div align="center">
			  	<a class="menuItem"><strong><xsl:value-of select="@cant"/></strong></a>
			</div></td>
            </tr>
            </xsl:for-each>
          </table>
</xsl:if>
<xsl:if test="$id = 'tasaciones'">
<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaResumenTasaciones">
		<xsl:for-each select="XML/tasaciones/item">
            <tr class="tableClara" onclick="display('menuPrincipal'); ventana('generico_listado', '&amp;fileXMLListado={$file2}&amp;emp_id={@emp_id}&amp;fileXMLHead={$file1}&amp;emp_id={@emp_id}&amp;estado_dis=2', '{$file0}', 'Tasaciones');" title="{.} ({@cant})">
              <td width="80%"><a class="menuItem"><xsl:value-of select="." disable-output-escaping="yes"/></a></td>
              <td width="20%"><div align="center"><a class="menuItem"><strong><xsl:value-of select="@cant"/></strong></a></div></td>
            </tr>
         </xsl:for-each>
          </table>
</xsl:if>
<xsl:if test="$id = 'demandas'">
		  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaResumenDemandas">
            <tr class="tableOscura">
              <td class="tableOscura"><h2>Inmueble</h2></td>
              <td><h2 align="center">Venta</h2></td>
              <td><h2 align="center">Alquiler</h2></td>
            </tr>
		<xsl:for-each select="XML/demandas/item">
            <tr class="tableClara">
              <td><a class="menuItem" ><xsl:value-of select="." disable-output-escaping="yes"/></a></td>
              <td align="center"><a class="menuItem" onclick="display('menuPrincipal'); ventana('generico_listado', '&amp;mod_edit=mod_edit&amp;fileXMLListado={$file2}&amp;fileXMLHead={$file1}&amp;tip_id={@tip}&amp;con_id=1&amp;otros={@otr}', '{$file0}', 'Demandas');" title="{.} ({@cant1})"> <xsl:value-of select="@cant1"/></a></td>
              <td align="center"><a class="menuItem" onclick="display('menuPrincipal'); ventana('generico_listado', '&amp;mod_edit=mod_edit&amp;fileXMLListado={$file2}&amp;fileXMLHead={$file1}&amp;tip_id={@tip}&amp;con_id=2&amp;otros={@otr}', '{$file0}', 'Demandas');" title="{.} ({@cant1})"><xsl:value-of select="@cant2"/></a></td>
            </tr>
		</xsl:for-each>
          </table>
</xsl:if>
<xsl:if test="$id = 'varios'">
<!--
<table width="100%" border="0" cellpadding="1" cellspacing="1" id="tablaResumenVarios">
		<xsl:for-each select="XML/varios/item">
            <tr title="{.}">
              <td><h2><a href="javascript:;" onclick="display('menuPrincipal'); ventana('prp_listado', '&amp;mod_edit=mod_search', '{$file0}', 'Propiedades');" title="{.}" class="menuItem"><xsl:value-of select="." disable-output-escaping="yes"/></a></h2></td>
            </tr>
        </xsl:for-each>
</table>
<table width="100%" border="0" cellpadding="1" cellspacing="1" id="tablaResumenVarios">
            <tr>
              <td width="50%">&nbsp;</td>
              <td width="20%"><div align="center">
                <h2>venta</h2>
              </div></td>
              <td width="20%"><div align="center">
                <h2>alquiler</h2>
              </div></td>
              <td width="10%">&nbsp;</td>
            </tr>
		<xsl:comment>
		<xsl:for-each select="XML/otros/item">
            <tr class="tableOscura">
              <td><div align="right">
                  <h2><xsl:value-of select="." disable-output-escaping="yes"/>Publicadas</h2>
              </div></td>
              <td><h2 align="center"><xsl:value-of select="@cant1" disable-output-escaping="yes"/></h2></td>
              <td><h2 align="center"><xsl:value-of select="@cant2" disable-output-escaping="yes"/></h2></td>
              <td width="10%"><a href="javascript:ventana('graficos', '&amp;graf=lineal', '{$file2}', 'ver Gráfico de Evolución')" title="ver Gráfico de Evolución"><img src="interfaz/inmohost/images/iconos/20/archivo.png" alt="ver Gráfico de Evolución" width="20" height="20" border="0" align="right" /></a></td>
          </tr>
        </xsl:for-each>
		</xsl:comment>
		<xsl:for-each select="XML/otros/item">
            <tr class="tableOscura">
              <td><div align="right">
                  <h2><xsl:value-of select="." disable-output-escaping="yes"/>exitosas</h2>
              </div></td>
              <td><h2 align="center"><xsl:value-of select="@cant3" disable-output-escaping="yes"/></h2></td>
              <td><h2 align="center"><xsl:value-of select="@cant4" disable-output-escaping="yes"/></h2></td>
              <td><a href="javascript:ventana('graficos', '&amp;graf=lineal', '{$file3}', 'ver Gráfico de Evolución')" title="ver Gráfico de Evolución"><img src="interfaz/inmohost/images/iconos/20/archivo.png" alt="ver Gráfico de Evolución" width="20" height="20" border="0" align="right" /></a></td>
          </tr>
        </xsl:for-each>
		<xsl:for-each select="XML/otros/item">
        </xsl:for-each>
</table>
-->
<table width="100%" border="0" cellpadding="1" cellspacing="1" id="tablaResumenVarios">
  <tr>
    <td colspan="3" valign="top">
	<table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaResumenDemandas">
      <tr class="tableClara">
        <td colspan="5" class="tableClara"><h1>Movimientos a la fecha </h1></td>
      </tr>
      <tr class="tableClara">
        <td width="40%" class="tableClara"><div align="center">Tipo</div></td>
        <td width="10%"><div align="center">Publicadas en Venta</div></td>
        <td width="10%"><div align="center">Publicadas en Alquiler</div></td>
        <td width="10%"><div align="center">Vendidas</div></td>
        <td width="10%"><div align="center">Alquiladas</div></td>
        </tr>
      <xsl:for-each select="XML/varios/item">
        <xsl:if test="@venta>0 or @alquiler>0 or @vendidas>0 or @alquiladas>0">
		  <tr class="tableClara" >
          <td><div align="right"><xsl:value-of select="desc" disable-output-escaping="yes"/></div></td>
		  <td align="center"><strong><xsl:value-of select="@venta"/></strong></td>
  		  <td align="center"><strong><xsl:value-of select="@alquiler"/></strong></td>
  		  <td align="center"><strong><xsl:value-of select="@vendidas"/></strong></td>
  		  <td align="center"><strong><xsl:value-of select="@alquiladas"/></strong></td>
         </tr>
        </xsl:if>
      </xsl:for-each>
	    <tr class="tableClara" >
		  <td><div align="right">Totales</div></td>
  		  <td align="center"><strong><xsl:value-of select="XML/varios/tot_venta"/></strong></td>
  		  <td align="center"><strong><xsl:value-of select="XML/varios/tot_alquiler"/></strong></td>
  		  <td align="center"><strong><xsl:value-of select="XML/varios/tot_vendidas"/></strong></td>
  		  <td align="center"><strong><xsl:value-of select="XML/varios/tot_alquiladas"/></strong></td>
         </tr>
    </table></td>
    </tr>
</table>

</xsl:if>
</xsl:template>
</xsl:stylesheet>
