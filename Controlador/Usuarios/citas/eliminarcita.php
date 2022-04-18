<?php 
	
require_once '../../../Modelo/CITAS.php';


	

 
	$citasobj = new citas();
    echo $citasobj->eliminarcita($_POST['idcita']);
    
	
 


?>

