<?php
//---------------------
$HOST="localhost";     
$USUARIO="inmo";
$PASSWORD="inmo";
$BASE_DATOS="inmodb";
//---------------------
//****************************************************************************************
$db=mysql_connect($HOST,$USUARIO,$PASSWORD);
mysql_select_db($BASE_DATOS,$db);
mysql_query("SET CHARACTER SET latin1");
mysql_query("SET NAMES latin1");


?>
