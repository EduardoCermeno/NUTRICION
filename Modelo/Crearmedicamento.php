<?php
require_once 'Conexion.php';
 class Crearmedicamento extends Conectar{

public function agregamedicmaneto($datos){

	$conexion = Conectar::conexion();
    $sql="INSERT INTO tb_medicamento(   Id_Paciente, 
                                        Nombre_Medicamento, 
                                        Tipo_Medicamento,
                                        Dosis_Medicamento, 
                                        Horario_Medicamento, 
                                        Descripcion_Medicamento, 
                                        AplicacionMedicamento) VALUES(?,?,?,?,?,?,?)";

$query = $conexion->prepare($sql);
		
$query->bind_param("issssss", 
                                $datos['IDPACIENTE'],
                                $datos['Nmediacmento'],
                                $datos['TMedicamento'],               
                                $datos['DosisM'],
                                $datos['HMedicamento'],
                                $datos['DMedicamento'],
                                $datos['APMedicamento']       
                        );
$respuesta = $query->execute();
$query->close();

return $respuesta;

}


}



?>