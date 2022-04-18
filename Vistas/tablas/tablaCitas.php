<?php

session_start();
require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();



?>





<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablacitas">
		<thead>
			<tr style="text-align: center;">
				<td>Id_fechaCita</td>
				<td>FechaCita</td>
				<td>Status</td>
				<td>editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT Id_FechaCita,
						   FechaCita, 
						   StatusCita
					FROM tb_fechacita where StatusCita='Disponible'"; 
			$result = mysqli_query($Conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				$idcita = $mostrar['Id_FechaCita'];
				
				
		?>
			 <tr style="text-align: center;">
				<td><?php 
				// $_SESSION['Citando']= $mostrar['Id_FechaCita'];
				echo  $mostrar['Id_FechaCita'];?></td>
				<td><?php echo $mostrar['FechaCita']; ?></td>
				<td><?php echo  $mostrar['StatusCita']; ?></td>

			
				<td>
					<span class="btn btn-warning btn-sm" 
						
						data-toggle="modal" data-target="#modalActualizarCita">
						
						<span class="fas fa-edit"
						onclick="obtenerDatosCategoria('<?php echo  $mostrar['Id_FechaCita'];?>')" >

						<data-toggle="modal" data-target="#modalActualizarCita">
						
						</span>
					</span>
				</td>
				<td>

				<span class="btn btn-danger btn-sm" 
							onclick="eliminarCitas('<?php echo $idcita?>')" >
							
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
<!--  -->

            <script src="../../Js/AgregarCita.js"></script>
<!-- <script src="../../Librerias/datatable/jquery.dataTables.min.js"></script> -->

<script type="text/javascript">
		$(document).ready(function(){
			$('#tablacitas').DataTable();

			// $('#btnGuardarCategoria').click(function(){
			// 	agregarCategoria();
			// });

			//  $('#btnActualizaCategoria').click(function(){
			// 	obtenerDatosCategoria();
			//  });
		});
	</script>
	
	