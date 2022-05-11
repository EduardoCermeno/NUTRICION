<?php

session_start();
require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();



?>





<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaencargadopaciente">
		<thead>
			<tr style="text-align: center;">
				<td>ID</td>
                <td>NOMBRE Y APELLIDOS</td>
				<td>TELEFONO</td>
                <td>CORREO</td>
                <td>DIRECCION</td>
				<td>Editar</td>
				<td>Eliminar</td>
                
               
			</tr>
		</thead>
		<tbody>

		<?php
			$IDUSUARIO=$_SESSION['idUsuario'];
		
			if($_SESSION['ROLUSUARIO']=="SuperUsuario"){
			$sql = "SELECT 
					Id_EncargadoPaciente, 
					Nombre_EncargadoPaciente, 
					Apellido_EncargadoPaciente, 
					Telefono_EncargadoPaciente, 
					Correo_EncargadoPaciente, 
					Direccion
          
			FROM tb_encargadopaciente"; 
			
		}else if($_SESSION['ROLUSUARIO']=="Usuario"){
			$sql = "SELECT 
					Id_EncargadoPaciente, 
					Id_Usuario,
					Nombre_EncargadoPaciente, 
					Apellido_EncargadoPaciente, 
					Telefono_EncargadoPaciente, 
					Correo_EncargadoPaciente, 
					Direccion
          
			FROM tb_encargadopaciente WHERE Id_Usuario=$IDUSUARIO"; 
		}

			$result = mysqli_query($Conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				
				
				
		?>
			 <tr style="text-align: center;">
			 
				
				<td><?php echo $mostrar['Id_EncargadoPaciente']; ?></td>
                <td><?php echo $mostrar['Nombre_EncargadoPaciente']." ".$mostrar['Apellido_EncargadoPaciente']; ?></td>
                <td><?php echo $mostrar['Telefono_EncargadoPaciente']; ?></td>
                <td><?php echo $mostrar['Correo_EncargadoPaciente']; ?></td>
                <td><?php echo $mostrar['Direccion']; ?></td>
				
				
				<td>

				<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizaEncargado" 
				onclick="obtenerencargadopaciente('<?php echo $mostrar['Id_EncargadoPaciente']?>')" >
							
						<span class="fas fas fa-edit"></span>
					</span>
					
				</td>

				<td>

				<span class="btn btn-danger btn-sm" 
							onclick="eliminarencargado('<?php echo $mostrar['Id_EncargadoPaciente']?>')" >
							
						<span class="fas fa-trash-alt"></span>
					</span>
					
				</td>
				


			</tr> 
			<?php 
			}

			?>
		</tbody>
	</table>

</div>


<div class="modal fade" id="modalActualizaEncargado" tabindex="-1" role="dialog"  style="background-color: black;" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Encargado  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color:gainsboro">
        <form id="actualizandoencargado" method="POST" autocomplete="off">
 
				
				<input type="text" name="idencargado" id="idencargado" hidden="" >
			
					
					<label> Nombre</label>
					<input type="text" name="NombreEP" id="NombreEP" class="form-control" required="">
					<br>
					<label >Apellidos</label>
					<input type="text" name="ApellidosEP" id="ApellidosEP" class="form-control" required="">
					
					<label>Teléfono</label>
					<input  type="text" name="TelefonoEP" id="TelefonoEP"  class="form-control"  required="" >
					
					<label>Correo</label>
					<input  type="email" name="CorreoEP" id="CorreoEP"  class="form-control"  required="" >
					
					<label>Direccion</label>
					<input  type="text" name="DireccionEP" id="DireccionEP"  class="form-control"  required="" >
					
		
        </form>
      </div>
	
      <div class="modal-footer">
	  <button type="button"  class="btn btn-danger" id="modificaencargado" data-dismiss="modal">Actualizar</button>
       
        <button type="button" onclick="cancelar()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>





<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaencargadopaciente').DataTable();

			$('#modificaencargado').click(function(){
				actualizaencargado();
			});

			//  $('#btnActualizaCategoria').click(function(){
			// 	obtenerDatosCategoria();
			//  });
		});
	
	



</script>


<script>

function obtenerencargadopaciente(idencargado){
	IDENCARGADO=parseInt(idencargado)
		$.ajax({
		   			type:"POST",
		   			data:"IDENCARGADO=" + IDENCARGADO,
		   			url:"../../Controlador/Usuarios/Actualizaencargado.php",
					  
		   			success:function(respuesta){
						alert(respuesta);
					respuesta=jQuery.parseJSON(respuesta);
				
					$('#idencargado').val(respuesta["Id_EncargadoPaciente"]);
					$('#NombreEP').val(respuesta['Nombre_EncargadoPaciente']);
					$('#ApellidosEP').val(respuesta['Apellido_EncargadoPaciente']);
					$('#TelefonoEP').val(respuesta['Telefono_EncargadoPaciente']);
					$('#CorreoEP').val(respuesta['Correo_EncargadoPaciente']);
					$('#DireccionEP').val(respuesta['Direccion'])
				
					
				
		   				
		   			}
		   		});	 


}


function actualizaencargado(){
	
	$.ajax({
				   type:"POST",
				   data:$('#actualizandoencargado').serialize(),
				   url:"../../Controlador/Usuarios/actualizainformacionEncargado.php",
				   success:function(respuesta){
					   alert(respuesta);
				if(respuesta==1){
					$('#tablaUsuarios').DataTable();
					swal(":d", "Paciente Actualizado", "success");
					$('#tablaencargadopaciente').load("../tablas/tablaEncargadoPaciente");
						
					
				}else{
					swal(":(", "fallo al actualizar", "error")

				}
				   
				   }
			   });	 




}

</script>
<script>





function eliminarencargado(idencargado) {
	IDENCARGADO=parseInt(idencargado)

	if (IDENCARGADO< 1) {
		swal("No se encontro el dato solicitado!");
		return false;
	} else {
		//*****************************************
		swal({
			
		  title: "Estas seguro de eliminar Este Registro?",
		  text: "Una vez eliminada, no podra recuperarse!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		
		.then((willDelete) => {
		  if (willDelete) {
		   		$.ajax({
		   			type:"POST",
		   			data:"IDENCARGADO=" + IDENCARGADO,
		   			url:"../../Controlador/Usuarios/EliminarEncargado.php",
		   			success:function(respuesta){
					alert(respuesta);
		   				respuesta = respuesta.trim();
		   				if (respuesta == 1  ) {
							
		   					swal("Eliminado con exito!", {
								
		      					icon: "success",
								  
		    				});
							$('#tablaencargadopaciente').load("../tablas/tablaEncargadoPaciente");
						
		   				} else {
							
		   					swal(":(", "Fallo al eliminar!", "error");
		   				}
		   			}
		   		});	
		  } 
		});
		
	}
}
</script>