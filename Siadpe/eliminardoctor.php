<?php 
include 'constants.php';
$resultado = $_POST['cedula_prof'];   //CAMBIAR NUM_CTA PARA PROBAR

$q = "DELETE FROM medico WHERE cedula_prof = '".$resultado."'";
$exito = mysql_query($q) or die(mysql_error());
$array = array('result' => $exito);
echo json_encode($array);

?>
