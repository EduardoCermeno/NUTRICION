<?php 
	

require_once '../../../Modelo/CITAS.php';


	
$datos = array(

		"fechacita" => $_POST['fechacita'],
		"estadocita" =>$_POST['estadocita']
	
);
 
	$citasobj = new citas();

	echo $citasobj->agregarcita($datos);
	
 



	

?>

