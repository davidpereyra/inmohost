<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://localhost/inmohostV2.0/system/datos/control_inmo.xml.php?mod_tip=edit&usr_id=908" -->
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
<xsl:param name="usr_id" />

<xsl:template match="/">
	
<table width="100%" height="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableOscura">
    <tr class="tableClara">
	
         <td align="center" colspan="2"><h1>Modificar datos de la inmobiliaria</h1></td>
     </tr>
    <tr class="tableClara">
      <td align="center"><div align="right" id="titular_div">Titular:</div></td>
      <td><input type="text" name="titular" value="{inmobiliaria/titular}" tabindex="1"/></td>
    </tr>
    <tr class="tableClara">
      <td align="center"><div align="right" id="usr_raz_div">Razon Social :</div></td>
      <td><input type="text" name="usr_raz" value="{inmobiliaria/usr_raz}"/></td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right" id="usr_dom_div">Domicilio:</div></td>
		<td><input type="text" name="usr_dom" value="{inmobiliaria/usr_dom}"/></td>    
    </tr>
     <tr class="tableClara" >
      <td align="center"><div align="right" id="pro_id_div">Provincia:</div></td>
	  <td>	<span id="div_pro_id"><select name="pro_id" onchange="act_select('loc_id,loc_desc','localidades','pro_id='+this.value,'loc_id','','php/funciones','loc_desc');" class="inputForm" tabindex="2">
          <xsl:for-each select="inmobiliaria/provincias/option">
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
    <tr class="tableClara" >
      <td align="center"><div align="right" id="loc_id_div">Localidad:</div></td>
      <td><span id="div_loc_id"><select name="loc_id" class="inputForm" tabindex="3">
          <xsl:for-each select="inmobiliaria/localidades/option">
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
    <tr class="tableClara" >
      <td align="center"><div align="right" id="usr_tel_div">Tel&eacute;fono:</div></td>
      <td><input type="text" name="usr_tel" value="{inmobiliaria/usr_tel}"/></td>
    </tr>
   
    <tr class="tableClara" >
      <td align="center"><div align="right" id="usr_mail_div">Mail:</div></td>
      <td><input type="text" name="usr_mail" value="{inmobiliaria/usr_mail}"/></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right" id="web_div">P&aacute;gina Web:</div></td>
      <td><input type="text" name="web" value="{inmobiliaria/web}"/></td>
    </tr>
    <tr class="tableClara" >
      <td colspan="2" align="center">&nbsp;&nbsp;
		  <input name="Modificar" type="button" class="botonForm" id="Modificar" onclick="if(verif('usr_raz,1,Razon Social,pro_id,2,Provincia,loc_id,2,Localidad,usr_mail,1,Mail','controlInmo'))document.controlInmo.submit();" value="Modificar" />		  </td>
    </tr>
  </table>
</xsl:template>
</xsl:stylesheet>