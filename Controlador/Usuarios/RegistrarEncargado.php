<?php
	session_start();
require_once '../../Modelo/RegistrarEncargado.php';
// require_once '../../Modelo/loguin.php';


$datos = array(
    
	

"DpiPaciente" =>$_POST['DPI'],
"IDUSUARIO"=>$_SESSION['idUsuario'],
"NombreEP" => $_POST['NombreEP'],
"ApellidosEP"=>$_POST['ApellidosEP'],
"TelefonoEP" => $_POST['TelefonoEP'],
"CorreoEP" => $_POST['CorreoEP'],
"DirecciónEP" => $_POST['DirecciónEP'],

);

	 $EncargadoObj = new Padres();

	echo  $EncargadoObj->agregarEncargadoPaciente($datos);
	



?>