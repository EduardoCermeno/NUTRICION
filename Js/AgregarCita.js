function agregarCita() {
	var fechaCita = $('#fechacita').val();
	var estadoCita = $('#estadocita').val();


		$.ajax({
			type:"POST",
			data:$('#frmcreandocitas').serialize(),
			url:"../../Controlador/Usuarios/citas/crearcita.php",
			success:function(respuesta){
			
				respuesta = respuesta.trim();
				if (respuesta == 0) {
					$('#tablaCitas').load("../tablas/tablaCitas");
					swal(":(", "Fallo al agregar!", "error");
					
				
					
				} else {
					$('#tablaCitas').load("../tablas/tablaCitas");
					swal(":D", "Agregado con exito!", "success");
				}
			}
		});
	
}

function eliminarCitas(idCita) {
	IdCita = parseInt(idCita);
	if (IdCita < 1) {
		swal("No tienes id de cita!");
		return false;
	} else {
		//*****************************************
		swal({
		  title: "Estas seguro de eliminar esta Cita?",
		  text: "Una vez eliminada, no podra recuperarse!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		   		$.ajax({
		   			type:"POST",
		   			data:"idcita=" + IdCita,
		   			url:"../../Controlador/Usuarios/citas/eliminarcita.php",
		   			success:function(respuesta){
		   				respuesta = respuesta.trim();
		   				if (respuesta == 1) {
							$('#tablaCitas').load("../tablas/tablaCitas");
		   					swal("Eliminado con exito!", {
		      					icon: "success",
		    				});
		   				} else {
		   					swal(":(", "Fallo al eliminar!", "error");
		   				}
		   			}
		   		});	
		  } 
		});
		//*****************************************
	}
}


// function actualizaCategoria() {
// 	if ($('#categoriaU').val() == "") {
// 		swal("No hay categoria!!");
// 		return false;
// 	} else {
// 		$.ajax({
// 			type:"POST",
// 			data:$('#frmActualizaCategoria').serialize(),
// 			url:"../procesos/categorias/actualizaCategoria.php",
// 			success:function(respuesta){
// 				respuesta = respuesta.trim();

// 				if (respuesta == 1) {
// 					$('#btnCerrarUpdateCategoria').click();
// 					$('#tablaCategorias').load("categorias/tablaCategoria.php");
// 					swal(":D", "Actualizado con exito!", "success");
					
// 				} else {
// 					swal(":(", "Fallo al actualizar!", "error");
// 				}
// 			}
//  		})
//  	}
// }