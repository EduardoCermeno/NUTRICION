<?php
require_once 'Conexion.php';
 class Crearmedicamento extends Conectar{

public function agregamedicmaneto($datos){
    $conexion = Conectar::conexion();


	$sql = "SELECT Dpi
				FROM tb_paciente
				WHERE Dpi = '$datos[IDPACIENTE]'";
   $result = mysqli_query($conexion, $sql);
   $datosResultado = mysqli_fetch_array($result);
   

if($datosResultado!=null||$datosResultado!=""){

	
    $sql="INSERT INTO tb_medicamento(   Id_Paciente, 
                                        Id_usuario,
                                        Nombre_Medicamento, 
                                        Tipo_Medicamento,
                                        Dosis_Medicamento, 
                                        Horario_Medicamento, 
                                        Descripcion_Medicamento, 
                                        AplicacionMedicamento) VALUES(?,?,?,?,?,?,?,?)";

$query = $conexion->prepare($sql);
		
$query->bind_param("iissssss", 
                                $datos['IDPACIENTE'],
                                $datos['IDUSUARIO'],
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
}else {return 2;}

}
}





?>