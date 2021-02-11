<?php
extract($_GET);
extract ($_POST);
extract ($_REQUEST);

include("php/config.php");
include("head.php");

$res=buscar_coincidencia($dem_id,0);

if(!$res){
	$mensaje="Esta demanda no tiene coincidencias";
}
 echo "<style type=\"text/css\" media=\"screen\">
	@import url(\""._FILE_CSS_MENUEXTRA."\");
</style>\n"; ?>
<body>
  <table width="100%" height="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableOscura">
    <tr class="tableClara">
      <td align="center" colspan="2"><h1>Demandas</h1></td>
    </tr>
       
	<?
		include(_FILE_PHP_ABM_DEM);
			
	?>
	<tr class="tableClara" height="40%">
		<td colspan="2">&nbsp;</td>
    </tr>
	<tr class="tableClara">
		<td colspan="2"><div align="center"><? 
				
				
					print "$mensaje";
						
				
				
				?></div></td>
    </tr>
    <tr class="tableClara" height="40%" >
		<td colspan="2">&nbsp;</td>
    </tr>
	
	<tr class="tableClara" height="32">
      <td colspan="2" ><div align="center">
  
  			&nbsp;&nbsp;
        <input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="parent.Windows.close('dem_coin');" tabindex="8"/>
      </div></td>
    </tr>
    </table>
   </body>



