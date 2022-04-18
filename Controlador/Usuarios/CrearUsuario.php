<?php 

require_once '../../Modelo/CrearUsuario.php';

	 $password = $_POST['password'];
	//  $fechaNacimiento = explode("-", $_POST['fechaNacimiento']);
	//  $fechaNacimiento = $fechaNacimiento[2] . "-" . $fechaNacimiento[1] . "-" . $fechaNacimiento[0];
	$datos = array(
				"nombre" => $_POST['nombre'],
				"Apellidos" => $_POST['apellidos'], 
			    "fechaNacimiento" => $_POST['fechaNacimiento'], 
			    "Nombre_Usuario" => $_POST['usuario'], 
			    "password" => $password,
				"RolUsuario" => $_POST['RolUsuario'] 
			);

	$usuario = new CrearUsuario();
	echo $usuario->RegistrarUsuario($datos);
    //  print_r($datos);
 ?>