<?php
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	include ("php/config.php");
	include ("php/sec_head.php");

	//libreria de dreamwaeaver XLST para inclucion de archivos de XML con XSLT
	include(_FILE_XSL_CLASS);
	
	// cambio la hoja de estylos por defecto
	$otraCSS = "styleInterno.css";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INMOHOST</title>
<?php
	include("head.php");
?>
<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_SWF_OBJECT; ?>"></script>

<!--MENUEXTRA-->
<script language="JavaScript1.2" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_MENUEXTRA; ?>"></script>
<?php echo "<style type=\"text/css\" media=\"screen\">
	@import url(\""._FILE_CSS_MENUEXTRA."\");
</style>\n"; ?>
<!--//MENUEXTRA-->

<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<?php 
/*		print " $MAIL_SMTP
					<br>
				$MAIL_USR<br>
				$MAIL_PASS<br>
				$from<br>
				$dem_raz<br>
				$to<br>
				$subject<br>
				$msg
		 ";
*/


		

	//	require("php/classes/class.phpmailer.php");
		
	
		
		$mail = new PHPMailer();
		
		$mail->IsSMTP(); // set mailer to use SMTP
		$mail->Host = $MAIL_SMTP;  // specify main and backup server
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = $MAIL_USR;  // SMTP username
		$mail->Password = $MAIL_PASS; // SMTP password
		
		$mail->From=$from;
		$mail->FromName=$dem_raz;
		$mail->AddAddress($to, $dem_raz);
		$mail->AddReplyTo($from);
		
		$mail->IsHTML(false);                                  // set email format to HTML
		
		$mail->Subject = $subject;
		$mail->Body= $msg;
		
		if(!$mail->Send())
		{
		   echo "No se pudo enviar el mensaje, Compruebe su conexion a internet. <p>";
		   exit;
		}
	
		echo "El mensaje fue enviado correctamente";

?>	

</td>
  </tr>
</table>
<!--TOOLTIP-->
<div id="toolTipBox">
<iframe id="iframeToolTip" name="iframeToolTip" src="about:blank" scrolling="no" frameborder="0" style="margin:0px; padding:0px; border:none;" ></iframe>
</div>
<!--FIN TOOLTIP-->
</body>
</html>