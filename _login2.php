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
<title>Inmohost</title>
<head>
<?php include($rutaSystema."head.php"); ?>
</head>
<body onload="document.getElementById('user').focus(); fondoDegradado('<?php echo $_INMO_COLOR1; ?>', '<?php echo $_INMO_COLOR2; ?>');" onresize="fondoDegradado('<?php echo $_INMO_COLOR1; ?>', '<?php echo $_INMO_COLOR2; ?>');">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>      
   
    <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td valign="bottom"><img src="interfaz/inmohost/images/logo.png" alt="Inmohost" width="295" height="72" /></td>
        </tr>
<?php if($error){?>
		           <tr>
		            <td class="aclaraciones2">
	            	  <div align="center" ><?php echo $error; ?></div>
		            </td>
		            
		          </tr>
              <?
              }
?>
        <tr>
          <td><form id="ingreso" name="ingreso" method="post" action="<?php print $rutaAbsoluta."system/php/sec_chequea.php?acceso_remoto=1"; ?>">
            <table width="200" border="0" align="center" cellpadding="0" cellspacing="5">
         
              <tr>
                <td width="50%">
                	<div align="right">
	                    <h2>usuario:</h2>
    	            </div>
    	        </td>
                <td width="50%"><input name="usuario" type="text" class="inputForm" id="user" tabindex="1" style="width:100px" onkeypress="if (event.keyCode == 13){document.ingreso.submit();}" /></td>
              </tr>
              <tr>
                <td>
                	<div align="right">
                   		<h2>contrase&ntilde;a:</h2>
               	 	</div>
                </td>
                <td>
                	<input name="pass" type="password" class="inputForm" id="pass" tabindex="2" style="width:100px" onkeypress="if (event.keyCode == 13){document.ingreso.submit();}"/>
                	<input type="hidden" name="ingreso" value="1">
                </td>
              </tr>
             
              <tr>
                <td colspan="2"><div align="center">
                    <input name="cerra" type="button" class="botonForm" id="cerra" value="Cerrar" tabindex="3" onclick="window.close();" />                    
					&nbsp;&nbsp;&nbsp;&nbsp;
                    <input name="ingresar" type="button" class="botonForm" id="ingresar" value="Ingresar" tabindex="3" onclick="document.ingreso.submit();"  />
                </div></td>
              </tr>
            </table>
          </form></td>
        </tr>
      </table></td></tr>
</table>

<!--FONDO DREGRADADO-->
<div style="position: relative;">
	<div id="fondoDegradado" style="position:absolute; top:0; left:0;"></div>
	<div id="general" style="position:absolute; top:0; left:0;"></div>
</div>
<!--FIN FONDO DREGRADADO-->

</body>
</html>
