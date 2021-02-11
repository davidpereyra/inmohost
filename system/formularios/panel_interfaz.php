<?php 


	include ("../php/config.php");
	include ("../php/sec_head.php");	
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
 switch ($op) {
     default:
			$titulo = "Listar Varios"; //
			$destino1 = "generico_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_GENERICO_LISTADOS;
			$parametros = "mod_edit";
         break;
         //
 }
?>
<table width="240" border="0" align="center" cellpadding="0" cellspacing="0" id="tablaMorir">
  <tr>
    <td><form id="FormPanelInterfaz" name="FormPanelInterfaz" method="post" action="">
      <table width="100%" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td width="100%">
            <h1 align="left">Interfaz</h1>
			<hr />			</td>
          </tr>
        <tr>
          <td><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableOscura">
            <tr class="tableClara">
              <td colspan="2"><h1>Colores del fondo </h1></td>
              </tr>
            <tr class="tableClara">
            <td colspan="2">&nbsp;</td>
            </tr>              
            <tr class="tableClara">
              <td width="50%"><div align="right">color principal: </div></td>
              <td width="50%"><div align="center">
                <h1><a href="javascript:;" title="seleccionar color" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_PALETA; ?>&color=<?php echo $_INMO_COLOR1; ?>&destino=color1',this)" tabindex="2"><img id="imagen_color1" src="interfaz/inmohost/images/iconos/color.gif" width="21" height="20" align="right" style="background-color:#<?php echo $_INMO_COLOR1; ?>" /></a><span id="text_color1">#<?php echo $_INMO_COLOR1; ?></span></h1>
				<input type="hidden" id="inmo_color1" name="inmo_color1" value="<?php echo $_INMO_COLOR1; ?>"/>
              </div></td>
            </tr>
            <tr class="tableClara">
              <td width="50%"><div align="right">color secundario: </div></td>
              <td width="50%"><div align="center">
                <h1><a href="javascript:;" title="seleccionar color" class="menu" onclick="position(event); toolTip('<?php echo _FILE_PHP_MEN_PALETA; ?>&color=<?php echo $_INMO_COLOR2; ?>&destino=color2',this)" tabindex="2"><img id="imagen_color2" src="interfaz/inmohost/images/iconos/color.gif" width="21" height="20" align="right" style="background-color:#<?php echo $_INMO_COLOR2; ?>" /></a><span id="text_color2">#<?php echo $_INMO_COLOR2; ?></span></h1>
				<input type="hidden" id="inmo_color2" name="inmo_color2" value="<?php echo $_INMO_COLOR2; ?>"/>
              </div></td>
            </tr>
            <tr class="tableClara">
            <td colspan="2">&nbsp;</td>
            </tr>
            <tr class="tableClara">
              <td colspan="2"><div align="center">
                <input name="Submit2" type="button" class="botonForm" value="Previsualizar" onclick="fondoDegradado(document.getElementById('inmo_color1').value, document.getElementById('inmo_color2').value);" onkeypress="fondoDegradado(document.getElementById('inmo_color1').value, document.getElementById('inmo_color2').value);" />&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="Submit" type="button" class="botonForm" value="Guardar" onclick="fondoDegradado(document.getElementById('inmo_color1').value, document.getElementById('inmo_color2').value);guardarDatosInterfaz(document.getElementById('inmo_color1').value,document.getElementById('inmo_color2').value,'<?php echo $_SESSION['usr_login'];?>'); display('menuPrincipal');" onkeypress="fondoDegradado(document.getElementById('inmo_color1').value, document.getElementById('inmo_color2').value); display('menuPrincipal');" />
          </div></td>
              </tr>
            <tr class="tableClara">
            <td colspan="2">&nbsp;</td>
            </tr>
            <tr class="tableClara">
              <td colspan="2"><div align="center">
                <input name="Submit3" type="button" class="botonForm" value="Restaurar Colores por Defecto" onclick="fondoDegradado('FF6600','000000'); guardarDatosInterfaz('FF6600','000000','<?php echo $_SESSION['usr_login'];?>'); display('menuPrincipal');" onkeypress="fondoDegradado('FF6600','000000'); guardarDatosInterfaz('FF6600','000000','<?php echo $_SESSION['usr_login'];?>'); display('menuPrincipal');"/>&nbsp;&nbsp;
          </div></td>
              </tr>            
              <tr class="tableClara">
            	<td colspan="2">&nbsp;</td>
              </tr>
          </table> 
          </td>
        </tr>
        
        <tr>
          <td><hr /></td>
        </tr>
        <!--tr>
          <td><table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableOscura">
            <tr class="tableClara">
              <td colspan="2"><h1>Efecto de Ventanas </h1></td>
            </tr>
            <tr class="tableClara">
              <td><div align="right">Abrir ventana: </div></td>
              <td><div align="center">
                  <select name="efecto1" id="efecto1">
                    <option value="Appear">Appear</option>
                    <option value="SlideDown">SlideDown</option>
                    <option value="Grow">Grow</option>
                                    </select>
              </div></td>
            </tr>
            <tr class="tableClara">
              <td><div align="right">Cerrar ventana: </div></td>
              <td><div align="center">
                  <select name="efecto2" id="efecto2">
                    <option value="Fade">Fade</option>
                    <option value="BlindDown">BlindDown</option>
                    <option value="SwitchOff">SwitchOff</option>
                    <option value="DropOut">DropOut</option>
                    <option value="Squish">Squish</option>
                    <option value="Fold">Fold</option>
                    <option value="Puff">Puff</option>
                 </select>
              </div></td>
            </tr>
            <tr class="tableClara">
              <td colspan="2"><div align="right" class="aclaraciones">
                <div align="center" class="aclaraciones">es necesario reiniciar el sistema <br />
                  para aplicar estos cambios</div>
              </div></td>
              </tr>
            
          </table></td>
        </tr>
        <tr>
          <td><div align="center">
            <input name="Submit" type="button" class="botonForm" value="Guardar" onclick="fondoDegradado(document.getElementById('inmo_color1').value, document.getElementById('inmo_color2').value);guardarDatosInterfaz(document.getElementById('inmo_color1').value,document.getElementById('inmo_color2').value,'<?php echo $_SESSION['usr_login'];?>');" onkeypress="fondoDegradado(document.getElementById('inmo_color1').value, document.getElementById('inmo_color2').value);" />
          </div></td>
        </tr-->
      </table>
        </form>
    </td>
  </tr>
</table>


