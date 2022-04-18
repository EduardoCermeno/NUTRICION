function eliminarPaciente(idpaciente) {
	alert(idpaciente)

	// if (idpaciente< 1) {
	// 	swal("No tienes id del Paciente!");
	// 	return false;
	// } else {
	// 	//*****************************************
	// 	swal({
			
	// 	  title: "Estas seguro de eliminar Este Registro?",
	// 	  text: "Una vez eliminada, no podra recuperarse!",
	// 	  icon: "warning",
	// 	  buttons: true,
	// 	  dangerMode: true,
	// 	})
		
	// 	.then((willDelete) => {
	// 	  if (willDelete) {
	// 	   		$.ajax({
	// 	   			type:"POST",
	// 	   			data:"idpaciente=" + idpaciente,
	// 	   			url:"../../Controlador/Usuarios/Pacientes/EliminarPaciente.php",
	// 	   			success:function(respuesta){
						
	// 	   				respuesta = respuesta.trim();
	// 	   				if (respuesta == 1) {
	// 						alert(respuesta);
	// 						$('#tablaCitas').load("../tablas/tablaPaciente");
	// 	   					swal("Eliminado con exito!", {
	// 	      					icon: "success",
	// 	    				});
	// 	   				} else {
	// 						alert('si esta pasando'+IDPACIENTE);
	// 	   					swal(":(", "Fallo al eliminar!", "error");
	// 	   				}
	// 	   			}
	// 	   		});	
	// 	  } 
	// 	});
		
	// }
}
