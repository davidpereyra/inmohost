<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//libreria de dreamwaeaver XLST para inclucion de archivos de XML con XSLT
	include("php/classes/MM_XSLTransform.class.php");
if(isset($xml) && isset($xsl)){
		

		$Item_xsl = new MM_XSLTransform();
		
		if($id || $file){
			$xml = $xml."?";
			if($id){
				$xml = $xml."id=".$id;
				$Item_xsl->addParameter("id", $id);
			}
			if(count($file)){

				for($i=0; $i < count($file); $i++){
					$name = "file".$i;
					$Item_xsl->addParameter($name, $file[$i]);
				}

			}
		}
		
		if($usr_login){
			$xml.="&usr_login=$usr_login";
			$Item_xsl->addParameter("usr_login",$usr_login);
		}	
		if($us_id){
			$xml.="&us_id=$us_id";
		}
		
		$Item_xsl->setXML($xml);
		$Item_xsl->setXSL($xsl);
		echo $Item_xsl->Transform();
		
} else {

	echo "error no hay parametros definidos";
}

?>