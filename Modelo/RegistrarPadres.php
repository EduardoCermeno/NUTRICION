<?php 
require_once 'Conexion.php';

class Padres extends Conectar{


    
		public function agregarPadres($datos) {
			$conexion = Conectar::conexion();
				
			
				$sql = "SELECT CodigoPaciente
				FROM tb_paciente
				WHERE CodigoPaciente = '$datos[CodigoPaciente]'";
   $result = mysqli_query($conexion, $sql);
   $datosResultado = mysqli_fetch_array($result);

		if($datosResultado==null||$datosResultado==""){
	
			return 2;
			
	 	}else{
	 	

		 $sql = "INSERT INTO tb_padrespaciente ( Id_Paciente,CodigoPaciente, NombredelPadre, ApellidoPadre, NombredeMadre, ApellidoMadre, Direccion) 
							VALUES (?,?,?,?,?,?,?)";
                          
			$query = $conexion->prepare($sql);
         
			$query->bind_param("issssss", 	$datos['ID'],
											$datos['CodigoPaciente'],
											$datos['nombresP'],
											$datos['apellidosP'],
											$datos['nombresM'],
											$datos['apellidosM'],
											$datos['dirección'] 
											
									);
			$respuesta = $query->execute();
			$query->close();

            
			return $respuesta;
	}
	  }

	

}




?>