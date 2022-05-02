<?php
require_once 'Conexion.php';

class actualizainformacionpaciente extends Conectar{
public function ActualizaPaciente($datos){

$conexion = Conectar::conexion();
$sql = "UPDATE tb_paciente SET 
                            Dpi=?,
                            Nombre_Paciente=?, 
                            Apellido_Paciente=?, 
                            FechaNacimiento_Paciente=?, 
                            Genero_Paciente=?, 
                            EstadoPaciente=?
                              WHERE Id_Paciente=? "; 

$query=$conexion->prepare($sql);
$query->bind_param("ssssssi",
                            $datos['cui'],
                            $datos['nombres'],
                            $datos['apellidos'],
                            $datos['fechaNac'],
                            $datos['genero'],
                            $datos['estado'],
                            $datos['idpaciente']);
                            
                           

$respuesta=$query->execute();
$query->close();
return $respuesta;



}
}
?>