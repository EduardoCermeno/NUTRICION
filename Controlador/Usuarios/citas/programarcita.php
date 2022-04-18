<?php 
	

 session_start();
 require_once '../../../Modelo/CITAS.php';


	


	$reservacita = array(
		// "ID"=>$_SESSION['idUsuario'],
		// "IdfechaCitas" => $_SESSION['ID_fechacita'],
		"IdPaciente" => $_SESSION['idUsuario'],
		"fechacita" =>$_POST['fechacita'],
		"nombre" => $_POST['nombre'],
		"direccion" =>$_POST['direccion'],
		"area" =>$_POST['area'],
	    
		
		 
		
		  
	
);

 
	$CitasReservadas = new citas();

	 echo $CitasReservadas->ReservarCita($reservacita);
	
	


?>
