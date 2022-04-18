<?php

session_start();
if (isset($_SESSION['usuario'])){
include "../header.php";
require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();
?>




<div id="layoutSidenav_content">

<div class="row  justify-conten-center">
      <div class="col-sm-12">
</div>
		    	<div class="col-sm-12">
        <div   class="alert alert-primary" role="alert" >
<H3 style="text-align:center; font-family: Serif; color: blac">RESERVAR CITA</H3>
</div>
</div></div>



<div class="container" id="contenedor1" class="col-sm-12" style="margin-left: 25%;">
         
      <form class="row gx-3 gy-2 align-items-center" id="formulariocitas" onsubmit=" return Programacita()">
    
 <!-- fila dos -->

 <div class="row mb-3">
<div class="col-sm-6">
    <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text"   class="col-sm-3">Nombre</div>
      <input type="text" class="form-control" id="nombre" name="nombre" id="specificSizeInputGroupUsername" required="">
    </div>
  </div>
  <div class="row mb-3" style="margin-top: 10px;">
  <div class="col-sm-6">
  <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text" class="col-sm-3">Direcció</div>
      <input type="text" id="direccion" name="direccion"  class="form-control" id="specificSizeInputGroupUsername" required="">
    </div>
  </div>
 </div>
 
 
  <div class="row mb-3">
  <div class="col-sm-6">
    <label class="visually-hidden" for="specificSizeSelect">AREA</label>
    <select class="form-select" id="area" name="area" id="specificSizeSelect" required="">
      <option selected >Seleccionar ÁREA</option>
      <option value="Pediatría">Pediatría</option>
      <option value="Dentista">Dentista</option>
      <option value="Doctor General">Doctor General</option>
      
    </select>
  </div>
  </div>
  <div class="row mb-3">
  <div class="col-sm-6">
    <label class="visually-hidden" for="specificSizeSelect">AREA</label>
   
    <select class="form-select" id="fechacita" name="fechacita"  id="specificSizeSelect" required="">
        <option value="">Fecha de Cita:</option>
      
<?php 
                
                $sql = "SELECT  Id_FechaCita,
                                StatusCita,
                                FechaCita 
                FROM tb_fechacita where StatusCita='Disponible' "; 
                $result = mysqli_query($Conexion, $sql);
               
                while($mostrar = mysqli_fetch_array($result)){ 
          
                  echo '<option  value=" '. $mostrar['FechaCita']. '">'.$mostrar['FechaCita'].'</option>';
                }
                // $_SESSION['idcitas'];
               
      
                ?>
                


                
              
                  
</select>



  </div>
  </div>

  <div class="col-auto">
    <button type="submit" class="btn btn-warning">Agendar Cita</button>
  </div>

 
</form>

</div>
</div>





       </div>
            </div>



          
         

            <script src="../../Librerias/jquery-3.6.0.min.js"></script>
           
      <script>

function  Programacita() {
		

			$.ajax({
				method: "POST",
				data: $('#formulariocitas').serialize(),
        url:"../../Controlador/Usuarios/citas/programarcita.php",
				success:function(respuesta){

					respuesta = respuesta.trim();

					if (respuesta == 1) {
						$("#formulariocitas")[0].reset();
						swal(":D", "Se ha programado la cita con Éxito!", "success");
					}  else {
						swal(":(", "Fallo al agregar!", "Error");
					}
				}
			});

			return false;

		}
	
	</script>




      </script>





          

   <?php
   include "../footer.php";
}else {

   header("location:../../index.php");

}

   ?>


</script>