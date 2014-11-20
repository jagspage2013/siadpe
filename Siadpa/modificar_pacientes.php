<?php
include 'constants.php';
$no_cuenta = $_POST['no_cuenta'];
$nombres = $_POST['nombre'];
$a_Pat = $_POST['a_pat'];
$a_Mat = $_POST['a_mat'];
$email = $_POST['email'];
$calle = $_POST['calle'];
$num_ext = $_POST['num_ext'];
$num_int = $_POST['num_int'];
$colonia = $_POST['colonia'];
$delegacion = $_POST['delegacion'];
$telefono = $_POST['telefono'];
$contrasena = $_POST['contrasena'];
$clave_admon = (int)$_POST['clave_admon'];
$no_cuenta_ant = $_POST['no_cuenta_ant'];

//$result = mysql_query("SELECT * FROM medico WHERE no_cuenta ='".$modificar."'") or die(mysql_error());  
//$row = mysql_fetch_array( $result );

if (isset($_POST["no_cuenta"])) {

  	$q = "UPDATE paciente SET num_cta ='".$no_cuenta."', 
          nom_paciente = '".$nombres."', 
          ap_pat_paciente = '".$a_Pat."', 
          ap_mat_paciente = '".$a_Mat."', 
          email = '".$email."', 
          calle = '".$calle."', 
          num_ext = '".$num_ext."',
          num_int = '".$num_int."', 
          colonia = '".$colonia."', 
          delegacion = '".$delegacion."', 
          contrasena_pac = '".$contrasena."', 
          cve_admon = '".$clave_admon."',
          telefono_pac = '".$telefono."'

          WHERE num_cta = '".$no_cuenta_ant."'";

    $exito = mysql_query($q) or die(mysql_error());
    $arraYolo = array('result' => $exito);
  
    echo json_encode($arraYolo);
}	

?>
