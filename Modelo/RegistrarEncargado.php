<?php 
require_once 'Conexion.php';

class Padres extends Conectar{


    
		public function agregarEncargadoPaciente($datos) {
			$conexion = Conectar::conexion();
				
		
				$sql = "SELECT Id_Paciente
				FROM tb_paciente
				WHERE Dpi = '$datos[DpiPaciente]'";
   $result = mysqli_query($conexion, $sql);
   $datosResultado = mysqli_fetch_array($result);

		if($datosResultado==null||$datosResultado==""){
	
			return 2;
			
	 	}else{
	 	

		 $sql = "INSERT INTO tb_encargadopaciente ( Id_Paciente,
		 										Id_Usuario,
		 										 Nombre_EncargadoPaciente, 
												 Apellido_EncargadoPaciente, 
												 Telefono_EncargadoPaciente,
												 Correo_EncargadoPaciente,
												 Direccion) 
							VALUES (?,?,?,?,?,?,?)";
                          
			$query = $conexion->prepare($sql);
         
			$query->bind_param("iisssss", 	$datosResultado['Id_Paciente'],
											$datos['IDUSUARIO'],
											$datos['NombreEP'],
											$datos['ApellidosEP'],
											$datos['TelefonoEP'],
											$datos['CorreoEP'],
											$datos['DirecciónEP']
														
									);
			$respuesta = $query->execute();
			$query->close();

            
			return $respuesta;
	}
	  }

	

}




?>