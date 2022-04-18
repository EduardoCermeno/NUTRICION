<?php 
require_once 'Conexion.php';

class Usuario extends Conectar{


    public function login($Email, $password){
    

        $conexion = Conectar::conexion();
		
			$sql = "SELECT count(*) as existeUsuario 
					FROM tb_usuarios 
					WHERE Nombre_Usuario= '$Email' 
						AND Clave_Usuario = '$password'";
			$result = mysqli_query($conexion, $sql);

			$respuesta = mysqli_fetch_array($result)['existeUsuario'];

			if ($respuesta > 0) {
				$_SESSION['usuario'] = $Email;

				$sql = "SELECT Id_usuario 
						FROM tb_usuarios 
						WHERE Nombre_Usuario = '$Email' 
						AND  Clave_Usuario  = '$password'";
				$result = mysqli_query($conexion ,$sql);
				$idUsuario = mysqli_fetch_row($result)[0];

				$_SESSION['idUsuario'] = $idUsuario;

			
				return 1;
			} else {
				return 0;
			}

		
        

    }







		public function agregarUsuario($datos) {
			$conexion = Conectar::conexion();
			
			
			// if (self::buscarPacienteRepetido($datos['codigopaciente'])) {
				
			// 	return 2;
			// } else {
				$sql = "SELECT CodigoPaciente
				FROM tb_paciente
				WHERE CodigoPaciente = '$datos[codigopaciente]'";
   $result = mysqli_query($conexion, $sql);
   $datosResultado = mysqli_fetch_array($result);

if($datosResultado==null||$datosResultado==""){




	
			$sql = "INSERT INTO tb_paciente ( Id_usuario, CodigoPaciente, Nombre_Paciente, Apellido_Paciente, FechaNacimiento_Paciente, Género_Paciente, Etnia_Paciente) 
							VALUES (?,?,?,?,?,?,?)";
			$query = $conexion->prepare($sql);
		
			$query->bind_param("issssss", 	$datos['ID'],
											$datos['codigopaciente'],
											$datos['nombres'],
											$datos['apellidos'],
											$datos['fechaNac'],
											$datos['genero'] ,
											$datos['etnia'] 
									);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}
		return 2;
	}

	

}




?>