<?php
	session_start();
require_once '../../Modelo/RegistrarPadres.php';
// require_once '../../Modelo/loguin.php';


$datos = array(
    
	
"ID"=>$_SESSION['idUsuario'],
"CodigoPaciente" =>$_POST['CodigoPaciente'],
"nombresP" => $_POST['nombresP'],
"apellidosP"=>$_POST['apellidosP'],
"nombresM" => $_POST['nombresM'],
"apellidosM" => $_POST['apellidosM'],
"dirección" => $_POST['dirección'],

);

	 $PadresObj = new Padres();

	echo  $PadresObj->agregarPadres($datos);
	



?>