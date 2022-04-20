<?php 

	class Conectar{
		public function Conexion() {
			$servidor = "localhost";
			$usuario = "root";
			$password = "";
			$base = "acilo";

			$conexion = mysqli_connect($servidor, 
										$usuario, 
										$password, 
										$base) or die ("No se ha podido conectar al servidor de Base de datos");
			$conexion->set_charset('utf8mb4');
            
			return $conexion;
		}
      
	}

 ?>