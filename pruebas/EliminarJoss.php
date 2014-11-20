<?php 
include 'constants.php';
$resultado = "222222222";   //CAMBIAR NUM_CTA PARA PROBAR
$exito = null;
	$result = mysql_query("SELECT * FROM paciente WHERE num_cta='".$resultado."'") or die(mysql_error());  
	$row = mysql_fetch_array( $result );

if (isset($_GET["eliminar"])) {
		$q = "DELETE FROM paciente WHERE num_cta = '".$resultado."'";
		$exito = mysql_query($q) or die(mysql_error());
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form action="algo.php" method="post">
  <p>Número de Cuenta: <?php echo  $row['num_cta']; ?><br>
    Nombre: <?php echo  $row['nom_paciente']; ?><br>
    Apellido paterno: <?php echo  $row['ap_pat_paciente']; ?><br>
    Apellido materno: <?php echo  $row['ap_mat_paciente']; ?><br>
    e-mail: <?php echo  $row['email']; ?><br>
    Calle: <?php echo  $row['calle']; ?><br>
    Número exterior: <?php echo  $row['num_ext']; ?><br>
    Número interior: <?php echo  $row['num_int']; ?><br>
    Colonia: <?php echo  $row['colonia']; ?><br>
    Delegación: <?php echo  $row['delegacion']; ?><br>
    Contraseña: <?php echo  $row['contrasena_pac']; ?><br>
  Teléfono: <?php echo  $row['telefono_pac']; ?></p>

  <p>
    <input type="text"  name="Modificar" value="Modificar">
    <input type="submit" name="eliminar" value="Eliminar">
    <br>
  </p>
</form>
</body>
</html>