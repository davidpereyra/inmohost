<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");

	if($compartir==1){
		$estadoTitle = "Compartiendo Inmbuebles";
		$estadoImg = "../interfaz/inmohost/images/iconos/red/32/compartiendo.png";
	} else {
		$estadoTitle = "Inmuebles sin Compartir";
		$estadoImg = "../interfaz/inmohost/images/iconos/red/32/rechazar.png";
	}

?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td align="center" colspan="2" title="<?php echo $estadoTitle; ?>"><img src="<?php echo $estadoImg; ?>" width="32" height="32" align="right" /><?php echo $id_inmo; ?><hr /></td>
  </tr>
  <tr >
    <td width="50%" align="center" valign="top"><img src="<?php echo $logo; ?>" width="75" height="75" hspace="2" vspace="2" border="0" /></td>
    <td width="50%" valign="top" ><strong>Titular:</strong> <?php echo $titular; ?><br />
    <hr />
    <strong>Direcci&oacute;n:</strong> <?php echo $dir; ?><br />
    <strong>Tel&eacute;fono:</strong> <?php echo $usr_dom; ?><br />
    <strong>E-mail:</strong> <?php echo $dir; ?><br />
    <strong>Web:</strong> <?php echo $dir; ?></td></tr>
  <tr >
    <td colspan="2" align="center" valign="bottom"><br />
	<?php
	if($compartir==0){
	?>
	<a href="#" title="Compartir Inmuebles con esta Inmobiliaria"><img src="../interfaz/inmohost/images/iconos/red/32/solicitar_compartir.png" width="32" height="32" hspace="15" border="0" /></a>
	<?php
	} else {
	?>
	<a href="#" title="Rechazar Inmuebles Compartidos"><img src="../interfaz/inmohost/images/iconos/red/32/rechazar.png" width="32" height="32" hspace="15" border="0" /></a>
	<?php
	}
	?>
	</td>
  </tr>
</table>
