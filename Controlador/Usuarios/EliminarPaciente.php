<?php 
	
  require_once '../../Modelo/OperacionesPaciente.php';


	

 
	$prueba = new  Paciente();
    echo $prueba->eliminaPaciente($_POST['IDPACIENTE']);
    
	
 


?>
