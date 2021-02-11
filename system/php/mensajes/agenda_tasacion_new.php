<?php 
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	//recibe $id //parametro $_REQUEST["id"];
	include ("../config.php");

	
			$titulo = "Agregar Tasacion"; //
			$destino1 = ""; // listadoPropiedades
			$url1 = "";
			$parametros = "mod_new";
?>
<div id="toolTipContenido" >
<form id="agendaTasAgregar" style="height:100%" name="agendaTasAgregar" method="get" action="<?php echo _FILE_PHP_ABM_MENS_TAS;?>" >
	<input type="hidden" name="mod_tip" value="add">
	<input type="hidden" name="fecha" value="<?print $fecha;?>">
<table width="100%" height="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableOscura">
    <tr class="tableClara">
      <td align="center" colspan="2"><h1>Agregar Tasacion </h1></td>
    </tr>
    <tr class="tableClara" >
      <td align="center"><div align="right">Fecha:</div></td>
      <td >
	  <input name="fechaTasacion" type="text" id="fechaTasacion" value="<?php print date("d-m-Y");?>" class="inputFecha" readonly="yes" />
			<input id="fechaTasacionDia" type="hidden" name="fechaTasacionDia" value="<?php print date("d");?>" />
			<input id="fechaTasacionMes" type="hidden" name="fechaTasacionMes" value="<?php print date("m");?>" />
			<input id="fechaTasacionAno" type="hidden" name="fechaTasacionAno" value="<?php print date("Y");?>" />
			<a id="iniciaForm" href="javascript:;" title="seleccionar fecha" class="menu" onclick="position(event); toolTip('{<?php print _FILE_PHP_MEN_CALENDARIO;?>}&amp;destino=fechaTasacion',this)" tabindex="1"><img src="../interfaz/inmohost/images/iconos/calendario.gif" width="16" height="15" border="0" align="absmiddle" /></a>
    </td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right">Tipo Const:</div></td>
	<td>
    <select name="tip_id">
	<?php
		$regs=" tip_id, tip_desc";
		$tablas=" tipo_const ";
		$xtras=" order by tip_desc";
		$id=0;
	    include("../../"._FILE_SCRIPT_PHP_SELECT);
	    $regs="";
	    $tablas="";
	    $filtro="";
	    $xtras="";
	    $id="";
	?>
	 </select>
	</td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right">Condicion:</div></td>
	<td>
    <select name="con_id">
    <?php
		$regs=" con_id, con_desc";
		$tablas=" condiciones ";
		$xtras=" order by con_desc";
	    $id=0;
		include("../../"._FILE_SCRIPT_PHP_SELECT);
	    $regs="";
	    $tablas="";
	    $filtro="";
	    $xtras="";
	    $id="";
	?>
    </select>
	</td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right">Referente:</div></td>
	<td>
    <select name="tas_referente">
    <?php
		$regs=" emp_id, CONCAT(nombre,  ' ', apellido) as nombre";
		$tablas=" empleados ";
		$xtras=" order by nombre,apellido ASC";
	    include("../../"._FILE_SCRIPT_PHP_SELECT);
	    $regs="";
	    $tablas="";
	    $filtro="";
	    $xtras="";
	    $id="";
	?>
	</select>
	</td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right">Provincia:</div></td>
	<td>
    <select name="pro_id">
	<?php
		$regs=" pro_id, pro_desc";
		$tablas=" provincias ";
		$xtras=" order by pro_desc";
	    include("../../"._FILE_SCRIPT_PHP_SELECT);
	    $regs="";
	    $tablas="";
	    $filtro="";
	    $xtras="";
	    $id="";
	?>
	</select>
	</td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right">Departamento:</div></td>
	<td>
    <select name="loc_id">
    <?php
		$regs=" loc_id, loc_desc";
		$tablas=" localidades ";
		$xtras=" order by loc_desc ASC";
	    $filtro=" pro_id=21";
		include("../../"._FILE_SCRIPT_PHP_SELECT);
	    $regs="";
	    $tablas="";
	    $filtro="";
	    $xtras="";
	    $id="";
	?>
	</select>
	</td>
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right">Barrio:</div></td>
		<td><input type="text" name="tas_bar"/></td>    
    </tr>
    <tr class="tableClara">
	<td align="center"><div align="right">Domicilio:</div></td>
		<td><input type="text" name="tas_dom"/></td>    
    </tr>
    <tr class="tableClara">
    <td align="center"><div align="right">Nombre:</div></td>
		<td><input type="text" name="nom_prop"/></td>    
    </tr>
    <tr class="tableClara">
    <td align="center"><div align="right">Apellido:</div></td>
		<td><input type="text" name="ap_prop"/></td>    
    </tr>
    <tr class="tableClara">
    <td align="center"><div align="right">Telefono:</div></td>
		<td><input type="text" name="tel_prop"/></td>    
    </tr>
    <tr class="tableClara">
    <td align="center"><div align="right">Descripcion:</div></td>
		<td ><textarea name="tas_desc" rows="3"></textarea></td>
    </tr>
	<!--
    <tr class="tableClara">
	<td align="center"><div align="right">Estado:</div></td>
	<td>
    <select name="estado">
	    <option value="0">Indistinto</option>
		<option value="1">Dadas de Alta</option>
		<option value="2">Archivadas</option>
		<option value="3">En Curso</option>
		<option value="4">Pendiente</option>
	</select>
	</td>
    </tr>
    -->
    <tr class="tableClara" >
    	<td colspan="2" align="center">
    	<input name="Cerrar" type="button" class="botonForm" id="cerrar" onclick="hideToolTip();" value="Cerrar" />
    	&nbsp;&nbsp;
    	<input name="Modificar" type="button" class="botonForm" id="modificar" onclick="document.agendaTasacionEditar.submit();" value="Modificar" />
        &nbsp;&nbsp;
        </td>
    </tr>
  </table>
</div>