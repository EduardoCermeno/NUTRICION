<?php
require_once 'Conexion.php';

class actualizainformacionmedicamento extends Conectar{
public function ActualizaMedicamento($datos){

$conexion = Conectar::conexion();
$sql = "UPDATE tb_medicamento SET 
                            
                            Nombre_Medicamento=?,
                            Tipo_Medicamento=?,
                            Dosis_Medicamento=?,
                            Horario_Medicamento=?,
                            Descripcion_Medicamento=?,
                            AplicacionMedicamento=?
                         WHERE Id_Medicamento=? ";
            $query=$conexion->prepare($sql);

$query->bind_param("ssssssi",
                            $datos['Nmediacmento'],
                            $datos['TMedicamento'],
                            $datos['DosisM'],
                            $datos['HMedicamento'],
                            $datos['DMedicamento'],
                            $datos['APMedicamento'],
                            $datos['idmedicamento']);
                                      
                           
$respuesta=$query->execute();
$query->close();
return $respuesta;



}
}
?>