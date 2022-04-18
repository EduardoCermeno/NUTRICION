<?php
	session_start();
require_once '../../Modelo/loguin.php';
$codigo=$_POST['codigopaciente'];

$sexo='';
 if($_POST['genero']==1){
	$sexo="Masculino";
	
 }else{

	$sexo="femenino";
 }

$datos = array(
    
	
"ID"=>$_SESSION['idUsuario'],
"nombres" => $_POST['nombre'],
"codigopaciente"=>$_POST['codigopaciente'],
"apellidos" => $_POST['Apellido'],
"fechaNac" => $_POST['fechaNac'],
"genero" =>$sexo,
"etnia" => $_POST['etnia']
);

	$usuarioObj = new Usuario();

	echo $usuarioObj->agregarUsuario($datos);
	


?>