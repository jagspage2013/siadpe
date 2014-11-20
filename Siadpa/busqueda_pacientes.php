<?php
include 'constants.php';
if (isset($_POST["no_cuenta"])) {
	$Buscador = $_POST['no_cuenta'];
	$result = mysql_query("SELECT * FROM paciente WHERE num_cta='".$Buscador."'") or die(mysql_error());  
	$row = mysql_fetch_array( $result );
	$arr = array(
		'num_cta' => $row['num_cta'],
		'nom_paciente' => $row['nom_paciente'],
		'ap_pat_paciente' => $row['ap_pat_paciente'],
		'ap_mat_paciente' => $row['ap_mat_paciente'],
		'email' => $row['email'],
		'calle' => $row['calle'],
		'num_ext' => $row['num_ext'],
		'num_int' => $row['num_int'],
		'colonia' => $row['colonia'],
		'delegacion' => $row['delegacion'],
		'contrasena_pac' => $row['contrasena_pac'],
		'cve_admon' => $row['cve_admon'],
		'telefono_pac' => $row['telefono_pac']
		);
	echo json_encode($arr);
	
}
?>
