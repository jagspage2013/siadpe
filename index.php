<!DOCTYPE html>
<html>
<head>
	<title>Sistema General de Administración</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/main.css">
	<script type="text/javascript" src="js/jquery-1.9.1.js" ></script>
	<script src="js/bootstrap.min.js"> </script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#divform').hide();
			var eleccion;

			$(document.body).css('padding-top', $('.navbar').height() + 10);
			$(window).resize(function(){
				$(document.body).css('padding-top', $('.navbar').height() + 10);
			});

			$('.list-group a').click(function() {
				eleccion= $(this).attr('name');
				$(this).parent().hide(400, function() {
					$(window).resize();
				});
				$('#divform').delay(500).show(500);

				return false;
			});

			$("#loginForm").submit(function(){
				$.ajax({
					type: 'POST',
					url: 'inicio_sesion.php',
					data: $(this).serialize()
				}).done(function(data){
					console.log(data);
					if(!data.match("error"))
						guardar(data);
					else
						alert("Usuario Incorrecto");
				}).fail(function(data){
					
				});
				return false;
			});

			function guardar(data){
				var arr = JSON.parse(data);
				console.log(arr.user +arr.typex + " datos a session");
				$.ajax({
					url: 'session_feliz.php',
					type: 'POST',
					data: {'user': arr.user,'type': arr.typex}
				})
				.done(function(data) {
					console.log("success: "+data);
					if(data.match("saved"))
						chose(arr.typex);
				})
				.fail(function(data) {
					console.log("error: "+data);
				});	
			}

			function chose(data){
				var tipo = data;
				console.log("El tipo es +"+tipo );
				if(eleccion.match("siadpe")){
					if(tipo.match("admin"))
						window.location = "./Siadpe";   
					else
						alert("Usuario no autorizado"); 
				}
				if(eleccion.match("siadpa")){
					window.location = "./Siadpa";    
					if(tipo.match("admin"))
						window.location = "./Siadpa";   
					else
						alert("Usuario no autorizado"); 
				}
				if(eleccion.match("siadex")){
					window.location = "./Siadex"; 
					if(tipo.match("admin"))
						window.location = "./Siadpe";   
					else
						alert("Usuario no autorizado");    

				}
				if(eleccion.match("siadci")){
					window.location = "./Siadci";  
					if(tipo.match("admin"))
						window.location = "./Siadpe";   
					else
						alert("Usuario no autorizado");   

				}
			}

		});
	</script>

</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Sistema General de Administración</a>
			</div>
			<div >
				<ul class="nav navbar-nav navbar-right ">
					<li class=""><a href="index.php" title="">Inicio</a></li>
					<li class=""><a href="./Siadpe" title="">Siadpe</a></li>
					<li class=""><a href="./Siadpa" title="">Siadpa</a></li>
					<li class=""><a href="./Siadci" title="">Siadci</a></li>
					<li class=""><a href="./Siadex" title="">Siadex</a></li>

				</ul>
			</div>
		</div>

	</nav>
	<div class="container" >
		<div class="row">
			<div class="list-group">
			<a href="#" name="siadpa"  class="list-group-item ">
				<h4 class="list-group-item-heading">SIADPA</h4>
				<p class="list-group-item-text">
					<i>Sistema de Administración de Pacientes</i><br>
					Este sistema se encargará manejar los datos personales de los pacientes.</p>
			</a>
			<a href="#" name="siadpe" class="list-group-item ">
				<h4 class="list-group-item-heading">SIADPE</h4>
				<p class="list-group-item-text">
					<i>Sistema de Administración de Personal</i><br>
				Este sistema se encarga de la administración del personal médico.</p>
			</a>
			<a href="#" name="siadci" class="list-group-item ">
				<h4 class="list-group-item-heading">SIADCI</h4>
				<p class="list-group-item-text">
					<i>Sistema de Administración de Citas</i><br>
				Este sistema lleva a cabo el control de logística de las citas de los pacientes.</p>
			</a>
			<a href="#" name="siadex" class="list-group-item ">
				<h4 class="list-group-item-heading">SIADEX</h4>
				<p class="list-group-item-text">
					<i>Sistema de Administración de Expedientes</i><br>
					Este sistema se encarga de almacenar y controlar los expedientes médicos de los pacientes.</p>
				</a>
			</div>
		</div>
		
		<div class="clear"></div>
		<div class="row">
			<div id="divform" class ="col-lg-6 col-lg-offset-3">
				<form id="loginForm" role="form">
					<h1>Inicia Sesión</h1>
					<div class="form-group">
						<input type="text" class="form-control" name="user" placeholder="usuario" >
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="pass" placeholder="contraseña">
					</div>
					<button type="submit" class="btn btn-primary btn-lg">Enviar</button>
				</form>
			</div>

		</div>
	</body>
</html>