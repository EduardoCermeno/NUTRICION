<?php
require_once '../../Modelo/actualizainformacionEncargado.php';



$actualizaEncargado=new actualizainformacionencargado();

$datos=array(

    "idencargado"=>$_POST['idencargado'],
    "NombreEP"=>$_POST['NombreEP'],
    "ApellidosEP"=>$_POST['ApellidosEP'],
    "TelefonoEP"=>$_POST['TelefonoEP'],
    "CorreoEP"=>$_POST['CorreoEP'],
    "DireccionEP"=>$_POST['DireccionEP']

);




echo $actualizaEncargado->ActualizaEncargado($datos);

?>
