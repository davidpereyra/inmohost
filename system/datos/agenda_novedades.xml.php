<?php 	
	header("Content-type: application/xml");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);
	
	include("../php/config.php");	

	//$usr_login='aldo';

	//echo "USR ".$usr_login;
	
	//print "select emp_id from empleados where usr_login='".$usr_login."'";
	
	$emp=mysql_result(mysql_query("select emp_id from empleados where usr_login='".$usr_login."'"),0,0);
	
	echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>";
	
	$xml=1;
		
	echo "
    <XMLTEXTO>
			<datos> 
			<empleados_d>";
	 			/* REGS= ID,Descripcion  */
				$regs=" emp_id, concat(nombre,\" \", apellido) ";
				$tablas=" empleados";
				$id="";//$emp_id;	
				$xtras=" order by nombre,apellido ASC";
				echo "<usr_login>login</usr_login>";
	   			 include("../"._FILE_SCRIPT_PHP_SELECT);
				$regs="";
                $tablas="";
                $id="";
                $xtras="";
            	echo "<selected>".$emp."</selected>";

            echo "</empleados_d>
				<empleados_p>";
	 			/* REGS= ID,Descripcion  */
				$regs=" emp_id, concat(nombre,\" \", apellido) ";
				$tablas=" empleados ";
				$id="";//$emp_id;
				$inicial="Todos";	
				$xtras=" order by nombre,apellido ASC";
			    include("../"._FILE_SCRIPT_PHP_SELECT);
				$regs="";
                $tablas="";
                $id="";
                $xtras="";
                echo "<selected>$pro_id</selected>";
			
		echo "
		</empleados_p>
		<nov_desc><![CDATA[]]></nov_desc>
		";
           echo"
		</datos>
	</XMLTEXTO>	
			";           
?>