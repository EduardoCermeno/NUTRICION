<?php

session_start();
if (isset($_SESSION['usuario'])){
include "../header.php";


?>



<div id="layoutSidenav_content">

<div class="container">

<div class="row  justify-conten-center">
      <div class="col-sm-12">
</div>
		    	<div class="col-sm-12">
        <div   class="alert alert-primary" role="alert" >
<H3 style="text-align:center; font-family: Serif; color: blac">REGISTRAR PADRES DEL PACIENTE</H3>
</div>
</div></div>

		





		<div class="row" style="margin-left: 20%;">

			<div class="col-sm-8">
				<form id="frmRegistro" method="post" onsubmit="return Registrar()" 
				autocomplete="off">
        <label>Código de Paciente</label>
					<input type="text" name="CodigoPaciente" id="CodigoPaciente" class="form-control" required="">
          <label>Nombres del padre</label>
					<input type="text" name="nombresP" id="nombresP" class="form-control" required="">
					<label>Apellidos del Padre</label>
					<input type="text" name="apellidosP" id="apellidoPs" class="form-control" required="">
					<label>Nombres de la madre</label>
					<input type="text" name="nombresM" id="nombresM" class="form-control" required="" >
					<label>Apellidos de la madre</label>
					<input type="text" name="apellidosM" id="apellidosM" class="form-control" required="">
                    <label>Dirección</label>
					<input type="text" name="dirección" id="dirección" class="form-control" required="">
                    
			
          
					<div class="row" style="padding-top: 20px;">
						<div class="col-sm-6 text-left" >
							<button type="submit" class="btn btn-warning">Registrar</button>
						</div>
            
            <div class="col-sm-6 text-left" >
							<button type="button" onclick="Limpiar()" class="btn btn-danger">Cancelar</button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>



                </div>
            </div>
            <script src="../../Librerias/jquery-3.6.0.min.js"></script>
           
      

            <script type="text/javascript">
   function Registrar(){
        $.ajax({
            method:"POST",
            data:$('#frmRegistro').serialize(),
            url:"../../Controlador/Usuarios/RegistrarPadres.php",
            success:function(respuesta) {
               
              respuesta = respuesta.trim();
         

              if (respuesta == 1) {
                $("#frmRegistro")[0].reset();
                swal(":D", "Agregado con exito!", "success");
                setTimeout('enlazar()',3000);
              } else if(respuesta == 2){
                swal("No se encuentra ningun paciente registrado con el código de paciente Indicado !!!");
              } else {
                swal(":(", "Fallo al agregar!", "error");
              }
              }         });

                    return false;
              }
            
 </script>

 <script>
   function Limpiar(){
    $("#frmRegistro")[0].reset();

   }
 </script>

<script>
   function enlazar(){
   
    window.location.href='calculadora.php'  

   }
 </script>
   <?php
   include "../footer.php";
   
}else {

   header("location:../../index.php");

}