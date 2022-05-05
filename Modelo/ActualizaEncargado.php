<?php
require_once 'Conexion.php';
 
class actualizaencargado extends Conectar{

public function obtenenerencargado($idencargado){

$conexion=Conectar::conexion();
$sql="SELECT    Id_EncargadoPaciente,
                Nombre_EncargadoPaciente, 
                Apellido_EncargadoPaciente,
                Telefono_EncargadoPaciente, 
                Correo_EncargadoPaciente, 
                Direccion FROM tb_encargadopaciente WHERE Id_EncargadoPaciente='$idencargado'";
$result = mysqli_query($conexion, $sql);
$mostrar = mysqli_fetch_array($result);


$dato=array(
    "Id_EncargadoPaciente"=>$mostrar['Id_EncargadoPaciente'],
    "Nombre_EncargadoPaciente"=>$mostrar['Nombre_EncargadoPaciente'],
    "Apellido_EncargadoPaciente"=>$mostrar['Apellido_EncargadoPaciente'],
    "Telefono_EncargadoPaciente"=>$mostrar['Telefono_EncargadoPaciente'],
    "Correo_EncargadoPaciente"=>$mostrar['Correo_EncargadoPaciente'],
    "Direccion"=>$mostrar['Direccion']


);

return  $dato;
}

}



?>