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
				
				<td>CUI</td>
				<td>Nombre</td>
                <td>Fecha Nacimiento</td>
                <td>Genero</td>
                <td>ESTADO</td>
				<td>ENCARGADO</td>
				<td>Medicamento</td>
				 <td>editar</td> 
				<td>Eliminar</td>
			</tr>
		</thead>
		<tbody>

		<?php
	
		$IDUSUARIO=$_SESSION['idUsuario'];
		
		if($_SESSION['ROLUSUARIO']=="SuperUsuario"){
			$sql = " SELECT 
			P.Id_Paciente,
			P.Id_usuario,
            P.Dpi, 
            P.Nombre_Paciente, 
            P.Apellido_Paciente, 
            P.FechaNacimiento_Paciente, 
			P.Genero_Paciente,
            P.EstadoPaciente,
			EP.Nombre_EncargadoPaciente,
			EP.Apellido_EncargadoPaciente,
            M.Nombre_Medicamento
			
          
			FROM tb_paciente AS P INNER JOIN tb_encargadopaciente AS EP on P.Id_Paciente =EP.Id_EncargadoPaciente LEFT JOIN  tb_medicamento AS M on P.Id_Paciente=M.Id_Medicamento " ; 
}else if($_SESSION['ROLUSUARIO']=="Usuario"){
	$sql = " SELECT 
	P.Id_Paciente,
	P.Id_usuario,
	P.Dpi, 
	P.Nombre_Paciente, 
	P.Apellido_Paciente, 
	P.FechaNacimiento_Paciente, 
	P.Genero_Paciente,
	P.EstadoPaciente,
	EP.Nombre_EncargadoPaciente,
	EP.Apellido_EncargadoPaciente,
	M.Nombre_Medicamento
	
  
	FROM tb_paciente AS P INNER JOIN tb_encargadopaciente AS EP 
	on P.Id_Paciente =EP.Id_EncargadoPaciente LEFT JOIN 
    tb_medicamento AS M on P.Id_Paciente=M.Id_Medicamento WHERE P.Id_usuario=$IDUSUARIO" ; 


}

		$result = mysqli_query($Conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				
				
				
		?>
			 <tr style="text-align: center;">
			 	
				<td><?php echo  $mostrar['Dpi'];?></td>
				<td><?php echo $mostrar['Nombre_Paciente']." ".$mostrar['Apellido_Paciente']; ?></td>
                <td><?php echo $mostrar['FechaNacimiento_Paciente']; ?></td>
                <td><?php echo $mostrar['Genero_Paciente']; ?></td>
                <td><?php echo $mostrar['EstadoPaciente']; ?></td>
				<td><?php echo $mostrar['Nombre_EncargadoPaciente']." ".$mostrar['Apellido_EncargadoPaciente']; ?></td>
				<td><?php  if($mostrar['Nombre_Medicamento']==""){
				echo "Si Aplica";	
				}else if($mostrar['Nombre_Medicamento']!="") {echo " No Aplica";}?></td>
				
				
				<td>

				<span class="btn btn-warning btn-sm " data-toggle="modal" data-target="#modalActualizaPaciente"
				onclick="	ObtenerdatosPaciente('<?php echo $mostrar['Id_Paciente']?>') " >
							
						<span class="fas fa-edit"></span>
					</span>
					
				</td>
			

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


<div class="modal fade" id="modalActualizaPaciente" tabindex="-1" role="dialog" style="background-color: black;" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar 	Paciente </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color:gainsboro">
        <form id="actualizandopaciente" method="POST" autocomplete="off">
 
				<div class="row">
				<input type="text" name="idpaciente" id="idpaciente" hidden="">
				<label> CUI</label>
					<input type="text" maxlength="8" name="cui" id="cui" class="form-control" required="">
					
					<label> Nombre</label>
					<input type="text" name="nombres" id="nombres" class="form-control" required="">
					<br>
					<label >Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class="form-control" required="">
					<br>
					<label>Fecha de nacimiento</label>
					<input  type="date" name="fechaNac" id="fechaNac"  class="form-control"  required="" >
					<br>
					<label >Género</label>
					<select class="form-select" id="genero" name="genero"  id="specificSizeSelect">
								<option selected>Seleccionar Género</option>
								<option value="Masculino">Masculino</option>
								<option value="Femenino" >Femenino</option>
								
					</select>
					
					<label >ESTADO</label>
					<select class="form-select" id="estado" name="estado"  id="specificSizeSelect">
								<option selected>Seleccionar Género</option>
								<option value="ACTIVO">ACTIVO</option>
								<option value="INACTIVO" >INACTIVO</option>
								
					</select>

				
					
					
					
				
					
					
		
      
				
        </form>
      </div>
	
      <div class="modal-footer">
	  <button type="button"  class="btn btn-danger" id="modificapaciente" data-dismiss="modal">Actualizar</button>
       
        <button type="button" onclick="cancelar()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>
<!--  -->


















<script type="text/javascript">
		$(document).ready(function(){
			$('#tablapacientes').DataTable();
			$('#modificapaciente').click(function(){
				actualizapaciente();

			});
			// $('#modalEliminar').click(function(){
			// 	eliminarPaciente();
			// });

			//  $('#btnActualizaCategoria').click(function(){
			// 	obtenerDatosCategoria();
			//  });
		});
	</script>
	



	

	<script>

function ObtenerdatosPaciente(idPaciente){
	IDPACIENTE=parseInt(idPaciente)
		$.ajax({
		   			type:"POST",
		   			data:"IDPACIENTE=" + IDPACIENTE,
		   			url:"../../Controlador/Usuarios/ActualizaPaciente.php",
		   			success:function(respuesta){
						
					respuesta=jQuery.parseJSON(respuesta);
					
					$('#idpaciente').val(respuesta['idpaciente']);
					$('#cui').val(respuesta['dpi']);
					$('#nombres').val(respuesta['nombrespaciente']);
					$('#apellidos').val(respuesta['apellidospaciente']);
					$('#fechaNac').val(respuesta['fechanacimientopaciente']);
					$('#genero').val(respuesta['generopaciente']);
					$('#estado').val(respuesta['estadopaciente'])
				
		   				
		   			}
		   		});	 


}


function actualizapaciente(){
	
	$.ajax({
				   type:"POST",
				   data:$('#actualizandopaciente').serialize(),
				   url:"../../Controlador/Usuarios/actualizainformacionPaciente.php",
				   success:function(respuesta){
					
				if(respuesta==1){
					$('#tablaUsuarios').DataTable();
					swal(":d", "Paciente Actualizado", "success");
					$('#tablapacientes').load("../tablas/tablaPaciente");
					
				}else{
					swal(":(", "fallo al actualizar", "error")

				}
				   
				   }
			   });	 




}

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