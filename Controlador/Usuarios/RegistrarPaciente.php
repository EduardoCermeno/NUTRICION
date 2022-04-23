<?php
	session_start();
 require_once '../../Modelo/RegistrarPaciente.php';


$sexo='';
 if($_POST['genero']==1){
	$sexo="Masculino";
	
 }else{

	$sexo="Femenino";
 }

$datos = array(
"ID"=>$_SESSION['idUsuario'],
"dpi"=>$_POST['dpi'],
"nombres" => $_POST['nombre'],
"apellidos" => $_POST['Apellido'],
"fechaNac" => $_POST['fechaNac'],
"genero" =>$sexo,
"estado" => $_POST['estado'],
);

	 $usuarioObj = new Usuario();

	 echo $usuarioObj->agregarUsuario($datos);
	


?>