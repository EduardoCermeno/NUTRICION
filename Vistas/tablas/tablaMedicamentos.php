<?php

session_start();
require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();



?>





<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablmedicamentos">
		<thead>
			<tr style="text-align: center;">
				<td>Id</td>
				<td>NombreMedicamento</td>
				<td>Tipo</td>
				<td>Dosis</td>
				
				<td>Hora</td>
				<td>Descripcion</td>
				<td>Aplicacion</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
		</thead>
		<tbody>

		<?php
		$IDUSUARIO=$_SESSION['idUsuario'];
			$sql = " SELECT
			   
			Id_Medicamento, 
			Id_usuario,
			Nombre_Medicamento,
		    Tipo_Medicamento,
			Dosis_Medicamento,
			Horario_Medicamento,
			Descripcion_Medicamento,
			AplicacionMedicamento
											
			FROM tb_medicamento WHERE Id_usuario=$IDUSUARIO "; 
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
				<?php 
				if($mostrar['AplicacionMedicamento']=='si'){?>

					<td>
						
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="MediumSeaGreen" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
  					<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg>
					</td>
					<?php 
				}else if($mostrar['AplicacionMedicamento']=='no'){
					?>
						
						<td>
						
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
					<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
					</svg>
						</td>
					
				<?php 
				}
				?>
				

			
				<td>

				<span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizaMedicamento" 
							onclick="obtenermedicamento('<?php echo $mostrar['Id_Medicamento']?>')" >
							
						<span class="fas fas fa-edit"></span>
					</span>
					
				</td>

				<td>

				<span class="btn btn-danger btn-sm" 
							onclick="eliminarmedicamento('<?php echo $mostrar['Id_Medicamento']?>')" >
							
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



<div class="modal fade" id="modalActualizaMedicamento" style="background-color: black;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Medicamento </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color:gainsboro">
        <form id="actualizandomedicamento" method="POST" autocomplete="off">

					
					<input type="text" name="idmedicamento" id="idmedicamento" hidden="">
					
					
					<label >Nombre</label>
					
					<input  type="text" name="Nmediacmento" id="Nmediacmento"  class="form-control"  required="" >
					
					<label>Typo</label>
					<input type="text" name="TMedicamento" id="TMedicamento" class="form-control" required="">
					
					<label>Dosis</label>
					<input type="text" name="DosisM" id="DosisM" class="form-control" required="">
					
					<label>Descripcion</label>
					<input type="text" name="DMedicamento" id="DMedicamento" class="form-control" required="">
					
					<label>Aplica Medicamento</label>
					<select name="APMedicamento" id="APMedicamento" class="form-control" required="">
					<option value="si">si</option>
					<option value="no">no</option>
				</select>
					<label>Horario</label>
					<input type="time" name="HMedicamento" id="HMedicamento" class="form-control" required="">
					
					
					<br>
      
				
        </form>
      </div>
	
      <div class="modal-footer">
	  <button type="button"  class="btn btn-danger" id="modicamedicamento" data-dismiss="modal">Actualizar</button>
       
        <button type="button" onclick="cancelar()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>









<script type="text/javascript">
		$(document).ready(function(){
			$('#tablmedicamentos').DataTable();

			$('#modicamedicamento').click(function(){
				actualizamedicamento();
			});

			//  $('#btnActualizaCategoria').click(function(){
			// 	obtenerDatosCategoria();
			//  });
		});
	</script>
	
	<script>

function obtenermedicamento(idmedicamento){
	IDMEDICAMENTO=parseInt(idmedicamento)
		$.ajax({
		   			type:"POST",
		   			data:"IDMEDICAMENTO=" + IDMEDICAMENTO,
		   			url:"../../Controlador/Usuarios/ActualizaMedicamento.php",
		   			success:function(respuesta){
						alert(respuesta);
					respuesta=jQuery.parseJSON(respuesta);
					
					$('#idmedicamento').val(respuesta['idmedicamento']);
					$('#Nmediacmento').val(respuesta['Nmediacmento']);
					$('#TMedicamento').val(respuesta['TMedicamento']);
					$('#DosisM').val(respuesta['DosisM']);
					$('#DMedicamento').val(respuesta['DMedicamento']);
					$('#HMedicamento').val(respuesta['HMedicamento']);
					$('#APMedicamento').val(respuesta['APMedicamento'])
					
				
		   				
		   			}
		   		});	 


}



function actualizamedicamento(){
	
	$.ajax({
				   type:"POST",
				   data:$('#actualizandomedicamento').serialize(),
				   url:"../../Controlador/Usuarios/actualizainformacionMedicamento.php",
				   success:function(respuesta){
					   alert(respuesta);
				if(respuesta==1){
					$('#tablaUsuarios').DataTable();
					swal(":d", "Medicamento Actualizado", "success");
					$('#tablmedicamentos').load("../tablas/tablaMedicamentos");
					
				}else{
					swal(":(", "fallo al actualizar", "error")

				}
				   
				   }
			   });	 




}




function eliminarmedicamento(idmedicamento) {
	IDMEDICAMENTO=parseInt(idmedicamento)
alert(IDMEDICAMENTO);
	if (IDMEDICAMENTO< 1) {
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
		   			data:"IDMEDICAMENTO=" + IDMEDICAMENTO,
		   			url:"../../Controlador/Usuarios/EliminarMedicamento.php",
		   			success:function(respuesta){
					alert(respuesta);
		   				respuesta = respuesta.trim();
		   				if (respuesta == 1  ) {
							
		   					swal("Eliminado con exito!", {
								
		      					icon: "success",
								  
		    				});
							$('#tablmedicamentos').load("../tablas/tablaMedicamentos");
						
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