<?php

session_start();
if (isset($_SESSION['usuario'])){
include "../header.php";


?>



<div id="layoutSidenav_content">


<div class="container"style="  border-radius: 30px 30px 30px 30px;  opacity: 0.85; ">

<div class="row  justify-conten-center">
      <div class="col-sm-12">
</div>
		    	<div class="col-sm-12">
        <div   class="alert alert-primary" role="alert" >
<H3 style="text-align:center; font-family: Serif; color: blac">REGISTRAR PACIENTE</H3>
</div>
</div></div>


		<hr>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<form id="frmRegistro"   onsubmit="return Registrar()" 
				autocomplete="off">
        <label>DPI Del Paciente</label>
					<input type="text" name="dpi" id="dpi" class="form-control" required="">
					<label>Nombres</label>
					<input type="text" name="nombre" id="nombre" class="form-control" required="">
					<label>Apellidos</label>
					<input type="text" name="Apellido" id="Apellido" class="form-control" required="" >
					<label>FechaNacimiento</label>
					<input type="date" name="fechaNac" id="FechaNac" class="form-control" required="">
			 <label>Género</label>
      
					<!-- <input type="text" name="genero" id="genero" class="form-control" required="">  -->
          <select class="form-select" id="genero" name="genero" id="specificSizeSelect" required="">
 
      <option value="1">Masculino</option>
      <option value="2">Femenino</option>
     
      
    </select>
          <label>ESTADO </label>
         
					<!-- <input type="text" name="etnia" id="etnia" class="form-control" required="">
					<br> -->
          <select class="form-select" id="estado" name="estado" id="specificSizeSelect" required="">

      <option value="Activo">Activo</option>
      <option value="Inactivo">INACTIVO</option>
     
      
    </select>
					<div class="row" style="margin-top: 10px;">
						<div class="col-sm-6 text-left" >
							<button type="submit"   class="btn btn-warning">Registrar</button>
						</div>
            <div class="col-sm-6 text-left" >
							<button  type="button" onclick="Limpiar()" class="btn btn-primary">Cancelar</button>
              
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
            url:"../../Controlador/Usuarios/RegistrarPaciente.php",
            success:function(respuesta) {
               alert(respuesta);
              respuesta = respuesta.trim();
          

              if (respuesta == 1) {
                $("#frmRegistro")[0].reset();
                swal(":D", "Agregado con exito!", "success");
              
                
                setTimeout('enlazar()',3000);
   
              } else if(respuesta == 2){
                swal("Este usuario ya existe, por favor escribe otro !!!");
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
   
    window.location.href='RegistrarPadres.php'  

   }
 </script>

   <?php
   include "../footer.php";
   
}else {

   header("location:../../index.php");

}




