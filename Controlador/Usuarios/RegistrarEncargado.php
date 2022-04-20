<?php
	session_start();
require_once '../../Modelo/RegistrarEncargado.php';
// require_once '../../Modelo/loguin.php';


$datos = array(
    
	

"DpiPaciente" =>$_POST['DpiPaciente'],
"NombreEP" => $_POST['NombreEP'],
"ApellidosEP"=>$_POST['ApellidosEP'],
"TelefonoEP" => $_POST['TelefonoEP'],
"CorreoEP" => $_POST['CorreoEP'],
"DirecciónEP" => $_POST['DirecciónEP'],

);

	 $PadresObj = new Padres();

	echo  $PadresObj->agregarEncargadoPaciente($datos);
	



?>