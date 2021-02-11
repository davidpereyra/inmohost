<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://localhost/inmohostV2.0/system/datos/control_sectores.xml.php?mod_tip=edit&sec_id=1" -->
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
<xsl:param name="mod_tip" />
<xsl:template match="/">
	
<table width="100%" height="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableOscura">
    <tr class="tableClara">
	<xsl:choose>
      <xsl:when test="$mod_tip=&apos;add&apos;">
         <td align="center" colspan="2"><h1>Agregar Sectores</h1></td>
      </xsl:when>
      <xsl:otherwise>
       <td align="center" colspan="2"><h1>Editar Sectores</h1></td>
      </xsl:otherwise>
    </xsl:choose>
    </tr>
    <tr class="tableClara">
      <td align="center"><div align="right" id="sec_desc_div">Descripcion:</div></td>
      <td><input type="text" name="sec_desc" value="{sectores/sec_desc}"/></td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right" id="etiqueta_org_div">Etiqueta Organigrama:</div></td>
		<td><input type="text" name="etiqueta_org" value="{sectores/etiqueta_org}"/></td>    
    </tr>
    
    <tr class="tableClara" >
      <td align="center"><div align="right" id="sec_mostrar_div">Sec Mostrar:</div></td>
      <td>

	  		<xsl:choose>
              <xsl:when test="sectores/sec_mostrar='1'">
                <input type="checkbox" name="sec_mostrar" value="1" checked="true"/>
              </xsl:when>
              <xsl:otherwise>
               <input type="checkbox" name="sec_mostrar"/>
              </xsl:otherwise>
            </xsl:choose>
	  </td>
    </tr>
    <tr class="tableClara" >
      <td colspan="2" align="center"><input name="Cerrar" type="button" class="botonForm" id="cerrar" onclick="parent.Windows.close('edicionSimple')" value="Cerrar" />
        &nbsp;&nbsp;
		<xsl:choose>
			<xsl:when test="$mod_tip=&apos;add&apos;">
				  <input name="Agregar" type="button" class="botonForm" id="agregar" onclick="if(verif('sec_desc,1,Descripcion','controlSectores'))document.controlSectores.submit();" value="Agregar" />        
			</xsl:when>
			<xsl:otherwise>
				  <input name="Modificar" type="button" class="botonForm" id="Modificar" onclick="if(verif('sec_desc,1,Descripcion','controlSectores'))document.controlSectores.submit();" value="Modificar" /> 		
	 	    </xsl:otherwise>
    	</xsl:choose>
		</td>
    </tr>
  </table>
</xsl:template>
</xsl:stylesheet>