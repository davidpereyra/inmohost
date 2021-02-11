<?xml version="1.0" encoding="iso-8859-1"?><!-- DWXMLSource="http://atilio/inmohostV2.0/system/datos/send_mail.xml.php?&chequea=dom,1,prp_id,1&tipoForm=buscar&orden=1&usr_id=886&mod_tip=edit&mod_edit=1&usr_id=886&usr_id=908&tip_id=0&con_id=0&pes_ent=&pes_y=&dol_ent=&dol_y=&dom=&prp_inmoID=908&prp_id=1" -->
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
<xsl:param name="prp_fotosXML" />

<xsl:template match="/">

  <!-- ARMO EL FORMULARIO DE ENVÍO -->
  <form action="send_mail2.php" method="post" enctype="multipart/form-data" name="send_mail_form" id="send_mail_form">
  <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
  
  	<tr class="tr1">
          <td colspan="4"><h1>&nbsp;&nbsp;&nbsp;&nbsp;Formulario</h1></td>
        </tr>
     <tr class="tableClara">
          <td width="20%"><div id="from_div"><strong>De:</strong></div></td>
          <td> <input type="text" name="from" size="60" value="{XMLTEXTO/from}"/>   </td>
     </tr>  
     <tr class="tableClara">
          <td width="20%"><div id="to_div"><strong>Para:</strong></div></td>
          <td> <input type="text" name="to" size="60" value="{XMLTEXTO/to}"/>   </td>
      </tr>  
      
      <tr class="tableClara">
          <td width="20%"><div id="subject_div"><strong>Asunto:</strong></div></td>
          <td> <input type="text" name="subject" size="60"  value="{XMLTEXTO/subject}"/>  </td>
        </tr>  
      <tr class="tableClara">
          <td colspan="2"><div id="msg_div"><strong>Mensaje:</strong></div></td>
         </tr>
        <tr class="tableClara">  
          <td colspan="2">  <textarea cols="75" rows="12" name="msg"><xsl:value-of select="XMLTEXTO/msg"/> </textarea> </td>
        </tr>
         <tr class="tableClara">  
         	<td colspan="2" align="right">
         		<input type="hidden" name="dem_raz" value="{XMLTEXTO/dem_raz}"/>
         
		        <input name="enviar" type="button" class="botonForm" value="Enviar" onclick="javascript:document.send_mail_form.submit();"/>
        	</td>
        </tr>
  </table>
  	
  </form>

</xsl:template>
</xsl:stylesheet> 