<?php

	include("system/php/config.php");
	
	extract ($_POST);
	extract ($_REQUEST);
	extract ($_GET);
	
	if (!isset($nocache)){
		$nocache = rand(0,1000);
	}
	
switch ($tip) {
    case "prp_foto":
        $url =  _FILE_XML_PRP_FOTOS."?prp_id=$prp_id&usr_id=$usr_id&mod_edit=0&$nocache";
        break;
    case "banner_principal":
        $url =  _FILE_XML_BANNER_PRINCIPAL."?usr_id=$usr_id&$nochache";
        break;
    default:
        $url =  "";
		break;
}

//echo $url;
//note that this will not follow redirects

readfile($url);

?>