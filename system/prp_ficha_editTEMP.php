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
<?php if($mod_tip != 'add'){ ?>
<!--MENUEXTRA-->
<script language="JavaScript1.2" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_MENUEXTRA; ?>"></script>
<?php echo "<style type=\"text/css\" media=\"screen\">
	@import url(\""._FILE_CSS_MENUEXTRA."\");
</style>\n"; ?>
<!--//MENUEXTRA-->
<?php } ?>

<script language="javascript" type="text/javascript" src="<?php echo _FILE_JAVASCRIPT_EDITFORM; ?>"></script>

</head>
<body onload="">

<?php if($mod_tip != 'add') {

require (_FILE_MENU_PRP);

?>
<!--fin-->
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr class="tr1">
    <td width="20%" class="tr1B"><a href="javascript:;" onmouseout="MM_menuStartTimeout(1000);" onmouseover="MM_menuShowMenu('MMMenuContainer0106200116_0', 'MMMenu0106200116_0',1,31,'menu_r2_c2');"><img src="../interfaz/inmohost/images/iconos/20/inmueble.png" alt="MENU" width="20" height="20" hspace="3" align="left" />&nbsp;&nbsp;menu</a></td>
    <td width="40%"><div align="center">
      <h3>Publicaci&oacute;n: <xsl:value-of select="prp_alta"/></h3>
    </div></td>
    <td width="40%"><div align="center">
      <h3>Modificaci&oacute;n: <xsl:value-of select="prp_mod"/></h3>
    </div></td>
  </tr>
</table>
<?php } ?>

<table width="99%" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr class="tableClara">
    <td>
      <form action="" method="post" enctype="multipart/form-data" name="prp_edit_form" id="prp_edit_form">
        <input type="hidden" name="usr_id" value="589" />
        <input type="hidden" name="prp_mod" value="2007-02-13" />
        <input type="hidden" name="usuario" value="g" />
        <input type="hidden" name="publica" value="1" />
        <input type="hidden" name="pal" value="0" />
        <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
          <tr class="tr1">
            <td colspan="4">
              <h1>&nbsp;&nbsp;&nbsp;&nbsp;Ubicaci&oacute;n</h1>
            </td>
          </tr>
          <tr class="tableClara">
            <td width="20%">
              <div align="right">Pa&iacute;s:</div>
            </td>
            <td width="30%" >
              <select name="pai_id" onchange="" class="inputForm" tabindex="1">
                <option value="0">Pa&iacute;s</option>
                <option value="1" selected="selected">Argentina</option>
                <option value="2">Chile</option>
                <option value="3">Uruguay</option>
            </select><span class="destacado2">*</span>            </td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Provincias:</div>
            </td>
            <td>
              <select name="pro_id" onchange="" class="inputForm" tabindex="2">
                <option value="0">Provincias</option>
                <option value="6">Buenos Aires</option>
                <option value="1">Capital Federal</option>
                <option value="16">Catamarca</option>
                <option value="10">Chaco</option>
                <option value="25">Chubut</option>
                <option value="19">Cordoba</option>
                <option value="11">Corrientes</option>
                <option value="5">Costa Atl&aacute;ntica</option>
                <option value="13">Entre R&iacute;os</option>
                <option value="9">Formosa</option>
                <option value="7">Jujuy</option>
                <option value="23">La Pampa</option>
                <option value="18">La Rioja</option>
                <option value="21" selected="selected">Mendoza</option>
                <option value="12">Misiones</option>
                <option value="24">Neuquen</option>
                <option value="28">R&iacute;o Negro</option>
                <option value="8">Salta</option>
                <option value="20">San Juan</option>
                <option value="22">San Luis</option>
                <option value="26">Santa Cruz</option>
                <option value="17">Santa Fe</option>
                <option value="15">Sgo. del Estero</option>
                <option value="27">Tierra del Fuego</option>
                <option value="14">Tucuman</option>
                <option value="2">Zona Norte</option>
                <option value="4">Zona Oeste</option>
                <option value="3">Zona Sur</option>
              </select>
            <span class="destacado2">*</span>            </td>
            <td width="20%" >
              <div align="right">Localidades:</div>
            </td>
            <td width="30%" >
              <select name="loc_id" class="inputForm" tabindex="3">
                <option value="0">Localidades</option>
                <option value="502">Chacras de Coria</option>
                <option value="19">Ciudad</option>
                <option value="3">General alvear</option>
                <option value="1">Godoy Cruz</option>
                <option value="2">Guaymallen</option>
                <option value="14">Junin</option>
                <option value="15">La Paz</option>
                <option value="6">Las Heras</option>
                <option value="9">Lavalle</option>
                <option value="8">Luj&aacute;n</option>
                <option value="7">Maip&uacute;</option>
                <option value="18">Malargue</option>
                <option value="586">Palmira</option>
                <option value="514">Rivadavia</option>
                <option value="13">San Carlos</option>
                <option value="10">San Mart&iacute;n</option>
                <option value="11">San Rafael</option>
                <option value="12">Santa Rosa</option>
                <option value="595">Sin Localidad</option>
                <option value="16">Tunuyan</option>
                <option value="17">Tupungato</option>
                <option value="594">Vistalba</option>
              </select>
            <span class="destacado2">*</span>            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Barrio:</div>
            </td>
            <td>
              <input style="width:150px;" type="text" name="prp_bar" value="" class="inputForm" tabindex="4"/>
            </td>
            <td>
              <div align="right">Domicilio:</div>
            </td>
            <td>
              <input type="text" name="prp_dom" value="" style="width:150px;" class="inputForm" tabindex="5"/>
            </td>
          </tr>
          <input type="hidden" name="min" value="" />
          <input type="hidden" name="max" value="" />
          <input type="hidden" name="usuario" value="g" />
          <tr class="tr1">
            <td colspan="4">
              
              <h1>&nbsp;&nbsp;&nbsp;&nbsp;Datos Propiedad</h1>
            </td>
          </tr>
          <tr class="tableClara">
          	<td>Publicación Anónima</td>
          	<td colspan=3> 
          			<input type='checkbox' name='prp_anonimo' value='1'>
          	</td>
          </tr>
          
          
          <tr class="tableClara">
            <td>
              <div align="right">Tipo Construcci&oacute;n:</div>
            </td>
            <td>
              <select name="tip_id" class="inputForm" tabindex="6">
                <option value="0">Tipo Const.</option>
                <option value="14">Bodega</option>
                <option value="27">Bodega Con Vi&curren;edo</option>
                <option value="7">Caba&ntilde;a</option>
                <option value="3">Campo</option>
                <option value="1">Casa</option>
                <option value="13">Cochera</option>
                <option value="26">Condominio</option>
                <option value="5">Departamento</option>
                <option value="21">D&uacute;plex</option>
                <option value="2">Edificio</option>
                <option value="22">Est. Servicio</option>
                <option value="18">Fabrica</option>
                <option value="23">Fdo. Comercio</option>
                <option value="16">Finca</option>
                <option value="25">Fraccionamiento</option>
                <option value="8">Galp&oacute;n</option>
                <option value="9">Hotel</option>
                <option value="19">Industria</option>
                <option value="10">Local</option>
                <option value="4">Loft</option>
                <option value="6">Lote</option>
                <option value="24">Loteo</option>
                <option value="11">Oficina</option>
                <option value="17">Playa Estac.</option>
                <option value="12">Quinta</option>
                <option value="28">Vi&curren;edo</option>
              </select>
              <!--  <a href='alta_1.php'>[Detallar Construccion]</a> -->
              <span class="destacado2">*</span></td>
            <td>Condici&oacute;n:</td>
            <td >
              <select name="con_id" class="inputForm" tabindex="7">
                <option value="0">Condici&oacute;n</option>
                <option value="3">Alq. Temporario</option>
                <option value="2">Alquiler</option>
                <option value="4">Permuta</option>
                <option value="1">Venta</option>
              </select>
            <span class="destacado2">*</span>            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Orientaci&oacute;n:</div>
            </td>
            <td>
              <select name="ori_id" class="inputForm" tabindex="8">
                <option value="0">Orientaci&oacute;n</option>
                <option value="1">Norte</option>
                <option value="2">Sur</option>
                <option value="3">Este</option>
                <option value="4">Oeste</option>
                <option value="5">Noroe</option>
                <option value="6">Nores</option>
                <option value="7">Sudoe</option>
                <option value="8">Sudes</option>
              </select>
            </td>
            <td>
              <div align="right">P&uacute;blico:</div>
            </td>
            <td> 
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="60%">
                    <div align="right"><b>Web Propia:</b></div>
                  </td>
                  <td width="40%">
                    <input type="checkbox" name="publica2" checked="checked" class="inputForm" tabindex="9"/>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div align="right"><b>Inmoclick:</b></div>
                  </td>
                  <td>
                    <input type="checkbox" name="mos_por_12" checked="checked" class="inputForm" tabindex="10"/>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div align="right"><b>C.I.M.:</b></div>
                  </td>
                  <td>
                    <input type="checkbox" name="mos_por_22" checked="checked" class="inputForm" tabindex="11"/>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div align="right"><b>C.C.P.I.M.:</b></div>
                  </td>
                  <td>
                    <input type="checkbox" name="mos_por_32" checked="checked" class="inputForm" tabindex="12"/>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Valor Alta ($):</div>
            </td>
            <td>
              <input type="text" style="width:150px;" name="prp_pre" value="" class="inputForm" tabindex="13"/>
            <span class="destacado2">*</span>            </td>
            <td>Valor Alta (U$S):</td>
            <td>
              <input type="text" style="width:150px;" name="prp_pre_dol" value="" class="inputForm" tabindex="14"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Valor Tasaci&oacute;n:</div>
            </td>
            <td>
              <input type="text" style="width:150px;" name="precio_inmo" value="" class="inputForm" tabindex="15"/>
            </td>
            <td>Valor Propietario:</td>
            <td>
              <input type="text" style="width:150px;" name="precio_prop" value="" class="inputForm" tabindex="16"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Valor Transacci&oacute;n:</div>
            </td>
            <td>
              <input type="text" style="width:150px;" name="precio_trans" value="" class="inputForm" tabindex="17"/>
            </td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Descripci&oacute;n:</div>
            </td>
            <td colspan="3">
              <textarea name="prp_desc" rows="4" style="width:500px;" class="inputForm" tabindex="18"></textarea>
            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Nota:</div>
            </td>
            <td colspan="3">
              <textarea name="prp_nota" rows="4" style="width:500px;" class="inputForm" tabindex="19"></textarea>
            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Servicios:</div>
            </td>
            <td colspan="3">
              <table width="100%" border="0" cellpadding="1" cellspacing="1" class="tableOscura">
                <input type="hidden" name="num_ser" value="20" />
                <tr class="tableClara"></tr>
                <tr class="tableClara">
                  <td width="20%" >
                    <div align="right">Sup. total:</div>
                  </td>
                  <td width="30%" >
                    <input name="valor0" type="text" class="inputForm" value='' style="width:100px;" tabindex="20"/>
                    <input type="hidden" name="ser_id0" value="2" />
                  </td>
                  <td width="20%" >
                    <div align="right">Dormitorios:</div>
                  </td>
                  <td width="30%" >
                    <input type="text" name="valor1" value='' class="inputForm" style="width:100px;" tabindex="21"/>
                    <input type="hidden" name="ser_id1" value="3" />
                  </td>
                </tr>
                <tr class="tableClara">
                  <td >
                    <div align="right">Cochera: </div>
                  </td>
                  <td >
                    <select name="desde_2" class="inputForm" tabindex="22">
                      <option value="Indistinto"> Indistinto</option>
                      <option value="Garage"> Garage</option>
                      <option value="Garage/Cochera"> Garage/Cochera</option>
                      <option value="Garage Doble"> Garage Doble</option>
                      <option value="Cochera Pasante"> Cochera Pasante</option>
                      <option value="Sin Cochera"> Sin Cochera</option>
                    </select>
                    <input type="hidden" name="ser_id2" value="4" />
                  </td>
                  <td>
                    <div align="right">Sup cubierta:</div>
                  </td>
                  <td >
                    <input type="text" name="valor3" value='' class="inputForm" style="width:100px;" tabindex="23"/>
                    <input type="hidden" name="ser_id3" value="7" />
                  </td>
                </tr>
                <tr class="tableClara">
                  <td >
                    <div align="right">Ba&ntilde;os:</div>
                  </td>
                  <td >
                    <input name="valor4" type="text" class="inputForm" value='' style="width:100px;" tabindex="24"/>
                    <input type="hidden" name="ser_id4" value="8" />
                  </td>
                  <td >
                    <div align="right">Piscina:</div>
                  </td>
                  <td >
                    <select name="desde_5" class="inputForm" tabindex="25">
                      <option value="Indistinto">Indistinto</option>
                      <option value="No">No</option>
                      <option value="Si">Si</option>
                    </select>
                    <input type="hidden" name="ser_id5" value="9" />
                  </td>
                </tr>
                <tr class="tableClara">
                  <td >
                    <div align="right">Calefacci&oacute;n Central:</div>
                  </td>
                  <td >
                    <select name="desde_6" class="inputForm" tabindex="26">
                      <option value="Indistinto">Indistinto</option>
                      <option value="No">No</option>
                      <option value="Si">Si</option>
                    </select>
                    <input type="hidden" name="ser_id6" value="10" />
                  </td>
                  <td >
                    <div align="right">Zona Escolar:</div>
                  </td>
                  <td >
                    <select name="desde_7" class="inputForm" tabindex="27">
                      <option value="Indistinto">Indistinto</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                    <input type="hidden" name="ser_id7" value="11" />
                  </td>
                </tr>
                <tr class="tableClara">
                  <td >
                    <div align="right">Luz El&eacute;ctrica:</div>
                  </td>
                  <td >
                    <select name="desde_8" class="inputForm" tabindex="28">
                      <option value="Indistinto">Indistinto</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                    <input type="hidden" name="ser_id8" value="12" />
                  </td>
                  <td >
                    <div align="right">Plantas:</div>
                  </td>
                  <td >
                    <input type="text" name="valor9" value='' class="inputForm" style="width:100px;" tabindex="29"/>
                    <input type="hidden" name="ser_id9" value="13" />
                  </td>
                </tr>
                <tr class="tableClara">
                  <td >
                    <div align="right">Agua:</div>
                  </td>
                  <td >
                    <select name="desde_10" class="inputForm" tabindex="30">
                      <option value="Indistinto">Indistinto</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                    <input type="hidden" name="ser_id10" value="14" />
                  </td>
                  <td >
                    <div align="right">Gas:</div>
                  </td>
                  <td >
                    <select name="desde_11" class="inputForm" tabindex="31">
                      <option value="Indistinto">Indistinto</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                    <input type="hidden" name="ser_id11" value="15" />
                  </td>
                </tr>
                <tr class="tableClara">
                  <td >
                    <div align="right">Tel&eacute;fono:</div>
                  </td>
                  <td >
                    <select name="desde_12" class="inputForm" tabindex="32">
                      <option value="Indistinto">Indistinto</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                    <input type="hidden" name="ser_id12" value="16" />
                  </td>
                  <td >
                    <div align="right">Antig&uuml;edad:</div>
                  </td>
                  <td >
                    <input type="text" name="valor13" value='' class="inputForm" style="width:100px;" tabindex="33"/>
                    <input type="hidden" name="ser_id13" value="17" />
                  </td>
                </tr>
                <tr class="tableClara">
                  <td >
                    <div align="right">Cloacas:</div>
                  </td>
                  <td >
                    <select name="desde_14" class="inputForm" tabindex="34">
                      <option value="Indistinto">Indistinto</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                    <input type="hidden" name="ser_id14" value="18" />
                  </td>
                  <td >
                    <div align="right">Internet:</div>
                  </td>
                  <td >
                    <select name="desde_15" class="inputForm" tabindex="35">
                      <option value="Indistinto">Indistinto</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                    <input type="hidden" name="ser_id15" value="19" />
                  </td>
                </tr>
                <tr class="tableClara">
                  <td >
                    <div align="right">Barrio Privado:</div>
                  </td>
                  <td >
                    <input name="valor16" type="text" class="inputForm" value='' style="width:100px;" tabindex="36"/>
                    <input type="hidden" name="ser_id16" value="20" />
                  </td>
                  <td >
                    <div align="right">Cable TV:</div>
                  </td>
                  <td >
                    <select name="desde_17" class="inputForm" tabindex="37">
                      <option value="Indistinto">Indistinto</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                    <input type="hidden" name="ser_id17" value="21" />
                  </td>
                </tr>
                <tr class="tableClara">
                  <td >
                    <div align="right">Aire Acondicionado:</div>
                  </td>
                  <td >
                    <select name="desde_18" class="inputForm" tabindex="38">
                      <option value="Indistinto">Indistinto</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                    <input type="hidden" name="ser_id18" value="22" />
                  </td>
                  <td >
                    <div align="right">Amoblado/a:</div>
                  </td>
                  <td >
                    <select name="desde_19" class="inputForm" tabindex="39">
                      <option value="Indistinto">Indistinto</option>
                      <option value="Si">Si</option>
                      <option value="No">No</option>
                    </select>
                    <input type="hidden" name="ser_id19" value="23" />
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Texto para publicar en Medios Publicitarios:</div>
            </td>
            <td colspan="3">
              <textarea name="prp_pub" rows="4" class="inputForm" id="prp_pub" style="width:500px;" tabindex="40"></textarea>
            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Referente: </div>
            </td>
            <td>
              <select name="emp_id" class="inputForm" tabindex="41">
                <option value="0">Referentes</option>
                <option value="1"> </option>
              </select>
            </td>
            <td>
              <div align="right">N&deg; de Llave:</div>
            </td>
            <td>
              <input name="prp_llave" type="text" class="inputForm" style="width:120px;" value="" tabindex="42" />
            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">N&deg; Tasaci&oacute;n:</div>
            </td>
            <td>
              <input name="prp_tas" type="text" class="inputForm"  style="width:120px;" value="" tabindex="43" />
            </td>
            <td>
              <div align="right">Matr&iacute;cula:</div>
            </td>
            <td>
              <input name="prp_insc_dom" type="text" class="inputForm" style="width:120px;" value="" tabindex="44" />
            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Cartel:</div>
            </td>
            <td> SI
              <input name="prp_cartel" type="radio" class="inputForm"  value="1" tabindex="45"/>
              NO
              <input name="prp_cartel" type="radio" class="inputForm" value="0" checked="checked" tabindex="46"/>
            </td>
            <td>
              <div align="right">Autorizada:</div>
            </td>
            <td> SI
              <input name="prp_aut" type="radio" class="inputForm" value="1" tabindex="47"/>
              NO
              <input name="prp_aut" type="radio" class="inputForm" value="0" checked="checked" tabindex="48"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Otros Servicios:</div>
            </td>
            <td colspan="3">
              <textarea name="prp_servicios" rows="4" class="inputForm" style="width:500px;" tabindex="49"></textarea>
            </td>
          </tr>
          <tr class="tr1">
            <td colspan="4" >
              
              <h1>&nbsp;&nbsp;&nbsp;&nbsp;Datos del Propietario</h1>
            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Nombre:</div>
            </td>
            <td>
              <input name="prop_nombre" type="text" class="inputForm"  style="width:150px;" value="" tabindex="50"/>
            <span class="destacado2">*</span></td>
            <td>
              <div align="right">Apellido:</div>
            </td>
            <td>
              <input type="text"  style="width:150px;" name="prop_apellido" value="" class="inputForm" tabindex="51"/>
            <span class="destacado2">*</span></td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Telefono:</div>
            </td>
            <td>
              <input name="prop_tel" type="text" class="inputForm"  style="width:150px;" value="" tabindex="52" />
            </td>
            <td>
              <div align="right">Domicilio:</div>
            </td>
            <td>
              <input type="text" style="width:150px;" name="prop_dom"  value="" class="inputForm" tabindex="53"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">E-mail:</div>
            </td>
            <td>
              <input name="prop_mail" type="text" class="inputForm"  style="width:150px;" value="" tabindex="54" />
            </td>
            <td>&nbsp;</td>
            <td>&nbsp; </td>
          </tr>
          <tr class="tableClara">
            <td>
              <div align="right">Nota:</div>
            </td>
            <td colspan="3">
              <textarea name="prop_nota" rows="4" class="inputForm" style="width:500px;" tabindex="55"></textarea>
            </td>
          </tr>
          <tr class="tr1">
            <td colspan="4" >
              
              <h1>&nbsp;&nbsp;&nbsp;&nbsp;Im&aacute;genes</h1>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 1:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo1" class="inputForm" tabindex="56"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc1'  style="width:150px;" class="inputForm" tabindex="57"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 2:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo2" class="inputForm" tabindex="58"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc2'  style="width:150px;" class="inputForm" tabindex="59"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 3:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo3" class="inputForm" tabindex="60"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc3'  style="width:150px;" class="inputForm" tabindex="61"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 4:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo4" class="inputForm" tabindex="62"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc4'  style="width:150px;" class="inputForm" tabindex="63"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 5:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo5" class="inputForm" tabindex="64"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc5'  style="width:150px;" class="inputForm" tabindex="65"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 6:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo6" class="inputForm" tabindex="66"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc6'  style="width:150px;" class="inputForm" tabindex="67"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 7:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo7" class="inputForm" tabindex="68"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc7'  style="width:150px;" class="inputForm" tabindex="69"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 8:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo8" class="inputForm"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc8'  style="width:150px;" class="inputForm"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 9:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo9" class="inputForm"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc9'  style="width:150px;" class="inputForm"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 10:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo10" class="inputForm"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc10'  style="width:150px;" class="inputForm"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 11:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo11" class="inputForm"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc11'  style="width:150px;" class="inputForm"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 12:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo12" class="inputForm"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc12' style="width:150px;" class="inputForm"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 13:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo13" class="inputForm"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc13' style="width:150px;" class="inputForm"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 14:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo14" class="inputForm"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc14' style="width:150px;" class="inputForm"/>
            </td>
          </tr>
          <tr class="tableClara">
            <td >
              <div align="right">Foto 15:</div>
            </td>
            <td colspan='3'>
              <input type="file" name="fo15" class="inputForm"/>
              Descripci&oacute;n:
              <input type='text' name='fo_desc15' style="width:150px;" class="inputForm"/>
            </td>
          </tr>
          <input type="hidden" name="vect_fotos" value="x1x2x3x4x5x6x7x8x9x10x11x12x13x14x15" />
          <input type="hidden" name="cant_fotos" value="15" />
        </table>
        <table width="100%">
          <tr class="tableClara">
            <td width="50%">
              <div align="center">
                <input type="image" name="imageField" src="../interfaz/inmohost/images/iconos/32/aceptar.png" />
              </div>
            </td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
</td>
</tr>
</table>
</body>
</html>
