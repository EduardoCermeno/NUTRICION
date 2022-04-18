<?php

require_once 'Conexion.php';

class citas extends Conectar{
public function agregarcita($datos) {
			$conexion = Conectar::conexion();

			$sql = "INSERT INTO tb_fechacita(FechaCita,StatusCita)
			values(?,?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("ss", $datos['fechacita'],
									  $datos['estadocita']
									  
                            );	
					
							$respuesta = $query->execute();
							$query->close();
						
							return $respuesta;
						
		}


		public function obtenerIdfechacita($fecha){

			$Conexion = Conectar::conexion();
			 $sql2 = "SELECT  Id_FechaCita
						 
			FROM tb_fechacita where FechaCita = $fecha "; 
			$result2 = mysqli_query($Conexion, $sql2);
			$mostraridcita = mysqli_fetch_array($result2);
			$resp=$_SESSION['ID_fechacita'] =$mostraridcita['Id_FechaCita'];
		   
		   
		
		   
  return $resp;
		


		}

		public function ReservarCita($datos) {
			$DA=$datos['fechacita'];
			$conexion = Conectar::conexion();

			
			
			$sql2 = "SELECT  Id_FechaCita as cita FROM tb_fechacita  where FechaCita =  '$DA' "; 

			$result2 = mysqli_query($conexion, $sql2);
			$mostraridcita = mysqli_fetch_array($result2);
		
			$mos=$mostraridcita['cita'] ;

			$sql = "INSERT INTO tb_citas(Id_FechaCita, Id_Paciente, FechaCitas, Nombre, Direccion, Area)
			values(?,?,?,?,?,?)";
			$query = $conexion->prepare($sql);
			$query->bind_param("iissss", $mos,
									  $datos['IdPaciente'],
									  $datos['fechacita'],
								      $datos['nombre'],
									  $datos['direccion'],
									  $datos['area']
									
									  
                            );	
					
							$respuesta = $query->execute();
							$query->close();

				$sql3 = "UPDATE  tb_fechacita 
				SET StatusCita = 'Reservada'
				WHERE Id_FechaCita=$mos"; 
					$result3 = mysqli_query($conexion, $sql3);
					
						
							return $respuesta;
						
		}


		public function eliminarcita($idCita) {
			$conexion = Conectar::conexion();

			$sql = "DELETE FROM tb_fechacita 
					WHERE Id_FechaCita = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idCita);
			$respuesta = $query->execute();
			$query->close();
			return $respuesta;
		}

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