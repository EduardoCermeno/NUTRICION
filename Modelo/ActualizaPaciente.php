<?php
require_once 'Conexion.php';

class actualizapaciente extends Conectar{

    public function obtenenerpaciente($idPaciente){
       
        $conexion = Conectar::conexion();

	$sql = "select 
            Id_Paciente, 
            Dpi,
            Nombre_Paciente, 
            Apellido_Paciente, 
            FechaNacimiento_Paciente, 
            Genero_Paciente, 
            EstadoPaciente
            FROM tb_paciente WHERE Id_Paciente='$idPaciente' "; 
	$result = mysqli_query($conexion, $sql);
	$mostrar = mysqli_fetch_array($result);

	$datos=array(
        "idpaciente"=>$mostrar['Id_Paciente'],
		"dpi"=>$mostrar['Dpi'],
		"nombrespaciente"=>$mostrar['Nombre_Paciente'],
		"apellidospaciente"=>$mostrar['Apellido_Paciente'],
		"fechanacimientopaciente"=>$mostrar['FechaNacimiento_Paciente'],
		"generopaciente"=>$mostrar['Genero_Paciente'],
		"estadopaciente"=>$mostrar['EstadoPaciente']
		
	);

return $datos;
    }


    
    

}

?>