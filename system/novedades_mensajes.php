<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("php/config.php");
	include ("php/sec_head.php");
	
	// cambio la hoja de estylos por defecto
	$otraCSS = "styleInterno.css";
	include("head.php");
?>
	
	<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_TOOLTIP; ?>"></script>
	<div id="toolTipContenido" >
	<?php echo "<style type=\"text/css\" media=\"screen\">
	@import url(\""._FILE_CSS_MENUEXTRA."\");
	</style>\n"; 
	?>
<body>
<script language="javascript">
	parent.ventana('agenda_resumen','', '<?php echo _FILE_PHP_RESUMEN_PRINCIPAL; ?>', 'Resumen de movimentos');
</script>
  <table width="100%" height="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableOscura">
    <tr class="tableClara">
      <td align="center" colspan="2"><h1>Novedades</h1></td>
    </tr>
       
	<?
		include(_FILE_PHP_ABM_NOV);
			
	?>
	<tr class="tableClara" height="40%">
		<td colspan="2">&nbsp;</td>
    </tr>
	<tr class="tableClara">
		<td colspan="2"><div align="center"><? 
				
				if($errors){
					
					for ($i=0; $i<count($errors);$i++)
						{
							echo "".$errors[$i]."<br/>";
						}
				}else{
					print "$mensaje";
						
				}
				
				?></div></td>
    </tr>
    <tr class="tableClara" height="40%" >
		<td colspan="2">&nbsp;</td>
    </tr>
	
	<tr class="tableClara" height="32">
      <td colspan="2" ><div align="center">
  
  			&nbsp;&nbsp;
        <input name="Aceptar" type="button" class="botonForm" value="Aceptar" onClick="parent.Windows.close('alt_nov');" tabindex="8"/>
      </div></td>
    </tr>
    </table>
   </body>