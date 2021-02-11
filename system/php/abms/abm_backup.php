<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
$ind_error=0;
$ind_exito=0;

include(_FILE_PHP_DIR);
mysql_query("start transaction");
switch ($mod_tip)
{
	case "add":
			//hacer backup. 
	
			//print "asdfasdf".dl("php_zip.dll");			
			
			//primer backup de la base de datos
			exec("c:\wamp\mysql\bin\mysqldump -uinmo -pinmo inmodb > c:\wamp\www\inmohostV2.0\backups\dump_db.sql");
			
			//despues junto todo con las fotos
			
				$zipF = new ZipArchive();
				$filename = "$DOCUMENT_ROOT/inmohostV2.0/backups/INMOHOST-BKP-".date("d-m-Y").".zip";
			
				if ($zipF->open($filename, ZIPARCHIVE::CREATE)!==TRUE){
				   $errors="no se puede abrir $filename";
				}
				
				//agrego el dump primero
				$zipF->addFile("$DOCUMENT_ROOT/inmohostV2.0/backups/dump_db.sql","dump_db.sql");
				
				$oDir = new CDir(); 
				$oDir->Read( $DOCUMENT_ROOT."/inmohostV2.0/fotos/", "", true, true, true, "", "" ); 
				$oDir->Sort( 'Fullname', false ); 
				
				$i=0;
				foreach( $oDir->aFiles as $aFile ) 
				{ 
					
				    $sFullname = $oDir->FullName($aFile); 
				   // echo "$sFullname <br>\n";
				   	$zipF->addFile("$DOCUMENT_ROOT/inmohostV2.0/fotos/$sFullname",$sFullname);
				 	
				   	if($i>=400){
				   		$zipF->close();
				   		$i=0;
				   		if ($zipF->open($filename, ZIPARCHIVE::CREATE)!==TRUE){
						   $errors="no se puede abrir $filename";
						}
				   	}
				   	$i++;
				 } 
				$zipF->close();
				
				exec("del c:\wamp\www\inmohostV2.0\backups\dump_db.sql");

			$errors="";
			
			$resultado="Se ha realizado una copia de seguridad<br> Archivo: $DOCUMENT_ROOT./inmohostV2.0/backups/INMOHOST-BKP-".date("d-m-Y").".zip";
   /***********************************************************************************************************************
	******************************************   FIN ALTA BACKUP  ********************************************
	***********************************************************************************************************************/
   
   case "edit": 
			//restaurar Backup
   			if($archivo){
   				$zip = new ZipArchive;
				if ($zip->open("$DOCUMENT_ROOT./inmohostV2.0/backups/$archivo") === TRUE){
				    $zip->extractTo("$DOCUMENT_ROOT./inmohostV2.0/fotos/");
				    $zip->close();
				    
				    //primer backup de la base de datos
					exec("c:\wamp\mysql\bin\mysql -uinmo -pinmo inmodb < c:\wamp\www\inmohostV2.0\fotos\dump_db.sql");
					exec("del c:\wamp\www\inmohostV2.0\fotos\dump_db.sql");

					$resultado= "El sistema se restauró con éxito. Para completar la restauración cierre el sistema y vuelva a iniciar.";
				}else{
				    $errors="Error al restaurar sistema";
				}
   			}
   			
   	
   break;
}
if (!$errors)	
{
	mysql_query("commit");
}
else 
{
	mysql_query("rollback");
}


?>