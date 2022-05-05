<?php
require_once 'Conexion.php';

class actualizamedicamento extends Conectar{

    public function obtenenermedicamento($idMedicamento){
       
        $conexion = Conectar::conexion();

	$sql = "SELECT 
        
                Id_Medicamento, 
                Nombre_Medicamento,
                Tipo_Medicamento,
                Dosis_Medicamento,
                Horario_Medicamento,
                Descripcion_Medicamento,
                AplicacionMedicamento
            FROM tb_medicamento WHERE Id_Medicamento='$idMedicamento' "; 
	$result = mysqli_query($conexion, $sql);
	$mostrar = mysqli_fetch_array($result);

	$datos=array(
        "idmedicamento"=>$mostrar['Id_Medicamento'],
		"Nmediacmento"=>$mostrar['Nombre_Medicamento'],
		"TMedicamento"=>$mostrar['Tipo_Medicamento'],
		"DosisM"=>$mostrar['Dosis_Medicamento'],
        "HMedicamento"=>$mostrar['Horario_Medicamento'],
        "DMedicamento"=>$mostrar['Descripcion_Medicamento'],
		"APMedicamento"=>$mostrar['AplicacionMedicamento'],
		
		
	);

return $datos;
    }


   
    

}

?>