<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?

$HOST="localhost";     
$USUARIO="root";
$PASSWORD="";
$BASE_DATOS="mysql";
$db=mysql_connect($HOST,$USUARIO,$PASSWORD);

if (!$pro_id){
	mysql_select_db($BASE_DATOS,$db);
    mysql_query("create database inmodb") or die("<br>No se creo la BD: ".mysql_error());
    mysql_query("grant all privileges on *.* to 'inmo'@'localhost' identified by 'inmo'") or die("No se creo el Usuario de la BD: ".mysql_error());
    exec("\wamp\mysql\bin\mysql.exe -uinmo -pinmo inmodb < c:\wamp\dumps\inmodb_empty.sql");
}

mysql_select_db("inmodb",$db) or die("No se cambio la BD: ".mysql_error());


?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Instalación InmohostV2.0</title>

<script language="javascript" src="system/javascript/formularios.js">
  

</script>
<script language="javascript">
function verif(a,form)
{
	error='';
	formu=a.split(',');
	for (i=1;i<formu.length;i+=3)
	{
		switch (formu[i])
		{
			case '1' :
				error += no_vacio(formu[i-1],formu[i+1],form);
				break;
			case '2' :
				error += selec(formu[i-1],formu[i+1],form);
				break;
			case '3' :	
				error += mail(formu[i-1],formu[i+1],form);
				break;
			case '4' :	
				error += check(formu[i-1],formu[i+1],form);
				break;
			case '5' :	
				error += numer(formu[i-1],formu[i+1],form);
				break;		
			case '6' :	
				error += selecmul(formu[i-1],formu[i+1],form);
				break;
			case '7' :	
				error += selecdin(formu[i-1],formu[i+1],form);
				break;
	
		}
	}
	if (error!='')
	{
		alert(error);
		return 0;
	}
	else
	{
		return 1;
	}
}
</script>

