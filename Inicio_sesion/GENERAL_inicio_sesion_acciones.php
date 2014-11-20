<?php
	//Toma el usuario del inputbox de html
	$usuario=$_POST['usuario'];
	if(!$usuario){
		$usuario=0;
	}
	//Toma la contraseña del inputbox de html
	$contrasena=$_POST['contrasena'];
	if(!$contrasena){
		$contrasena=0;
	}
	//Aquí se encuentran los nombres de host,usuario,contraseña y base de datos para la conexion
	include("constants.php");
	//Busca en administrador, en medico y en paciente si existe el numero de usuario y contraseña dados
	//Query para administrador
	$query="select * from administrador where cve_admon = ".$usuario." and contrasenia_admon = '".$contrasena."'";
	$result=mysql_query($query);
	if(!mysql_num_rows($result)){
		//Query para médico
		$query="select * from medico where cedula_prof = ".$usuario." and contrasenia_medico = '".$contrasena."'";
		$result=mysql_query($query);
		if(!mysql_num_rows($result)){
			//Query para paciente
			$query="select * from paciente where num_cta = ".$usuario." and contrasena_pac = '".$contrasena."'";
			$result=mysql_query($query);
			if(!mysql_num_rows($result)){
				echo "<br> Contrasena o usuario incorrecto";
				exit;
			}
			//Cuenta de paciente
			else{
				echo "<br> Bienvenido a las ";
				echo date("H:i ");
				echo "<br>Paciente: ".$usuario;
				//Cargara solo la liga a SIADCI
			}
		}
		//Cuenta de medico
		else{
			echo "<br> Bienvenido a las ";
			echo date("H:i ");
			echo "<br>Medico: ".$usuario;
			//Cargara solo la liga a SIADEX
		}
	}
	//Cuenta de administrador
	else{
		echo "<br> Bienvenido a las ";
		echo date("H:i ");
		echo "<br>Administrador: ".$usuario;
		//Cargara todas las ligas (SIADPA SIADPE SIADCI SIADEX)
	}
	
	/*
	//Formato para mostrar informacion
	$num_results=mysql_num_rows($result);
	echo "<p> Numero de administradores encontrados: ".$num_results."<p>";
	
	for($i=0; $i<$num_results; $i++){
		$row=mysql_fetch_array($result);
		
		echo "<p><strong>".($i+1)." Clave: ";
		echo htmlspecialchars($row["cve_admon"]);
		
		echo "</strong><br>Contrasena: ";
		echo htmlspecialchars($row["contrasena_admon"]);
		
		echo "</p>";
	}
	*/
?>