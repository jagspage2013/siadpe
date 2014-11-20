<?php
include 'constants.php';
if (isset($_POST["cedula_prof"])) {
	$Buscador = $_POST['cedula_prof'];
	$result = mysql_query("SELECT * FROM medico WHERE cedula_prof='".$Buscador."'") or die(mysql_error());  
	$row = mysql_fetch_array( $result );
	$arr = array(
		"cedula_prof" => $row["cedula_prof"],
		"nom_medico" => $row["nom_medico"],
		"ap_pat_medico" => $row["ap_pat_medico"],
		"ap_mat_medico" => $row["ap_mat_medico"],
		"email_medico" => $row["email_medico"],
		"calle_medico" => $row["calle_medico"],
		"num_ext_medico" => $row["num_ext_medico"],
		"num_int_medico" => $row["num_int_medico"],
		"colonia_medico" => $row["colonia_medico"],
		"delegacion_medico" => $row["delegacion_medico"],
		"contrasenia_medico" => $row["contrasenia_medico"],
		"consultorio" => $row["consultorio"],
		"cve_admon" => $row["cve_admon"],
		"telefono_medico" => $row["telefono_medico"],
		"especialidad" => $row["especialidad"],
		"result" => $result
		);
	echo json_encode($arr);	
}
?>
