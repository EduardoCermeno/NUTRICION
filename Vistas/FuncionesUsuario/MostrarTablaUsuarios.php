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
		  

		    <div class="row">
		    	<div class="col-sm-12">
                <?php  include"../tablas/botones.php"?>
		    	</div>
				
		    </div>
		    <hr>
		   	<div class="row">
		   		<div class="col-sm-12">
		   			 <div id="tablaUsuarioss" ></div> 
					
		   		</div>
		   	</div>
		  </div>
		</div>



<!-- CREANDO CITA -->



 </div>
            </div> 


            </div> </div>
            <script src="../../Librerias/jquery-3.6.0.min.js"></script>
            <!-- <script src="../../Js/AgregarCita.js"></script> -->
           

		
<script type="text/javascript">

		$(document).ready(function(){
			
			$('#tablaUsuarioss').load("../tablas/tablaUsuarios");
			

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
