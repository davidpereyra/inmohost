<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://localhost/inmohostV2.0/system/datos/informes.xml.php?tipo_inf=propietarios" --><!DOCTYPE xsl:stylesheet  [
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
    <td colspan="2"><strong>Datos del propietario </strong></td>
  </tr>
  <tr class="tableClara">
    <td width="24%">Nombre: </td>
    <td width="37%"><input type="text" size="30px" name="prop_nombre"  class="inputForm"/></td>
  </tr>
  <tr class="tableClara">
    <td>Apellido:</td>
    <td><input type="text" size="30px" name="prop_apellido" class="inputForm"/></td>
  </tr>
  <tr class="tableClara">
    <td>Telefono:</td>
    <td><span>
      <select name="prop_tel" class="inputForm">
        <option value="0"> Con/Sin </option>
        <option value="2"> Sin </option>
        <option value="1"> Con </option>
      </select>
    </span></td>
  </tr>
  <tr class="tableClara">
    <td>Mail:</td>
    <td><span>
      <select name="prop_mail" class="inputForm">
        <option value="0"> Con/Sin </option>
        <option value="2"> Sin </option>
        <option value="1"> Con </option>
      </select>
    </span></td>
  </tr>
  <tr class="tableClara">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="tableClara">
    <td colspan="2"><strong>Datos del Inmueble </strong></td>
    </tr>
  <tr class="tableClara">
    <td><div id="pro_id_div">Provincias:</div></td>
    <td><span id="div_pro_id"><select name="pro_id" onchange="act_select('loc_id,loc_desc','localidades','pro_id='+this.value,'loc_id','','php/funciones','loc_desc');" class="inputForm">
          <xsl:for-each select="informes/provincias/option">
		  		<xsl:choose>
					<xsl:when test="../selected = @value">
					 <option value="{@value}" selected="selected"><xsl:value-of select="." disable-output-escaping="yes"/></option>
				  </xsl:when>
				  <xsl:otherwise>
					 <option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
				  </xsl:otherwise>
				</xsl:choose>
		  </xsl:for-each>
          </select>
          </span></td>
  </tr>
  <tr class="tableClara">
    <td><div id="loc_id_div">Localidades:</div></td>
    <td><span id="div_loc_id"><select name="loc_id"  class="inputForm">
          <xsl:for-each select="informes/localidades/option">
					 <option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
			</xsl:for-each>
          </select>
          </span></td>
  </tr>
  <tr class="tableClara">
    <td>Tipo de Construcci&#243;n: </td>
    <td><select name="tip_id" class="inputForm">
      <xsl:for-each select="informes/tipoCons/option">
        <option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
      </xsl:for-each>
    </select></td>
  </tr>
  <tr class="tableClara">
    <td>Condici&#243;n</td>
    <td><select name="con_id" class="inputForm">
      <xsl:for-each select="informes/tipoCond/option">
        <option value="{@value}"><xsl:value-of select="." disable-output-escaping="yes"/></option>
      </xsl:for-each>
    </select></td>
  </tr>
  <tr class="tableClara">
    <td>Domicilio:</td>
    <td><input type="text" size="30px" name="prp_dom" class="inputForm"/></td>
  </tr>
  <tr class="tableClara">
    <td>Barrio:</td>
    <td><input type="text" size="30px" name="prp_bar" class="inputForm"/></td>
  </tr>
  <tr class="tableClara">
    <td colspan="2"><div align="center">
      <input name="button" type="button" class="botonForm" value="Ver Informe" onclick="chequeaForm('informesPrp', '{$destino1}', '{$titulo}', '{$url}', '{$parametros}');"/>
    </div></td>
    </tr>
</table>

</body>
</html>

</xsl:template>
</xsl:stylesheet>