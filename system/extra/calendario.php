<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	include ("../php/config.php");

if($acc_internet){

  //$ruta_swf="http://".$dominio_local."/inmohostV2.0/system/extra/calendario.swf";
  $ruta_swf="http://".$dominio_local."/inmohostV2.0/system/extra/calendario_form.php";

}else{
	
  //$ruta_swf="./extra/calendario.swf";
  $ruta_swf="./extra/calendario_form.php";

  
}

?>
<div id="toolTipContenido">
  <table width="100%" height="100%" border="0" align="center" cellpadding="1" cellspacing="1" class="tableClara">
    <tr>
      <td align="center"><div id="calendarioSWF">
        <div align="center">
          <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="210" height="215">
            <param name="movie" value="<?php echo $ruta_swf;?>?destino=<?php echo $destino; ?>&prp_id=<?php echo $prp_id; ?>" />
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <!--<iframe src="https://calendar.google.com/calendar/embed?src=webdeveloperdavid%40gmail.com&ctz=America%2FArgentina%2FBuenos_Aires" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>-->
            <iframe src="<?php echo $ruta_swf; ?>" style="border: 0" width="200" height="200" frameborder="0" scrolling="no"></iframe>
            
           
            <!--<embed src="<?php //echo $ruta_swf; ?>?destino=<?php //echo $destino; ?>&prp_id=<?php //echo $prp_id; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="210" height="215"></embed>-->
          </object>
          <br />
        </div>
      </div></td>
    </tr>
    <tr class="tableClara">
      <td align="center"><input name="Submit" type="button" class="botonForm" value="Cerrar" onclick="hideToolTip();" style="height:16px;" />asdas</td>
    </tr>
  </table>
</div>

<!--<script type="text/JavaScript">
	var so1 = new SWFObject("http://localhost/inmohostv2/system/extra/calendario.swf", "_calendarioSWF", "210", "215", "8", "#FFFFFF");
	so1.addParam("scale", "noborder");
	so1.addParam("quality", "high");
	so1.addParam("wmode", "opaque");
	so1.addVariable("destino", "fechainicio");
	so1.write("calendarioSWF");
</script>-->
