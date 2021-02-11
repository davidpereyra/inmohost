<?php
	$HOST="localhost";     
	$USUARIO="inmo";
	$PASSWORD="inmo";
	$BASE_DATOS="inmodb33333";		
	$db=mysql_connect("localhost","root","");
	if (!$db)
	{
		die("ERROR AL CONECTAR A LA BASE DE DATOS");
	}
	mysql_select_db("mysql", $db);
	mysql_query("CREATE DATABASE $BASE_DATOS");
	mysql_query("GRANT ALL PRIVILEGES ON $BASE_DATOS.* TO '$USUARIO'@'$HOST' identified by '$PASSWORD'");
	mysql_select_db($BASE_DATOS,$db);
	$FP = fopen ( 'inmodb_31_07.sql', 'r' );
	print "FP$FP";
	$READ = fread ( $FP, filesize ( 'inmodb_31_07.sql'));
	$READ = explode ( ";\n", $READ );
	foreach ( $READ AS $RED )
	{
	    print $RED  . "<br>";
		mysql_query ( $RED );
	}
	echo 'Done'; 
?>