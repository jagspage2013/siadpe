<?php 
 include 'constants.php';
$resultado = $_GET['var']; 
	$result = mysql_query("SELECT * FROM paciente WHERE num_cta='".$resultado."'") or die(mysql_error());  
	$row = mysql_fetch_array( $result );
	if($row == ""){
	}	
session_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post">
  <p>Número de Cuenta: value="<?php echo  $_SESSION['user']?>"<br>
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
    <input type="button" name="button" id="button" value="Button">
    <input type="button" name="button2" id="button2" value="Button">
    <input type="button" name="button3" id="button3" value="Button">
    <br>
  </p>
</form>
</body>
</html>