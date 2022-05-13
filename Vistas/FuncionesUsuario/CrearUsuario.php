<?php

session_start();
if (isset($_SESSION['usuario'])){
include "../header.php";


?>

<div id="layoutSidenav_content">

			
			
			<div class="row justify-conten-center" style="margin-left:20px ; margin-right:20px">
<div class="container"  style="background-color:#F0F3F4   ; border-radius: 30px 30px 30px 30px;  opacity: 0.85; ">

		<h3 style="text-align: center;">Registro de usuario</h3>
		<hr>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<form id="frmRegistro" method="post" onsubmit=" return agregarUsuarioNuevo()" 
				autocomplete="off">
				<div class="row">
				<div class="col-sm-6">
					<label>Nombre persona</label>
					<input type="text" name="nombre" id="nombre" class="form-control" required="">
					</div>
				
					<div class="col-sm-6">
					<label>Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class="form-control" required="">
					</div>
					</div>
					<label>Fecha de nacimiento</label>
					<input  type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control"  required="" >
					
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
								<option value="Usuario" >Usuario</option>
      
					</select>
					<br>
				
				<div class="row">
						<div class="col-sm-4 text-left" style="margin-bottom: 10px;">
							<button   class="btn btn-warning">Registrar</button>
							<button  type="reset" class="btn btn-primary">Limpiar</button>
							
							
							
						
						
						 
							
					
						 
						</div>
				
					

				</form>
			</div>
			
		</div>
	</div>
	</div>
	</div>

</div>
	<!-- <script src="librerias/jquery-3.4.1.min.js"></script> -->
	<!-- <script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
	<script src="librerias/sweetalert.min.js"></script> -->

	<script src="../../Librerias/jquery-3.6.0.min.js"></script>


<script>

function agregarUsuarioNuevo() {
	var  pass1=document.getElementById('password').value;
 var pass2=document.getElementById('password1').value;
if(pass1==pass2){


  	



			$.ajax({
				method: "POST",
				data: $('#frmRegistro').serialize(),
				url: "../../Controlador/Usuarios/CrearUsuario.php",
				success:function(respuesta){

					respuesta = respuesta.trim();

					if (respuesta == 1) {
						$("#frmRegistro")[0].reset();
						swal(":D", "Agregado con exito!", "success");
					} else if(respuesta == 2){
						swal("Este usuario ya existe, por favor escribe otro !!!");
					} else {
						swal(":(", "Fallo al agregar!", "Error");
					}
				}
			});

			return false;

		}
		else{
			swal("No coinciden las contraseñas !!!");
			return false;
		}					
		}
	</script>




<script>
function Limpiar(){
    $("#frmRegistro")[0].reset()
</script>







   <?php
   include "../footer.php";
   
}else {

   header("location:../../index.php");

}
