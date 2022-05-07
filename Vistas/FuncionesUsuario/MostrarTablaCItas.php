<?php

session_start();
require_once "../../Modelo/Conexion.php";

$conexion=new Conectar();
$Conexion=$conexion->Conexion();

if (isset($_SESSION['usuario'])){
include "../header.php";

// $ID=$_SESSION['citando']; 


?>

<div id="layoutSidenav_content">

<div class="jumbotron jumbotron-fluid">
		  <div class="container">


     

	
<?php  include"../tablas/botones.php"?>
		   
				
		    </div>
		    <hr>
		   	<div class="row">
		   		<div class="col-sm-12">
		   			 <div id="tablaCitas" ></div> 
					
		   		</div>
		   	</div>
		  </div>
		</div>



<!-- CREANDO CITA -->
<div class="modal fade" id="crearcita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmcreandocitas" >
        	<label>Fecha de Cita</label>
        	<input type="datetime-local"  name="fechacita" id="fechacita" class="form-control" require="">
          <label>Estado</label>
        	<select class="form-select" id="estadocita" name="estadocita"  id="specificSizeSelect" require="">
								
								<option  id="llenar" value="Disponible">Disponible</option>
							
							
      
					</select>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCita">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- ACTUALIZANDO CITA -->

<div class="modal fade" id="modalActualizarCita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      		<form id="frmActualizarCita">
			  <label>Fecha de Cita</label>
        	<input type="datetime-local"  name="fechacita" id="fechacita" class="form-control" require="">
			  
          <select class="form-select" id="fech" name="fech"  id="specificSizeSelect">
        <option value="0">Seleccione:</option>
        <?php 
                
                $sql = "SELECT StatusCita,
                                FechaCita 
                FROM tb_fechacita "; 
                $result = mysqli_query($Conexion, $sql);
               
                while($mostrar = mysqli_fetch_array($result)){ 
                  echo '<option   value="">'.$mostrar['StatusCita'].'</option>';
                }
                // $_SESSION['idcitas'];
               
      
                ?>
              
                  
</select>
		





      		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" 
        	id="btnCerrarUpdateCategoria">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizaCategoria">Actualizar</button>
      </div>
    </div>
  </div>
</div>



 </div>
            </div> 


            </div> </div>
            <script src="../../Librerias/jquery-3.6.0.min.js"></script>
            <!-- <script src="../../Js/AgregarCita.js"></script> -->
           

<script type="text/javascript">

		$(document).ready(function(){
			
			$('#tablaCitas').load("../tablas/tablaCitas");
			

			$('#btnGuardarCita').click(function(){
				agregarCita()
				
			});

			// $('#btnActualizaCategoria').click(function(){
			// 	actualizaCategoria();
			// });
		});
	</script>

      


          




   <?php
   include "../footer.php";
   
}else {

   header("location:../../index.php");

}
