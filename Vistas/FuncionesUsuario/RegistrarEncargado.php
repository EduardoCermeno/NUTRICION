<?php

session_start();
if (isset($_SESSION['usuario'])){
include "../header.php";


?>
<div id="layoutSidenav_content">

<form id="msform" onsubmit=" return Registrar()" autocomplete="off">
  
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">CREAR ENCARGADO</h2>
    
					<input type="text" maxlength="9" name="DPI" id="DPI" class="form-control" placeholder="CUI Del Paciente" required="">
          
					<input type="text" name="NombreEP" id="NombresenEP" class="form-control" placeholder="Nombre de Encargado" required="">
				
					<input type="text" name="ApellidosEP" id="ApellidoEP" class="form-control" placeholder="Apellidos de Encargado" required="">
					
					<input type="text" name="TelefonoEP" id="TelefonoEP" class="form-control" placeholder="Teléfono" required="" >
					
					<input type="email" name="CorreoEP" id="CorreoEP" class="form-control" placeholder="Correo" required="">
       
					<input type="text" name="DirecciónEP" id="DirecciónEP" class="form-control" placeholder="Dirección" required="">
                    
    <input type="submit"  class="previous action-button" value="Crear" />
    <input type="reset"  class="previous action-button" value="CANCELAR" />
    
  </fieldset>
 

</form>
  </div>























		





		


              
            <script src="../../Librerias/jquery-3.6.0.min.js"></script>
           
      

            <script type="text/javascript">
   function Registrar(){
        $.ajax({
            method:"POST",
            data:$('#msform').serialize(),
            url:"../../Controlador/Usuarios/RegistrarEncargado.php",
            success:function(respuesta) {
               
              respuesta = respuesta.trim();
         

              if (respuesta == 1) {
                $("#msform")[0].reset();
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
    $("#msform")[0].reset();

   }
 </script>

<script>
   function enlazar(){
   
    window.location.href='CrearMedicamento.php'  

   }
 </script>
   <?php
   include "../footer.php";
   
}else {

   header("location:../../index.php");

}
