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
		$new_xsl->setXML(_FILE_XML_AGENDA_CITAS_EDIT."?cita_id=$cita_id&usr_id=$usr_id");
		$new_xsl->setXSL(_FILE_XSL_AGENDA_CITAS_EDIT);
		$new_xsl->addParameter("fileAgendaCitasInteresados", _FILE_AGENDA_MEN_CITA_INTERESADOS);
		$new_xsl->addParameter("usr_id", $usr_id);
		$new_xsl->addParameter("FILECALENDARIO", _FILE_PHP_MEN_CALENDARIO);
		$new_xsl->addParameter("ABMCITAS", _FILE_PHP_ABM_MENS_CITAS);
		$new_xsl->addParameter("cita_id", $cita_id);
		$new_xsl->addParameter("desdeCitas", $desdeCitas);
		$new_xsl->addParameter("desdeCitasDia", $desdeCitasDia);
		$new_xsl->addParameter("desdeCitasMes", $desdeCitasMes);
		$new_xsl->addParameter("desdeCitasAno", $desdeCitasAno);
		$new_xsl->addParameter("hastaCitas", $hastaCitas);
		$new_xsl->addParameter("hastaCitasDia", $hastaCitasDia);
		$new_xsl->addParameter("hastaCitasMes", $hastaCitasMes);
		$new_xsl->addParameter("hastaCitasAno", $hastaCitasAno);
		$new_xsl->addParameter("acc_internet", $internet);
		
		echo $new_xsl->Transform();
		?>

</div>