</head>
<body>
<center>
<table width="450" border="1">
<tr><td colspan="2">Datos de la Inmobiliaria<td></tr>
<form id="form1" name="form1" method="post" action="config_bd2.php">
<input type="hidden" name="reload" value="1"/>
  <tr>
    <td width="87"><div align="right" id="usr_id_div">USR_ID:</div></td>
    <td width="189">
      <input type="text" name="usr_id" value="<?echo $usr_id?>"/>
    </td>
  </tr>
  <tr>
    <td><div align="right" id="usr_raz_div">Razon Social:</div></td>
    <td><input type="text" name="usr_raz" value="<?echo $usr_raz?>" /></td>
  </tr>
  <tr>
    <td><div align="right" id="usr_dom_div">Domicilio:</div></td>
    <td><input type="text" name="usr_dom"  value="<?echo $usr_dom?>"/></td>
  </tr>
  <tr>
    <td><div align="right" id="pro_id_div">Provincia:<small>(*Aparecera por defecto en todo el sistema)</small></div></td>
    <td><select name="pro_id"  onchange="document.form1.action='<?echo $PHP_SELF?>';document.form1.submit();">
    		<? $cad="select * from provincias where pai_id=1 order by pro_desc";
    			$res=mysql_query($cad);
    			
    			while ($fila=mysql_fetch_array($res)) {
    				if($pro_id==$fila[pro_id]){
	    				echo "<option value='$fila[pro_id]' selected>$fila[pro_desc]</option>";
    				}else{
					    echo "<option value='$fila[pro_id]'>$fila[pro_desc]</option>";				
    				}
    			}
    		?>
    	</select>	
    </td>
  </tr>
   <tr>
    <td><div align="right" id="loc_id_div">Localidad:</div></td>
    <td><select name="loc_id">
    		<? 
    			if(!$pro_id){
    			
    				$pro_id=6;
    			}
    			if($pro_id){
    			
					$cad="select * from localidades where pro_id=$pro_id";
					$res=mysql_query($cad);
					
					while ($fila=mysql_fetch_array($res)) {
						
						echo "<option value='$fila[loc_id]'>$fila[loc_desc]</option>";
					}
    			}
    			
    		?>
    	</select>	
    </td>
  </tr>
  <tr>
    <td><div align="right" id="usr_tel_div">Telefono:</div></td>
    <td><input type="text" name="usr_tel" value="<?echo $usr_tel?>" /></td>
  </tr>
  <tr>
    <td><div align="right" id="email_div">E-Mail:</div></td>
    <td><input type="text" name="email"  value="<?echo $email?>"/></td>
  </tr>
  <tr>
    <td><div align="right" id="web_div">Pagina Web</div></td>
    <td><input type="text" name="web"  value="<?echo $web?>"/></td>
  </tr>
  <tr>
    <td><div align="right" id="webmail_div">Webmail - Consultas (Ej. www.suinmobiliaria.com.ar/mail)</div></td>
    <td><input type="text" name="webmail"  value="<?echo $webmail?>"/></td>
  </tr>
  <tr>
    <td><div align="right" id="mail_usr_div">Inicio de Sesión (Cuenta de E-mail. Ej: info@suinmobiliaria.com.ar)</div></td>
    <td><input type="text" name="mail_usr" value="<?echo $mail_usr?>" /></td>
  </tr>
  <tr>
    <td><div align="right" id="mail_pass_div">Contraseña (Cuenta de E-mail)</div></td>
    <td><input type="password" name="mail_pass" value="<?echo $mail_pass?>" /></td>
  </tr>  
    <tr>
    <td><div align="right" id="mail_pop_div">Servidor de correo entrante: (Ej. mail.suinmobiliaria.com.ar)</div></td>
    <td><input type="text" name="mail_pop" value="<?echo $mail_pop?>" /></td>
  </tr>  
  <tr>
      <tr>
    <td><div align="right" id="mail_smtp_div">Servidor de correo saliente: (Ej. mail.suinmobiliaria.com.ar)</div></td>
    <td><input type="text" name="mail_smtp" value="<?echo $mail_smtp?>" /></td>
  </tr>  
  <tr>
    <td><div align="right" id="usr_cim_div">Usuario RED CIM:</div></td>
  	<td>
		<select name="usr_cim" class="inputForm" tabindex="6">
	 		<option value="1" <?if($usr_cim==1)echo "selected"?>>SI</option>
			<option value="0" <?if($usr_cim==0)echo "selected"?>>NO</option>
		</select>
	</td>
  </tr>

  

