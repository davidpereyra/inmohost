<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/panel_usuarios.xml.php" -->
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
<xsl:param name="file1" />
<xsl:template match="/">


<table width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#666666" class="tableOscura" id="tablaResumenUsuarios">
            <tr>
              <td align="center"><h2>Nombre</h2></td>
              <td align="center"><h2>Login</h2></td>
              <td align="center"><h2>Editar</h2></td>
              <td align="center"><h2>Quitar</h2></td>
            </tr>
<xsl:for-each select="inmodb/empleados">
    <tr class="tableClara">
      <td><div align="center"><xsl:value-of select="nombre"/></div></td>
      <td><div align="center"><xsl:value-of select="usr_login"/></div></td>
      <td><div align="center"><a href="javascript:displayMenu('close');ventana('edicionSimple', '&amp;emp_id={emp_id}', '{$file1}', 'Editar Usuario');" title="editar" class="menuItem"><img src="interfaz/inmohost/images/iconos/20/editar.png" width="20" height="20" border="0" /></a></div></td>
      <td><div align="center"><a href="javascript:;" onclick="eliminar_usuario('{emp_id}');traeURL('system/formularios/panel_usuarios.php', 'contenidoMenuActual5');" title="quitar" class="menuItem"><img src="interfaz/inmohost/images/iconos/20/eliminar.png" width="20" height="20" border="0" /></a></div></td>
    </tr>
</xsl:for-each>
	</table>
</xsl:template>
</xsl:stylesheet>
