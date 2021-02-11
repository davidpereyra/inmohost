<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	include ("php/config.php");
	include ("php/sec_head.php");

	// cambio la hoja de estylos por defecto
	$otraCSS = "styleInterno.css";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INMOHOST</title>
<?php
	include("head.php");
?>
<!-- tinyMCE -->
<!-- VER EL TEMA DE PASAR EN FORMA DINAMICA LAS HOJA DE STYLO DE LA PLANTILLA QUE USE EN SU WEB -->
<script language="javascript" type="text/javascript" src="extra/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript" >
tinyMCE.init({
	mode : "exact",
	elements : "contenido",
	theme : "advanced",
	language : "es",
	content_css : "../interfaz/inmohost/css/styleInterno.css",
	plugins : "style,advhr,iespell,insertdatetime,preview,print,paste,nonbreaking,xhtmlxtras,directionality,noneditable",
	theme_advanced_buttons1 : "cut,copy,paste,pastetext,pasteword,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,fontsizeselect",
	theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,|,insertdate,inserttime,|,forecolor,backcolor",
	theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_path_location : "bottom",
	plugin_insertdate_dateFormat : "%Y-%m-%d",
	plugin_insertdate_timeFormat : "%H:%M:%S",
	extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]"
});
</script>
<!-- /tinyMCE -->
</head>
<body>
<table width="100%" height="420" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="19">
      <h1><?php echo $titulo; ?></h1>
    </td>
  </tr>
  <tr>
    <td>
      <form id="editor" name="editor" method="post" action="">
        <div align="center">
          <textarea id="contenido" name="contenido" style="width:550px; height:350px"></textarea>
        </div>
      </form>
    </td>
  </tr>
  <tr>
    <td height="35">
      <div align="center"><a href="javascript;" title="Actualizar"><img src="../interfaz/inmohost/images/iconos/32/actualizar.png" width="32" height="32" border="0" /><br />
      Actualizar</a></div>
    </td>
  </tr>
</table>
</body>
</html>