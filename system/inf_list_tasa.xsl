<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://localhost/inmohostV2.0/system/datos/inf_listadoResultado.xml.php?tipo_inf=tasaciones" --><!DOCTYPE xsl:stylesheet  [
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
<xsl:output method="html" encoding="iso-8859-1" doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"/>
<xsl:param name="fileCalendario"/>
<xsl:param name="destino1"/>
<xsl:param name="titulo"/>
<xsl:param name="url"/>
<xsl:param name="parametros"/>
<xsl:template match="/">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
</head>

<body>
<table width="100%" border="0" class="tableOscura" cellspacing="1" cellpadding="3">
<tr class="tableClara">
    <td colspan="5">Resultado: <xsl:value-of select="inmodb/paginacion/totalDatos"/></td>
  </tr>
<xsl:for-each select="inmodb/propiedades/columna">
 

  
  <tr class="tableClara">
    <td colspan="5"><hr/></td>
    </tr>
  <tr class="tableClara">
    <td width="18%"><p><strong>ID#:</strong></p>
      <p><xsl:value-of select="tas_id" disable-output-escaping="yes"/></p></td>
    <td width="19%"><p><strong>Tipo:</strong><xsl:value-of select="tip_desc" disable-output-escaping="yes"/></p>
      <p><strong>Cond:</strong><xsl:value-of select="con_desc" disable-output-escaping="yes"/></p></td>
    <td width="21%"><p><strong>Valor Propuesto:</strong></p>
      <p><xsl:value-of select="precio_prop" disable-output-escaping="yes"/> </p></td>
    <td width="20%"><p><strong>Valor Tasaci&oacute;n:</strong> </p>
      <p><xsl:value-of select="precio_tas" disable-output-escaping="yes"/></p></td>
    <td width="22%"><p><strong>Valor Propietario:</strong></p>
      <p><xsl:value-of select="precio_inmo" disable-output-escaping="yes"/> </p></td>
  </tr>
  <tr class="tableClara">
    <td><p><strong>Propietario:</strong></p>
      <p><xsl:value-of select="propietario" disable-output-escaping="yes"/></p></td>
    <td><p><strong>Telefono:</strong></p>
      <p><xsl:value-of select="prop_tel" disable-output-escaping="yes"/></p></td>
    <td><p><strong>Referente:</strong></p>
      <p><xsl:value-of select="referente" disable-output-escaping="yes"/></p></td>
    <td><p><strong>Fecha Tasacion:</strong> </p>
      <p><xsl:value-of select="tas_fecha" disable-output-escaping="yes"/></p></td>
    <td><p><strong>Valor Tasacion:</strong> </p>
      <p><xsl:value-of select="precio_transaccion" disable-output-escaping="yes"/></p></td>
  </tr>
  <tr class="tableClara">
    <td colspan="2"><p><strong>Domicilio:</strong></p>
      <p><xsl:value-of select="domicilio" disable-output-escaping="yes"/></p></td>
    <td colspan="2"><p><strong>Descripcion:</strong></p>
      <p><xsl:value-of select="tas_desc" disable-output-escaping="yes"/></p></td>
    <td><p><strong>Estado:</strong></p>
      <p><xsl:value-of select="estado" disable-output-escaping="yes"/></p></td>
  </tr>
</xsl:for-each>
 <tr class="tableClara">
    <td colspan="5" align="center">Paginas:
	
	
	  <xsl:for-each select="inmodb/paginacion/links">
		&#160;
		<xsl:choose>
			  <xsl:when test="sel=1">
				   
					<a href="javascript:{link}">         
						<font color="#FF9933" style="font-weight:bold">  <xsl:value-of select="nro" disable-output-escaping="yes"/>	</font>		
					</a>
				
			  </xsl:when>
			  <xsl:otherwise>
				<a href="javascript:{link}">         
						<xsl:value-of select="nro" disable-output-escaping="yes"/>		
				</a>
			  </xsl:otherwise>
			</xsl:choose>

	    </xsl:for-each></td>
    </tr>
</table>

</body>
</html>

</xsl:template>
</xsl:stylesheet>