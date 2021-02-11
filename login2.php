<?php

	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	$rutaSystema = "system/";
	$rutaInterfaz = "interfaz/";

	include ($rutaSystema."php/config.php");

	if(session_start('inmohost')){
		session_destroy();
	}

	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<title>Inmohost</title>
<head>
<?php include($rutaSystema."head.php"); ?>
</head>
<body style="margin-top: 100px;" onload="document.getElementById('user').focus(); fondoDegradado('<?php echo $_INMO_COLOR1; ?>', '<?php echo $_INMO_COLOR2; ?>');" onresize="fondoDegradado('<?php echo $_INMO_COLOR1; ?>', '<?php echo $_INMO_COLOR2; ?>');">

<form name="ingreso" id="ingreso" action="<?php print $rutaAbsoluta."system/php/sec_chequea.php?acceso_remoto=1"; ?>" method="POST">

    <div class="container-fluid">
     
     <div class="row">
     		<div class="col-md-3"></div>	
              <div class="col-md-6 col-xs-2 col-sm-2"> 
                
                <table class="table " border="0">
                	                    
                  <thead class="thead-light">
                  	<?php
                  	if($error){?>
			           	<tr>
			            	<td class="aclaraciones2"  style="border-top: none;">
		            	  		<div align="center" ><?php echo $error; ?></div>
			            	</td>
			            </tr>
              		<?}?>
                  </thead>
                  <tbody>
                  	<tr>
          				<td valign="bottom" colspan="2" align="center" style="border-top: none;"><img src="interfaz/inmohost/images/logo.png" alt="Inmohost" width="195" height="52" /></td>
        			</tr>

                    <tr>
	   	                <td width="40%" style="border-top: none;">
		                	<div align="right">
			                    <h2>Usuario:</h2>
		    	            </div>
    	        		</td>
                		<td width="60%" style="border-top: none;"><input name="usuario" type="text" class="inputForm" id="user" tabindex="1" style="width:100px; border-top:none;" onkeypress="if (event.keyCode == 13){document.ingreso.submit();}" />
                		</td>
              		</tr>
              		<tr>
		                <td  style="border-top: none;">
		                	<div align="right">
		                   		<h2>Contrase&ntilde;a:</h2>
		               	 	</div>
		                </td>
		                <td  style="border-top: none;">
		                	<input name="pass" type="password" class="inputForm" id="pass" tabindex="2" style="width:100px" onkeypress="if (event.keyCode == 13){document.ingreso.submit();}"/>
		                	<input type="hidden" name="ingreso" value="1">
		                </td>
		            </tr>
             
	              <tr>
	                <td colspan="2" align="center" style="border-top: none;"><div align="center">
	                    <input name="ingresar" type="button" class="botonForm" id="ingresar" value="Ingresar" tabindex="3" onclick="document.ingreso.submit();"  />
	                </div></td>
	              </tr>

				 </tbody>
                </table>
                
                </div>
      		</div>

    </div> 

</form>

<!--FONDO DREGRADADO-->
<div style="position: relative;">
	<div id="fondoDegradado" style="position:absolute; top:0; left:0;"></div>
	<div id="general" style="position:absolute; top:0; left:0;"></div>
</div>
<!--FIN FONDO DREGRADADO-->

</body>
</html>
