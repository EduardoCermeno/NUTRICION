<?php

session_start();
require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();



?>





<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablacitasReservada">
		<thead>
			<tr style="text-align: center;">
				<td>Id</td>
				<td>NombreMedicamento</td>
				<td>Tipo</td>
				<td>Dosis</td>
				<td>Hora</td>
				<td>Descripcion</td>
				<td>Aplicacion</td>
				
				<td>Eliminar</td>
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = " SELECT
			   
			Id_Medicamento, 
			Nombre_Medicamento,
		    Tipo_Medicamento,
			Dosis_Medicamento,
			Horario_Medicamento,
			Descripcion_Medicamento,
			AplicacionMedicamento
											
			FROM tb_medicamento "; 
			$result = mysqli_query($Conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				
				
				
		?>
			 <tr style="text-align: center;">
				
				<td><?php echo $mostrar['Id_Medicamento']; ?></td>
				<td><?php echo $mostrar['Nombre_Medicamento']; ?></td>
				<td><?php echo  $mostrar['Tipo_Medicamento']; ?></td>
				<td><?php echo  $mostrar['Dosis_Medicamento']; ?></td>
				<td><?php echo  $mostrar['Horario_Medicamento']; ?></td>
				<td><?php echo  $mostrar['Descripcion_Medicamento']; ?></td>
				<td><?php echo  $mostrar['AplicacionMedicamento']; ?></td>

			
				
				<td>

				<span class="btn btn-danger btn-sm" 
							 >
							
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
			$('#tablacitasReservada').DataTable();

			// $('#btnGuardarCategoria').click(function(){
			// 	agregarCategoria();
			// });

			//  $('#btnActualizaCategoria').click(function(){
			// 	obtenerDatosCategoria();
			//  });
		});
	</script>
	
	