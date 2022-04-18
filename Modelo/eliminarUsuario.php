<?php

require_once 'Conexion.php';

class Paciente extends Conectar{


		public function eliminaUsuario($IdPaciente) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM tb_usuarios
					WHERE Id_usuario = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $IdPaciente);
			$respuesta = $query->execute();
			$query->close();
			
			return   $respuesta;
			
		}

		
	
    }


?>