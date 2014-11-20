<?php 
require_once('constants.php');

$cedula_prof = $_POST["cedula_prof"];
$nom_medico = $_POST["nom_medico"];
$ap_pat_medico = $_POST["ap_pat_medico"];
$ap_mat_medico = $_POST["ap_mat_medico"];
$email_medico = $_POST["email_medico"];
$calle_medico = $_POST["calle_medico"];
$num_ext_medico = $_POST["num_ext_medico"];
$num_int_medico = $_POST["num_int_medico"];
$colonia_medico = $_POST["colonia_medico"];
$delegacion_medico = $_POST["delegacion_medico"];
$contrasenia_medico = $_POST["contrasenia_medico"];
$consultorio = $_POST["consultorio"];
$telefono_medico = $_POST["telefono_medico"];
$clave_admon = (int)$_POST["clave_admon"];
$especialidad = $_POST["especialidad"];



$q = "INSERT INTO medico(cedula_prof,nom_medico,ap_pat_medico,ap_mat_medico,email_medico,calle_medico,num_ext_medico,num_int_medico,colonia_medico,delegacion_medico,consultorio,telefono_medico,especialidad,contrasenia_medico,cve_admon) 
		VALUES ('".$cedula_prof."','".$nom_medico."','".$ap_pat_medico."','".$ap_mat_medico."','".$email_medico."','".$calle_medico."','".$num_ext_medico."','".$num_int_medico."','".$colonia_medico."','".$delegacion_medico."','".$consultorio."','".$telefono_medico."','".$especialidad."','".$contrasenia_medico."',".$clave_admon.")";

$exito =  mysql_query($q) or die(mysql_error()."La consulta es: ".$q);

$arraYolo = array('result' => $exito.$cve_admon);
	
	echo json_encode($arraYolo);

?>
