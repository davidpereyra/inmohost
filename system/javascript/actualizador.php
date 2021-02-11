<?php
header("content-type: application/x-javascript");
	
	include ("../php/config.php");
	include ("../"._FILE_UTIL_MEN);
	
	echo "
function buscarServidor(propiedades){
			
			$('pieMensajes').innerHTML='"._MENS_ACT_BUSCANDO."';
			
			var myAjax = new Ajax.Request(
					
					\"system/php/funciones/scripts_ajax.php?op=1\",
					
					{method: 'get',
					parameters: \"internet_host=".$INTERNET_HOST."\",
					onSuccess: function(transport) { 
						var resultado= transport.responseText;
						if(resultado==1){
							$('pieMensajes').innerHTML='"._MENS_ACT_BUSCANDO."';
							ventana('actualizador','&propiedades='+propiedades, fileActualizador, 'Actualizando el Sistema');
						}else{
							$('pieMensajes').innerHTML='"._MENS_ACT_ERROR."';
						}
				} 
			});

}";

echo "
function actualizar(){
	
		ventana('actualizador','', fileActualizador, 'Actualizando el Sistema');
		
}";

	
?>