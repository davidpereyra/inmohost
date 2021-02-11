<?php 
header("Content-type: application/xml");
	extract($_GET);
	extract ($_POST);
	extract ($_REQUEST);

	
	include("../php/config.php");

echo '<?xml version="1.0" encoding="utf-8"?>';
$cadena="select 
				*
		from 
				banners
		where
				ban_exp >= now() and 
				ban_mos=1";


$result=mysql_query($cadena);



echo '
<options>
	<PHOTOSNUMBER>';

	while ($fila=mysql_fetch_array($result)){
		
		print "<imageName target='$fila[ban_tar]'><![CDATA[$fila[ban_url]$fila[ban_des]]]></imageName>";
		$time=$fila[ban_tpo];
		$color=$fila[ban_col];
		$alpha=$fila[ban_alp];
	}
	 echo"     
	</PHOTOSNUMBER>
	<TIME>
	      <time>180</time>             
	      <color>$color</color>   
	      <alpha>$alpha</alpha>
	      <random>false</random>  
	</TIME>
</options>
";

?>