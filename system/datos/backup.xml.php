<?php 
header("Content-type: application/xml");

	extract ($_GET);
	extract ($_REQUEST);
	

echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";

	include("../php/config.php");		
	
	include("../"._FILE_PHP_DIR);
	
echo "
<XML>
	";

	switch ($tipo) {
		//hacer backup	
		case 1:
			echo"
				 <fecha><![CDATA[".date("d-m-Y")."]]></fecha>
				 <archivo><![CDATA[$DOCUMENT_ROOT/inmohostV2.0/backups/INMOHOST-BKP-".date("d-m-Y").".zip]]></archivo>
				 <nombre><![CDATA[INMOHOST-BKP-".date("d-m-Y").".zip]]></nombre>
			";			

			break;
		case 2:
				$oDir = new CDir(); 
				$oDir->Read( $DOCUMENT_ROOT."/inmohostV2.0/backups/", "", true, true, true, "",".svn" ); 
				$oDir->Sort( 'Fullname', false ); 
				
				foreach( $oDir->aFiles as $aFile ) 
				{ 
				    $sFullname = $oDir->FullName($aFile); 
				   // echo "$sFullname <br>\n";
						echo "<option value='$sFullname'>$sFullname</option>";
				   
				} 		
		
		
			break;	
		default:
		
			break;
	}

echo"	
</XML>";


?>