<?php
include 'constants.php';
$cedula_prof = $_POST['cedula_prof'];
$nombres = $_POST['nom_medico'];
$a_Pat = $_POST['ap_pat_medico'];
$a_Mat = $_POST['ap_mat_medico'];
$email = $_POST['email_medico'];
$calle = $_POST['calle_medico'];
$num_ext = $_POST['num_ext_medico'];
$num_int = $_POST['num_int_medico'];
$colonia = $_POST['colonia_medico'];
$delegacion = $_POST['delegacion_medico'];
$telefono = $_POST['telefono_medico'];
$contrasena = $_POST['contrasenia_medico'];
$clave_admon = (int)$_POST['clave_admon'];
$especialidad = $_POST['especialidad'];
$consultorio = $_POST['consultorio'];
$cedula_prof_ant = $_POST['cedula_prof_ant'];

//$result = mysql_query("SELECT * FROM medico WHERE cedula_prof ='".$modificar."'") or die(mysql_error());  
//$row = mysql_fetch_array( $result );

if (isset($_POST["cedula_prof"])) {

  	$q = "UPDATE medico SET cedula_prof ='".$cedula_prof."', 
          nom_medico = '".$nombres."', 
          ap_pat_medico = '".$a_Pat."', 
          ap_mat_medico = '".$a_Mat."', 
          email_medico = '".$email."', 
          calle_medico = '".$calle."', 
          num_ext_medico = '".$num_ext."',
          num_int_medico = '".$num_int."', 
          colonia_medico = '".$colonia."', 
          delegacion_medico = '".$delegacion."', 
          contrasenia_medico = '".$contrasena."', 
          consultorio = '".$consultorio."', 
          cve_admon = '".$clave_admon."',
          telefono_medico = '".$telefono."',
          especialidad = '".$especialidad."'

          WHERE cedula_prof = '".$cedula_prof_ant."'";

    $exito = mysql_query($q) or die(mysql_error());
    $arraYolo = array('result' => $exito);
  
    echo json_encode($arraYolo);
}	

?>
