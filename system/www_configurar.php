<?php 

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include ("../php/config.php");
	

?>
<form action="" style="margin:0px;">
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td colspan="2"><h1 align="left">Configurar Par&aacute;metros </h1>
      <hr /></td>
  </tr>
  <tr>
  
  <tr>
    <td colspan="2"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
      <tr>
        <td width="40%" align="center"><h2>Acci&oacute;n</h2></td>
        <td width="60%" align="center"><h2>Detalles</h2></td>
        <td width="60%" align="center">&nbsp;</td>
      </tr>
      <tr class="tableClara">
        <td><div align="right"><b>foto_pagina:</b></div></td>
        <td>
		<span id="edit_foto_pagina" onclick="editForm_campo('foto_pagina');">C:\Inetpub\wwwroot\</span>
		<input type="text" value="C:\Inetpub\wwwroot\" id="foto_pagina" name="foto_pagina" style="display:none" onblur="editForm_campo('foto_pagina');" />		</td>
        <td><div align="center"><img src="interfaz/inmohost/images/iconos/20/editar.png" width="20" height="20" align="absmiddle" /></div></td>
      </tr>
      <tr class="tableClara">
        <td><div align="right"><b>internet_host:</b></div></td>
        <td>
		<span id="edit_internet_host" onclick="editForm_campo('internet_host');">www.inmoclick.com.ar</span>
		<input type="text" value="www.inmoclick.com.ar" id="internet_host" name="internet_host" style="display:none" onblur="editForm_campo('internet_host');" />		</td>
        <td><div align="center"><img src="interfaz/inmohost/images/iconos/20/editar.png" width="20" height="20" align="absmiddle" /></div></td>
      </tr>
      <tr class="tableClara">
        <td><div align="right"><b>pagina_dir:</b></div></td>
        <td>
		<span id="edit_pagina_dir" onclick="editForm_campo('pagina_dir');">public_html</span>
		<input type="text" value="public_html" id="pagina_dir" name="pagina_dir" style="display:none" onblur="editForm_campo('pagina_dir');" />		</td>
        <td><div align="center"><img src="interfaz/inmohost/images/iconos/20/editar.png" width="20" height="20" align="absmiddle" /></div></td>
      </tr>
      <tr class="tableClara">
        <td><div align="right"><b>internet_dir:</b></div></td>
        <td>
		<span id="edit_internet_dir" onclick="editForm_campo('internet_dir');">-</span>
		<input type="text" value="" id="internet_dir" name="internet_dir" style="display:none" onblur="editForm_campo('internet_dir');" />		</td>
        <td><div align="center"><img src="interfaz/inmohost/images/iconos/20/editar.png" width="20" height="20" align="absmiddle" /></div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><a href="#" class="menuItem"><img src="interfaz/inmohost/images/iconos/32/actualizar.png" alt="Actualizar" width="32" height="32" hspace="3" vspace="5" border="0" align="absmiddle" /><br />
    Actualizar</a></div></td>
  </tr>
</table>
</form>

