<?php 

include ("../php/config.php");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

			$titulo = "Inmobiliaria"; //
			$destino1 = "prp_listado"; // listadoPropiedades
			$url1 = _FILE_PHP_PRP_LISTADO;
			$destino2 = "prp_ficha"; // listadoPropiedades
			$url2 = _FILE_PHP_PRP_FICHA;
			$inmo = true; //
						
         //

        $cadena="select 
        				usuarios.*,
        				loc_desc,
        				pro_desc 
        		 from 
        		 		usuarios,
        		 		provincias,
        		 		localidades
        		 where 
        		 		usuarios.loc_id=localidades.loc_id and
        		 		usuarios.pro_id=provincias.pro_id and
        		 		localidades.pro_id=provincias.pro_id and
        		 		usr_id="._USR_ID;
        $res=mysql_query($cadena);
        $reg=mysql_fetch_array($res);
?>
		<form id="panelInmobiliaria" name="panelInmobiliaria" method="post" action="" >
	 
      <table width="280" height="60" border="0" cellpadding="1" cellspacing="1">
        <tr>
          <td colspan="2" width="150%"><h1 align="left">Inmobiliaria</h1>
              <hr />
           </td>
        </tr>
        <tr>
          <td width="30%">Titular:</td>
          <td class="tableClara"><?echo $reg[titular]?></td>
        </tr>
        <tr>
          <td width="30%">Razon Social:</td>
          <td class="tableClara"><?echo $reg[usr_raz]?></td>
        </tr>
        <tr>
          <td width="30%">Domicilio:</td>
          <td class="tableClara"><?echo $reg[usr_dom] ?>[<small><?echo $reg[pro_desc]?> - <?echo $reg[loc_desc]?></small>]</td>
        </tr>
        <tr>
          <td width="30%">Tel&eacute;fono:</td>
          <td class="tableClara"><?echo $reg[usr_tel]?></td>
        </tr>
        <tr>
          <td width="30%">Mail:</td>
          <td class="tableClara"><?echo $reg[usr_mail]?></td>
        </tr>
		<tr>
          <td width="30%">Usuario de la Red CIM:</td>
          <td class="tableClara"><?($reg[usr_cim]==1)?print "SI":print "NO";?></td>
        </tr>
        <tr>
          <td width="30%">P&aacute;gina Web:</td>
          <td class="tableClara"><?echo $reg[web]?></td>
        </tr>
        <tr>
        	<!--td colspan="2" align="center">
		        <a href="javascript:display('menuPrincipal');ventana('edicionSimple','&fileXML=<?echo _FILE_XML_INMO?>&fileXSL=<?echo _FILE_XSL_INMO?>&mod_tip=edit&nomVentana=edicionSimple','<?echo _FILE_PHP_INMO?>','Modificar Datos');" class="menuItem">
		        <img src="interfaz/inmohost/images/iconos/32/editar.png" width="32" height="32" border="0" />
		        <br>
		      	  Modificar Datos
		        </a>
	        </td-->
		</tr>
      </table>
</form>	