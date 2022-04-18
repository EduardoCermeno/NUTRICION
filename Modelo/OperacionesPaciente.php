<?php

require_once 'Conexion.php';

class Paciente extends Conectar{


		public function eliminaPaciente($IdPaciente) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM tb_paciente
					WHERE Id_Paciente = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $IdPaciente);
			$respuesta = $query->execute();
			$query->close();
			
			return   $respuesta;
			
		}

		
    }


?>