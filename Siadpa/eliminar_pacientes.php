<?php 
include 'constants.php';
$resultado = $_POST['no_cuenta'];   //CAMBIAR NUM_CTA PARA PROBAR

$q = "DELETE FROM paciente WHERE num_cta = '".$resultado."'";
$exito = mysql_query($q) or die(mysql_error());
$array = array('result' => $exito);
echo json_encode($array);

?>
