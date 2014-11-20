$(document).ready(function(){

	$(document.body).css('padding-top', $('.navbar').height() + 10);
	$(window).resize(function(){
		$(document.body).css('padding-top', $('.navbar').height() + 10);
	});
	$("#searchForm").submit(function(){
		$("#result").html("<b>Esperando Respuesta</b>");

		$.ajax({
			type: 'POST',
			url: 'busqueda_pacientes.php',
			data: $(this).serialize()
		}).done(function(data){
					//$("#result").html(data);
					$("#result").html(createTable(data));
				}).fail(function(){
					$("#result").html("La Busqueda Falló");
				});

				return false;
			});
	
	$("#input_form").submit(function(){
		$("#result_input").html("<b>Esperando Respuesta</b>");

		$.ajax({
			type: 'POST',
			url: 'alta.php',
			data: $(this).serialize()
		}).done(function(data){
			if (data.match("^Cannot")) {
				alert("Clave de Administrador no valida");
			}else if(data.match("^Duplicate")){
				alert("Numero de cuenta no valido");
			}else{
				var arr = JSON.parse(data);
				if(arr.result!=0){
					$("#input_form").trigger("reset");
					alert("Insertar exitoso");
				}else{
					alert("Error al insertar");
				}
			}

			$("#result_input").html("<b>Se insertó correctamente</b>");
		}).fail(function(data){
			var arr = JSON.parse(data);
			$("#result_input").html(arr.result+"La Busqueda Falló");
		});

		return false;
	});

	function createTable(data){
		var arr = JSON.parse(data);
		var out;
		if(arr.num_cta!=null)
			out = "<div class=\"table-responsive\"><table class=\"table table-striped table-bordered\"><tbody><tr><td> Número de Cuenta</td><td>"+arr.num_cta+ "</td></tr> <tr><td> Nombre</td><td>"+arr.nom_paciente+ "</td></tr> <tr><td> Apellido Paterno</td><td>"+arr.ap_pat_paciente+ "</td></tr> <tr><td> Apellido Materno</td><td>"+arr.ap_mat_paciente+ "</td></tr> <tr><td> Correo</td><td>"+arr.email+ "</td></tr> <tr><td> Calle</td><td>"+arr.calle+ "</td></tr> <tr><td> Num ext</td><td>"+arr.num_ext+ "</td></tr> <tr><td> Num int</td><td>"+arr.num_int+ "</td></tr> <tr><td>Colonia</td><td>"+arr.colonia+ "</td></tr> <tr><td>Delegacion</td><td>"+arr.delegacion+ "</td></tr> <tr><td> Telefono Paciente</td><td>"+arr.telefono_pac+ "</td></tr> </tbody></table></div>";
		else
			out = "<b> No hay Registro</b>"

		return out;
	}



	$("#get_form").submit(function(){
		$.ajax({
			type: 'POST',
			url: 'busqueda_pacientes.php',
			data: $(this).serialize()
		}).done(function(data){
			console.log(data);
			get_datos(data);
		}).fail(function(data){
			var arr = JSON.parse(data);
			$("#result_input").html("La Busqueda Falló");
		});

		return false;
	});


	function get_datos(data){
		var arr = JSON.parse(data);
		if(arr.num_cta!=null){
			$("#modifiform :input[name='no_cuenta']").val(parseInt(arr.num_cta));
			$("#modifiform :input[name='nombre']").val(arr.nom_paciente);
			$("#modifiform :input[name='a_Pat']").val(arr.ap_pat_paciente);
			$("#modifiform :input[name='a_Mat']").val(arr.ap_mat_paciente);
			$("#modifiform :input[name='email']").val(arr.email);
			$("#modifiform :input[name='calle']").val(arr.calle);
			$("#modifiform :input[name='num_int']").val(parseInt(arr.num_int));
			$("#modifiform :input[name='num_ext']").val(parseInt(arr.num_ext));
			$("#modifiform :input[name='colonia']").val(arr.colonia);
			$("#modifiform :input[name='delegacion']").val(arr.delegacion);
			$("#modifiform :input[name='telefono']").val(parseInt(arr.telefono_pac));
			$("#modifiform :input[name='contrasena']").val(arr.contrasena_pac);
			$("#modifiform :input[name='clave_admon']").val(parseInt(arr.cve_admon));
		}
		else{
			alert("No hay Registro");
		}
	}
});