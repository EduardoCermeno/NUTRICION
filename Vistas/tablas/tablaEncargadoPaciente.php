<?php

session_start();
require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();



?>





<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaantropometria">
		<thead>
			<tr style="text-align: center;">
				<td>ID</td>
                <td>NOMBRE Y APELLIDOS</td>
				<td>TELEFONO</td>
                <td>CORREO</td>
                <td>DIRECCION</td>
                
               
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT 
		  Id_EncargadoPaciente, 
		  Nombre_EncargadoPaciente, 
		  Apellido_EncargadoPaciente, 
		  Telefono_EncargadoPaciente, 
		  Correo_EncargadoPaciente, 
		  Direccion
          
			FROM tb_encargadopaciente"; 
			$result = mysqli_query($Conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				
				
				
		?>
			 <tr style="text-align: center;">
			 
				
				<td><?php echo $mostrar['Id_EncargadoPaciente']; ?></td>
                <td><?php echo $mostrar['Nombre_EncargadoPaciente']." ".$mostrar['Apellido_EncargadoPaciente']; ?></td>
                <td><?php echo $mostrar['Telefono_EncargadoPaciente']; ?></td>
                <td><?php echo $mostrar['Correo_EncargadoPaciente']; ?></td>
                <td><?php echo $mostrar['Direccion']; ?></td>
				
				
				
				


			</tr> 
			<?php 
			}

			?>
		</tbody>
	</table>

</div>



            <!-- <script src="../../Js/Usuario/OperacionesPaciente.js"></script> -->
			<!-- <script src="../../Librerias/jquery-3.6.0.min.js"></script> -->
<!-- <script src="../../Librerias/datatable/jquery.dataTables.min.js"></script> -->

<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaantropometria').DataTable();

			// $('#modalEliminar').click(function(){
			// 	eliminarPaciente();
			// });

			//  $('#btnActualizaCategoria').click(function(){
			// 	obtenerDatosCategoria();
			//  });
		});
	</script>
	



</script>