$(document).ready(function(){
			
	$(document.body).css('padding-top', $('.navbar').height() + 10);
	$(window).resize(function(){
		$(document.body).css('padding-top', $('.navbar').height() + 10);
	});

	$("#searchForm").submit(function(){
		$("#result").html("<b>Esperando Respuesta</b>");

		$.ajax({
			type: 'POST',
			url: 'busqueda_personal.php',
			data: $(this).serialize()
		}).done(function(data){
			//$("#result").html(data);
			$("#result").html(createTable(data));
		}).fail(function(data){
			$("#result").html(data+"La Busqueda Falló" );
		});

		return false;
	});

	$("#input_form").submit(function(){
		$("#result_input").html("<b>Esperando Respuesta</b>");

		$.ajax({
			type: 'POST',
			url: 'alta_personal.php',
			data: $(this).serialize()
		}).done(function(data){
			if (data.match("^Cannot")) {
				alert("Clave de Administrador no valida");
			}else if(data.match("^Duplicate")){
				alert("Cedula prof repetida");
			}else{
				var arr = JSON.parse(data);
				if(arr.result ==1){
					$("#input_form").trigger("reset");
					alert("Insertar exitoso");
				}else{
					alert("Error al insertar");
				}
			}

		}).fail(function(data){
			var arr = JSON.parse(data);
			$("#result_input").html("La Busqueda Falló");
		});

		return false;
	});

	$("#get_form").submit(function(){
		$.ajax({
			type: 'POST',
			url: 'busqueda_personal.php',
			data: $(this).serialize()
		}).done(function(data){
			get_datos(data);
		}).fail(function(data){
			var arr = JSON.parse(data);
			$("#result_input").html("La Busqueda Falló");
		});

		return false;
	});


	function createTable(data){
		var arr = JSON.parse(data);
		var out;
		if(arr.cedula_prof!=null)
			out = "<div class=\"table-responsive\"><table class=\"table table-striped table-bordered\"><tbody><tr><td>Cédula Profesional</td><td>"+arr.cedula_prof+"</td></tr><tr><td>Nombre</td><td>"+arr.nom_medico+"</td></tr><tr><td>Apellido Paterno</td><td>"+arr.ap_pat_medico+"</td></tr><tr><td>Apellido Materno</td><td>"+arr.ap_mat_medico+"</td></tr><tr><td>Correo</td><td>"+arr.email_medico+"</td></tr><tr><td>Calle</td><td>"+arr.calle_medico+"</td></tr><tr><td>Num Ext</td><td>"+arr.num_ext_medico+"</td></tr><tr><td>Num Int.</td><td>"+arr.num_int_medico+"</td></tr><tr><td>Colonia</td><td>"+arr.colonia_medico+"</td></tr><tr><td>Delegación</td><td>"+arr.delegacion_medico+"</td></tr><tr><td>Consultorio</td><td>"+arr.consultorio+"</td></tr><tr><td>Telefono</td><td>"+arr.telefono_medico+"</td></tr><tr><td>Especialidad</td><td>"+arr.especialidad+"</td></tr> </tbody> </table></div>";
		else
			out = "<b> No hay Registro</b>"

		return out;
	}

	function get_datos(data){
		var arr = JSON.parse(data);
		if(arr.cedula_prof!=null){
			$("#modifiform :input[name='cedula_prof']").val(parseInt(arr.cedula_prof));
			$("#modifiform :input[name='nom_medico']").val(arr.nom_medico);
			$("#modifiform :input[name='ap_pat_medico']").val(arr.ap_pat_medico);
			$("#modifiform :input[name='ap_mat_medico']").val(arr.ap_mat_medico);
			$("#modifiform :input[name='email_medico']").val(arr.email_medico);
			$("#modifiform :input[name='calle_medico']").val(arr.calle_medico);
			$("#modifiform :input[name='num_int_medico']").val(parseInt(arr.num_int_medico));
			$("#modifiform :input[name='num_ext_medico']").val(parseInt(arr.num_ext_medico));
			$("#modifiform :input[name='colonia_medico']").val(arr.colonia_medico);
			$("#modifiform :input[name='delegacion_medico']").val(arr.delegacion_medico);
			$("#modifiform :input[name='telefono_medico']").val(parseInt(arr.telefono_medico));
			$("#modifiform :input[name='contrasenia_medico']").val(arr.contrasenia_medico);
			$("#modifiform :input[name='clave_admon']").val(parseInt(arr.cve_admon));
			$("#modifiform :input[name='consultorio']").val(arr.consultorio);
			$("#modifiform :input[name='especialidad']").val(arr.especialidad);

		}
		else{
			alert("No hay Registro");
		}
	}

});