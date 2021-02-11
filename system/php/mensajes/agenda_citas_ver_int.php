<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");

	include("../../"._FILE_XSL_CLASS);
	
?>
<div id="toolTipContenido">
<?php

		$cita_id=str_replace('?','',$cita_id);
		$new_xsl = new MM_XSLTransform();
		$new_xsl->setXML(_FILE_AGENDA_XML_CITA_VER_INT."?cita_id=$cita_id");
		$new_xsl->setXSL("../../"._FILE_AGENDA_XSL_CITA_VER_INT);
		$new_xsl->addParameter("fileAgendaCitasInteresados", _FILE_AGENDA_MEN_CITA_INTERESADOS);
		$new_xsl->addParameter("usr_id", $usr_id);
		echo $new_xsl->Transform();
?>
</div>