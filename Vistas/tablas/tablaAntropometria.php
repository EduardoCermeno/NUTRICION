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
				<td>Nombre</td>
                <td>Altura</td>
				<td>Peso</td>
                <td>Edad</td>
                <td>Género</td>
                <td>IMC</td>
				<td>MCM</td>
				<td>Estado Nutricional</td>
               
			</tr>
		</thead>
		<tbody>

		<?php
			$sql = "SELECT 
            P.Nombre_Paciente as nombre,
			P.Apellido_Paciente as apellido,
            A.Id_Antropometria , 
            A.Id_Paciente, 
            A.Peso, 
            A.Altura, 
            A.Edad, 
            A.Sexo, 
            A.Peso_Ideal, 
            A.PorcentajePI, 
            A.IMC, 
            A.ARSC, 
            A.MCM, 
            A.EstadoNutricional,
             A.ACM
       FROM tb_antropometia as A
       INNER JOIN tb_paciente as P on  A.Id_Antropometria=P.Id_Paciente"; 
			$result = mysqli_query($Conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				
				
				
		?>
			 <tr style="text-align: center;">
			 <?php $NombreCompleto= $mostrar['nombre']." ".$mostrar['apellido'];?>
				<td> <?php echo $NombreCompleto?></td>
				<td><?php echo $mostrar['Altura']; ?></td>
				<td><?php echo  $mostrar['Peso'];?></td>
                <td><?php echo $mostrar['Edad']; ?></td>
                <td><?php echo $mostrar['Sexo']; ?></td>
                <td><?php echo $mostrar['IMC']; ?></td>
                <td><?php echo $mostrar['MCM']; ?></td>
                <td><?php echo $mostrar['EstadoNutricional']; ?></td>
				
				
				
				


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