<?php
	session_start();
require_once '../../Modelo/RegistrarPaciente.php';


	

	$usuario = $_POST['login'];
	$password = $_POST['password'];

	$usuarioObj = new Usuario();

	echo $usuarioObj->login($usuario, $password);
	
 ?>