</table>
<table>
<tr><td colspan="2">Datos del Usuario<td></tr>
<tr>
    <td><div align="right" id="nombre_div">Nombre:</div></td>
    <td><input type="text" name="nombre" value="<?echo $nombre?>"/></td>
  </tr>
  <tr>
    <td><div align="right" id="apellido_div">Apellido:</div></td>
    <td><input type="text" name="apellido" value="<?echo $apellido?>" /></td>
  </tr>
  <tr>
    <td><div align="right" id="telefono_div">Telefono:</div></td>
    <td><input type="text" name="telefono" value="<?echo $telefono?>" /></td>
  </tr>
  <tr>
    <td><div align="right" id="email-emp_div">E-Mail:</div></td>
    <td><input type="text" name="email-emp" value="<?echo $email-emp?>" /></td>
  </tr>
  <tr>
    <td><div align="right" id="domicilio_div">Domicilio:</div></td>
    <td><input type="text" name="domicilio" value="<?echo $domicilio?>" /></td>
  </tr>  
  <tr>
    <td><div align="right" id="usr_login_div">Login:</div></td>
    <td><input type="text" name="usr_login" value="<?echo $usr_login?>" /></td>
  </tr>  
  <tr>
    <td><div align="right" id="usr_pass_div">Password:</div></td>
    <td><input type="password" name="usr_pass" value="<?echo $password?>" /></td>
  </tr>  
                <tr class="tableClara">
                <td><div align="right" id="priv_id_div">Privilegios:</div></td>
                <td>
				<select name="priv_id" class="inputForm" tabindex="12">
			 		<option value="0" <?if($priv_id==0)echo "selected"?>>Privilegios</option>
					<option value="1" <?if($priv_id==1||!$priv_id)echo "selected"?>>admin</option>
					<option value="2" <?if($priv_id==2)echo "selected"?>>usuario</option>
				</select>
				</td>
              </tr>
	<tr>
  <td><div align="right" id="hh_s_div">Tiempo de sesion:</div></td>
                <td><select name="hh_s" class="inputForm" tabindex="13">
                      <option value="1" <?if($hh_s==1)echo "selected"?>>1</option>
                      <option value="2" <?if($hh_s==2)echo "selected"?>>2</option>
                      <option value="3" <?if($hh_s==3)echo "selected"?>>3</option>
                      <option value="4" <?if($hh_s==4)echo "selected"?>>4</option>
                      <option value="5" <?if($hh_s==5)echo "selected"?>>5</option>
                      <option value="6"  <?if($hh_s==6||!$hh_s)echo "selected"?>>6</option>
                      <option value="7" <?if($hh_s==7)echo "selected"?>>7</option>
                      <option value="8" <?if($hh_s==8)echo "selected"?>>8</option>
                      <option value="9" <?if($hh_s==9)echo "selected"?>>9</option>
                      <option value="10" <?if($hh_s==10)echo "selected"?>>10</option>
                      <option value="11" <?if($hh_s==11)echo "selected"?>>11</option>
                      <option value="12" <?if($hh_s==12)echo "selected"?>>12</option>
                      <option value="13" <?if($hh_s==13)echo "selected"?>>13</option>
                      <option value="14" <?if($hh_s==14)echo "selected"?>>14</option>
                      <option value="15" <?if($hh_s==15)echo "selected"?>>15</option>
                      <option value="16" <?if($hh_s==16)echo "selected"?>>16</option>
                      <option value="17" <?if($hh_s==17)echo "selected"?>>17</option>
                      <option value="18" <?if($hh_s==18)echo "selected"?>>18</option>
                      <option value="19" <?if($hh_s==19)echo "selected"?>>19</option>
                      <option value="20" <?if($hh_s==20)echo "selected"?>>20</option>
                      <option value="21" <?if($hh_s==21)echo "selected"?>>21</option>
                      <option value="22" <?if($hh_s==22)echo "selected"?>>22</option>
                      <option value="23" <?if($hh_s==23)echo "selected"?>>23</option>
                      <option value="24" <?if($hh_s==24)echo "selected"?>>24</option>
                    </select>
                  <select name="mm_s" class="inputForm" tabindex="14">
                      <option value="0" <?if($mm_s==0)echo "selected"?>>0</option>
                      <option value="5" <?if($mm_s==5)echo "selected"?>>5</option>
                      <option value="10" <?if($mm_s==10)echo "selected"?>>10</option>
                      <option value="15" <?if($mm_s==15)echo "selected"?>>15</option>
                      <option value="20" <?if($mm_s==20)echo "selected"?>>20</option>
                      <option value="25" <?if($mm_s==25)echo "selected"?>>25</option>
                      <option value="30" <?if($mm_s==30||!$mm_s)echo "selected"?>>30</option>
                      <option value="35" <?if($mm_s==35)echo "selected"?>>35</option>
                      <option value="40" <?if($mm_s==40)echo "selected"?>>40</option>
                      <option value="45" <?if($mm_s==45)echo "selected"?>>45</option>
                      <option value="50" <?if($mm_s==50)echo "selected"?>>50</option>
                      <option value="55" <?if($mm_s==55)echo "selected"?>>55</option>
                    </select>
				</td>
              </tr>
	<tr>
	  <td colspan="2" ><div align="center">
		<input name="agregar" type="button" class="botonForm" id="agregar" value="Aceptar" tabindex="15" onclick="if(verif('usr_id,1,USR ID,usr_raz,1,Razon Social,usr_dom,1,Domicilio,usr_tel,1,Telefono,email,1,E-Mail,web,1,Pagina Web,nombre,1,Nombre,apellido,1,Apellido,usr_login,1,Login,usr_pass,1,Password,priv_id,2,Privilegios','form1'))document.form1.submit()"/>
      </div></td>
	 </tr>
</table>
</form>
</center>
<?
mysql_close($db);
?>
</body>
</html>