<?php

session_start();
if (isset($_SESSION['usuario'])){
include "../header2.php";



?>

<div id="layoutSidenav_content">

<div class="jumbotron jumbotron-fluid">
		  <div class="container">

<?php  include "../tablas/botones.php"?>
		    <!-- <div class="row">
		    	<div class="col-sm-4">
		    		<span class="btn btn-warning" data-toggle="modal" data-target="#crearcita">
		    			 <span class="fas fa-plus-circle"></span> Crear Nueva Cita
		    		</span>
		    	</div>
				
		    </div>
		    <hr> -->
		   	<div class="row">
		   		<div class="col-sm-12">
		   			 <div id="tablaPaciente" ></div> 
					
		   		</div>
		   	</div>
		  </div>
		</div>



<!-- CREANDO CITA -->


<!-- ACTUALIZANDO CITA -->



            </div> </div>
            <script src="../../Librerias/jquery-3.6.0.min.js"></script>
            <!-- <script src="../../Js/AgregarCita.js"></script> -->
           

<script type="text/javascript">

		$(document).ready(function(){
			
			$('#tablaPaciente').load("../tablas/tablaEncargadoPaciente.php");
			

			// $('#btnGuardarCita').click(function(){
			// 	agregarCita()
				
			// });

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
?>