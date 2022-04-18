<?php
require_once '../../Modelo/CrearUsuario.php';



$actualizausuario=new CrearUsuario();

$datos=array(

    "id"=>$_POST['idusuario'],
    "nombre"=>$_POST['nombre'],
    "apellido"=>$_POST['apellidos'],
    "fechanacimiento"=>$_POST['fechaNacimiento'],
    "nombreusuario"=>$_POST['usuario'],
    "password"=>$_POST['password'],
    "rol"=>$_POST['RolUsuario']

);



echo $actualizausuario->actualizausuario($datos);

?>
