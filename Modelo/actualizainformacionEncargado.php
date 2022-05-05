<?php
require_once 'Conexion.php';

class actualizainformacionencargado extends Conectar{
public function ActualizaEncargado($datos){

$conexion = Conectar::conexion();
$sql ="UPDATE tb_encargadopaciente SET 
                            Nombre_EncargadoPaciente=?,
                            Apellido_EncargadoPaciente=?,
                            Telefono_EncargadoPaciente=?,
                            Correo_EncargadoPaciente=?,
                            Direccion=?
                           
                            
                         WHERE Id_EncargadoPaciente=?";
            $query=$conexion->prepare($sql);

$query->bind_param("sssssi",
                            $datos['NombreEP'],
                            $datos['ApellidosEP'],
                            $datos['TelefonoEP'],
                            $datos['CorreoEP'],
                            $datos['DireccionEP'],
                            $datos['idencargado']
                            );
                                   
                        
$respuesta=$query->execute();
$query->close();
return $respuesta;



}
}
?>