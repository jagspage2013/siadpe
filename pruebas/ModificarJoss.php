<?php
include 'constants.php';
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
$modificar= "222222222"; //$_POST["modificar"];

$result = mysql_query("SELECT * FROM paciente WHERE num_cta='".$modificar."'") or die(mysql_error());  
$row = mysql_fetch_array( $result );

if (isset($_POST["modificar"])) {

  	$q = "UPDATE paciente SET (num_cta, nom_paciente, ap_pat_paciente, ap_mat_paciente, email, calle, num_ext, num_int, colonia, delegacion, contrasena_pac, cve_admon, telefono_pac) VALUES ('".$no_cuenta."','".$nombres."','".$a_Pat."','".$a_Mat."','".$email."','".$calle."','".$num_ext."','".$num_int."','".$colonia."','".$delegacion."','".$contrasena."','".$clave_admon."','".$telefono."')";
  	$exito = mysql_query($q) or die(mysql_error());
    echo $exito;
		exit;
}	

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post">
<fieldset id="formulario1">
<p>MODIFICAR</p>
<p>
  <label for="no_cuenta">* Numero de cuenta:</label>
  <input name="no_cuenta" type="number" id="no_cuenta" value="<?php echo $row['num_cta']; ?>">
</p>
<p>
  <label for="nombres">* Nombres :</label>
  <input name="nombres" type="text" id="nombres" value="<?php echo $row['nom_paciente']; ?>">
</p>
<p>
  <label for="a_Pat">* Apellido Paterno:</label>
  <input name="a_Pat" type="text" id="a_Pat" value="<?php echo $row["ap_pat_paciente"]; ?>">
</p>
<p>
  <label for="a_Mat">  Apellido Materno:</label>
  <input name="a_Mat" type="text" id="a_Mat" value="<?php echo $row["ap_mat_paciente"]; ?>">
</p>
<p>
  <label for="calle">* Calle:</label>
  <input name="calle" type="text" id="calle" value="<?php echo $row["calle"]; ?>">
</p>
<p>
  <label for="num_ext">* Num exterior:</label>
  <input name="num_ext" type="number" id="num_ext" value="<?php echo $row["num_ext"]; ?>">
</p>
<p>
  <label for="num_int"> Num interior:</label>
  <input name="num_int" type="number" id="num_int" value="<?php echo $row["num_int"]; ?>">
</p>
<p>
  <label for="colonia">* Colonia:</label>
  <input name="colonia" type="text" id="colonia" value="<?php echo $row["colonia"]; ?>">
</p>
<p>
  <label for="delegacion">* Delegación:</label>
  <input name="delegacion" type="text" id="delegacion" value="<?php echo $row["delegacion"]; ?>">
</p>
<p>
  <label for="email">* Correo electrónico:</label>
  <input name="email" type="text" id="email" value="<?php echo $row["email"]; ?>">
  <label for="telefono"><br>
    <br>
    * Teléfono:</label>
  <input name="telefono" type="number" id="telefono" value="<?php echo $row["telefono_pac"]; ?>">
</p>
<p>
  <label for="contrasena">* Contraseña:</label>
  <input name="contrasena" type="text" id="contrasena" value="<?php echo $row["contrasena_pac"]; ?>">
</p>
<p>* Todos los campos son obligatorios</p>
<p>
  <input name="Enviar" type="Button"  title="Enviar" value="Enviar">
</p>
</fieldset>
</form>
 

</body>
</html>
