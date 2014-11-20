<?php
	
	$servidor ="karmappcommx.fatcowmysql.com";
	$user ="siadpe";
	$pass = "siadpe2014!"; 
	$base = "siadpe";
	$connection = mysql_connect($servidor, $user, $pass) or die (mysql_error());
	mysql_select_db($base, $connection) or die (mysql_error());
	/*
	$servidor ="127.0.0.1";
	$user ="root";
	$pass = ""; 
	$base = "siadpe";
	*/
?>