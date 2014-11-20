<?php 
require_once('constants.php');

$no_cuenta = $_POST['no_cuenta'];
$nombres = $_POST['nombres'];
$a_Pat = $_POST['a_Pat'];
$a_Mat = $_POST['a_Mat'];
$calle = $_POST['calle'];
$num_ext = $_POST['num_ext'];
$num_int = $_POST['num_int'];
$colonia = $_POST['colonia'];
$delegacion = $_POST['delegacion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$contrasena = $_POST['contrasena'];
$clave_admon = $_POST['clave_admon'];
$exito = null;


$q = "INSERT INTO paciente(num_cta, nom_paciente, ap_pat_paciente, ap_mat_paciente, email, calle, num_ext, num_int, colonia, delegacion, contrasena_pac, cve_admon, telefono_pac) VALUES ('".$no_cuenta."','".$nombres."','".$a_Pat."','".$a_Mat."','".$email."','".$calle."','".$num_ext."','".$num_int."','".$colonia."','".$delegacion."','".$contrasena."','".$clave_admon."','".$telefono."')";
$exito =  $mysqli->query($q) or die(mysql_error());
	
}

?>
