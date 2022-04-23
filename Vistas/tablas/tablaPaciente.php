<?php

session_start();
require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();



?>





<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablapacientes">
		<thead>
			<tr style="text-align: center;">
				<td>Id_Paciente</td>
				<td>CUI</td>
				<td>Nombre</td>
                <td>Fecha Nacimiento</td>
                <td>Genero</td>
                <td>ESTADO</td>
				<td>ENCARGADO</td>
				<!-- <td>editar</td> -->
				<td>Eliminar</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT 
			P.Id_Paciente,
            P.Dpi, 
            P.Nombre_Paciente, 
            P.Apellido_Paciente, 
            P.FechaNacimiento_Paciente, 
			P.Genero_Paciente,
            P.EstadoPaciente,
			EP.Nombre_EncargadoPaciente
          
			FROM tb_paciente AS P INNER JOIN tb_encargadopaciente AS EP WHERE P.Id_Paciente =EP.Id_Paciente"; 
			$result = mysqli_query($Conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				
				
				
		?>
			 <tr style="text-align: center;">
				<td><?php echo  $mostrar['Id_Paciente'];?></td>
				<td><?php echo  $mostrar['Dpi'];?></td>
				<td><?php echo $mostrar['Nombre_Paciente']." ".$mostrar['Apellido_Paciente']; ?></td>
                <td><?php echo $mostrar['FechaNacimiento_Paciente']; ?></td>
                <td><?php echo $mostrar['Genero_Paciente']; ?></td>
                <td><?php echo $mostrar['EstadoPaciente']; ?></td>
				<td><?php echo $mostrar['Nombre_EncargadoPaciente']; ?></td>
				
				
				<!-- <td>
					<span class="btn btn-warning btn-sm" 
						
						data-toggle="modal" data-target="#modalActualizarCita">
						
						<span class="fas fa-edit"
					 >
						
						
						</span>
					</span>
				</td> -->
				<td>

				<span class="btn btn-danger btn-sm" 
							onclick="	eliminarPaciente('<?php echo $mostrar['Id_Paciente']?>') " >
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


<!-- 
            <script src="../../Js/Usuario/OperacionesPaciente.js"></script> -->
			<!-- <script src="../../Librerias/jquery-3.6.0.min.js"></script> -->
<!-- <script src="../../Librerias/datatable/jquery.dataTables.min.js"></script> -->



<script type="text/javascript">
		$(document).ready(function(){
			$('#tablapacientes').DataTable();

			// $('#modalEliminar').click(function(){
			// 	eliminarPaciente();
			// });

			//  $('#btnActualizaCategoria').click(function(){
			// 	obtenerDatosCategoria();
			//  });
		});
	</script>
	


	<script>

function eliminarPaciente(idpaciente) {
	IDPACIENTE=parseInt(idpaciente)

	if (IDPACIENTE< 1) {
		swal("No tienes id del Paciente!");
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
		   			data:"IDPACIENTE=" + IDPACIENTE,
		   			url:"../../Controlador/Usuarios/EliminarPaciente.php",
		   			success:function(respuesta){
						alert(respuesta)
		   				respuesta = respuesta.trim();
		   				if (respuesta == 1) {
							
		   					swal("Eliminado con exito!", {
		      					icon: "success",
								  
		    				});
							
							$('#tablaPacientes').load("../tablas/tablaPaciente");
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