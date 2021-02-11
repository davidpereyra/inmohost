<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://localhost/inmohostV2.0/system/datos/panel_medios.xml.php" -->
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
<xsl:param name="file0" />
<xsl:param name="file1" />
<xsl:param name="file2" />
<xsl:param name="file3" />


<xsl:template match="/">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura" id="tablaResumenMedios">
    <tr>
      <td width="80%"><h2>Barrio Privado</h2></td>
      <td width="80%"><h2>Detalles</h2></td>
      <td width="10%"><h2 align="center">editar</h2></td>
      <td width="10%"><h2 align="center">quitar</h2></td>
    </tr>
<xsl:for-each select="bar_priv/columna">
    <tr class="tableClara">
      <td><xsl:value-of select="bar_denom" disable-output-escaping="yes"/></td>
      <td><div align="center"><a href="javascript:display('menuPrincipal');ventana('bar_priv','&amp;fileXML={$file0}?mod_tip=edit&amp;bar_id={bar_id}&amp;fileXSL={$file2}','{$file3}','Barrio Privado');" title="Ficha del barrio"><img src="interfaz/inmohost/images/iconos/20/ficha.png" width="20" height="20" border="0" alt="Ficha del Barrio"/></a></div></td>
      <td><div align="center"><a href="javascript:displayMenu('close');ventana('bar_priv', '&amp;bar_id={bar_id}&amp;mod_tip=edit&amp;nomVentana=bar_priv', '{$file1}', 'Editar Barrio Privado');" title="editar" class="menuItem"><img src="interfaz/inmohost/images/iconos/20/editar.png" width="20" height="20" border="0" /></a></div></td>
     
      <td><div align="center"><a href="javascript:;" onclick="eliminar_bar_priv('{bar_id}');traeURL('system/formularios/panel_bar_priv.php', 'contenidoMenuActual5');" title="quitar" class="menuItem"><img src="interfaz/inmohost/images/iconos/20/eliminar.png" width="20" height="20" border="0" /></a></div></td>
    </tr>
</xsl:for-each>
  </table>
</xsl:template>
</xsl:stylesheet>