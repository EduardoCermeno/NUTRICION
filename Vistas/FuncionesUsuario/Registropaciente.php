<?php

session_start();
if (isset($_SESSION['usuario'])){
include "../header2.php";


?>

<div id="layoutSidenav_content">

<form id="msform" onsubmit=" return Registrar()" autocomplete="off">
  
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">CREAR PACIENTE</h2>
    
    <input type="text" maxlength="9" name="dpi" id="dpi" class="form-control" placeholder="CUI" required="">
				
					<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres" required="">
				
					<input type="text" name="Apellido" id="Apellido" class="form-control" placeholder="Apellidos" required="" >

					<input type="date" name="fechaNac" id="FechaNac" class="form-control" placeholder="Fecha de Nacimiento" required="">
			 <label>Género</label>
      
					
          <select class="form-select" id="genero" name="genero" id="specificSizeSelect" required="">
 
      <option value="1">Masculino</option>
      <option value="2">Femenino</option>
     
      
    </select>
          <label>Estado </label>
         
				
          <select class="form-select" id="estado" name="estado" id="specificSizeSelect" required="">

      <option value="Activo">Activo</option>
      <option value="Inactivo">INACTIVO</option>
     
      
    </select>
    <input type="submit"  class="previous action-button" value="Crear" />
    <input type="reset"  class="previous action-button" value="CANCELAR" />
    
  </fieldset>
 

</form>
  </div>
  </div>


 






            <script type="text/javascript">
   function Registrar(){
        $.ajax({
            method:"POST",
            data:$('#msform').serialize(),
            url:"../../Controlador/Usuarios/RegistrarPaciente.php",
            success:function(respuesta) {
           
              respuesta = respuesta.trim();
          

              if (respuesta == 1) {
                $("#msform")[0].reset();
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
    $("#msform")[0].reset();

   }
 </script>
 <script>
   function enlazar(){
   
    window.location.href='RegistrarEncargado.php'  

   }
 </script>

   <?php
   include "../footer.php";
   
}else {

   header("location:../../index.php");

}




