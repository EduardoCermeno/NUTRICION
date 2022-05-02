<?php
require_once '../../Modelo/actualizainformacionPaciente.php';



$actualizaPaciente=new actualizainformacionpaciente();

$datos=array(

    "idpaciente"=>$_POST['idpaciente'],
    "cui"=>$_POST['cui'],
    "nombres"=>$_POST['nombres'],
    "apellidos"=>$_POST['apellidos'],
    "fechaNac"=>$_POST['fechaNac'],
    "genero"=>$_POST['genero'],
    "estado"=>$_POST['estado']

);




echo $actualizaPaciente->ActualizaPaciente($datos);

?>
