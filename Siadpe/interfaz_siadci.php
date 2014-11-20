<?php 

include 'constants.php';
if (isset($_POST["especialidad"])) {

	$Buscador = $_POST['especialidad'];
	$q= "SELECT hora,cedula_prof from horario where cedula_prof in (SELECT cedula_prof FROM medico WHERE especialidad='".$Buscador."')";
	$result = mysql_query($q) or die(mysql_error());  
	$row = mysql_fetch_array( $result );
	echo json_encode($row);	
}else{
	echo "error";
}

?>