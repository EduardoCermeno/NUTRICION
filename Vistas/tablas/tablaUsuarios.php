<?php
session_start();
require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();



?>







<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaUsuarios">
		<thead>
			<tr style="text-align: center;">
			<td>Nombres</td>
				<td>Nombres</td>
				<td>Apellidos</td>
				<td>Nombre_Usuario</td>
                <td>Rol_Usuario</td>
				<td>editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "select Id_usuario, Nombre, Apellido_Usuario,  Nombre_Usuario, Rol_Usuario   from tb_usuarios "; 
			$result = mysqli_query($Conexion, $sql);
			
			while($mostrar = mysqli_fetch_array($result)){ 
				// $idcita = $mostrar['Id_FechaCita'];
				
				
		?>
		
			 <tr style="text-align: center;">
			 <td><?php echo $mostrar['Id_usuario']; ?></td>
                <td><?php echo  $mostrar['Nombre']; ?></td>
				<td><?php echo $mostrar['Apellido_Usuario']; ?></td>
				<td><?php echo  $mostrar['Nombre_Usuario']; ?></td>
                <td><?php echo  $mostrar['Rol_Usuario']; ?></td>

			

				<td>

				<span class="btn btn-warning btn-sm " data-toggle="modal" data-target="#modalActuaUsuario"
							onclick="ObtenerdatosUsuario('<?php echo $mostrar['Id_usuario']?>') " >
							
						<span class="fas fa-edit"></span>
					</span>
					
				</td>
				<td>

				<span class="btn btn-danger btn-sm" 
							onclick="	eliminarUsuario('<?php echo $mostrar['Id_usuario']?>') " >
							
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




<div class="modal fade" id="modalActuaUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="actualizandousuario" method="POST" autocomplete="off">
 
				<div class="row">
				<div class="col-sm-6">
					<label>Nombre persona</label>
					<input type="text" name="nombre" id="nombre" class="form-control"  required="">
					</div>
				
					<div class="col-sm-6">
					<input type="text" name="idusuario" id="idusuario" hidden="">
					
					<label>Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class="form-control" required="">
					</div>
					</div>
					<label>Fecha de nacimiento</label>
					<input  type="date" name="fechaNacimiento" id="fechaNacimiento"  class="form-control"  required="" >
					
					<label>Nombre de usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control" required="">
					<label>Ingresar Contraseñia</label>
					<input type="password" name="password" id="password" class="form-control" required="">
					<label>Confirmar Contraseña</label>
					<input type="password" name="password1" alt="strongPass" onclick="Limpiar()" id="password1" class="form-control" required="">
					<label>Usuarios</label>
					<select class="form-select" id="RolUsuario" name="RolUsuario"  id="specificSizeSelect">
								<option selected>Seleccionar Rol</option>
								<option value="SuperUsuario">SuperUsuario</option>
								<option value="Administrativo" >Administrativo</option>
								<option value="Usuario" >Usuario</option>
      
					</select>
					<br>
      
				
        </form>
      </div>
	
      <div class="modal-footer">
	  <button type="button"  class="btn btn-danger" id="modificausuario" data-dismiss="modal">Actualizar</button>
       
        <button type="button" onclick="cancelar()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>
<!--  -->

            <script src="../../Js/AgregarCita.js"></script>
<!-- <script src="../../Librerias/datatable/jquery.dataTables.min.js"></script> -->

<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaUsuarios').DataTable();
			
		
			$('#modificausuario').click(function(){
				actualizausuario();

			});

		
		});
	</script>
	
	<script>

function eliminarUsuario(idUsuario) {
	IDUSUARIO=parseInt(idUsuario)

	if (IDUSUARIO< 1) {
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
		   			data:"IDUSUARIO=" + IDUSUARIO,
		   			url:"../../Controlador/Usuarios/EliminarUsuario.php",
		   			success:function(respuesta){
					
		   				respuesta = respuesta.trim();
		   				if (respuesta == 1  ) {
							
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
		
	}
}




</script>

<script>
function ObtenerdatosUsuario(idUsuario){
	IDUSUARIO=parseInt(idUsuario)
		$.ajax({
		   			type:"POST",
		   			data:"IDUSUARIO=" + IDUSUARIO,
		   			url:"../../Controlador/Usuarios/actualizausuario.php",
		   			success:function(respuesta){
						
					respuesta=jQuery.parseJSON(respuesta);
					
					$('#idusuario').val(respuesta['idusuario']);
					$('#nombre').val(respuesta['nombre']);
					$('#apellidos').val(respuesta['apellidos']);
					$('#fechaNacimiento').val(respuesta['fechanacimiento']);
					$('#usuario').val(respuesta['nombreUsuario']);
					$('#password').val(respuesta['password']);
				
					$('#RolUsuario').val(respuesta['rolusuario']);
		   				
		   			}
		   		});	 


}



function actualizausuario(){
	
		$.ajax({
		   			type:"POST",
		   			data:$('#actualizandousuario').serialize(),
		   			url:"../../Controlador/Usuarios/actualizainformacionusuario.php",
		   			success:function(respuesta){
						   
					if(respuesta==1){
						$('#tablaUsuarios').DataTable();
						swal(":d", "Usuario Actualizado", "success");
						
						
					}else{
						swal(":(", "fallo al actualizar", "error")

					}
		   			
		   			}
		   		});	 




}

</script>