<?php 
require_once 'Conexion.php';


class CrearUsuario extends Conectar{


		public function RegistrarUsuario($datos) {
			$conexion = Conectar::conexion();

			// if (self::buscarPacienteRepetido($datos['codigopaciente'])) {
				
			// 	return 2;
			// } else {
				$sql = "SELECT Nombre_Usuario
				FROM tb_usuarios
				WHERE Nombre_Usuario = '$datos[Nombre_Usuario]'";
   $result = mysqli_query($conexion, $sql);
   $datosResultado = mysqli_fetch_array($result);
   

if($datosResultado==null||$datosResultado==""){

	
	 


	
			$sql = "INSERT INTO tb_usuarios ( Nombre, Apellido_Usuario, FechaNacimiento_Usuario, Nombre_Usuario, Clave_Usuario, Rol_Usuario) 
							VALUES (?,?,?,?,?,?)";
			$query = $conexion->prepare($sql);
		
			$query->bind_param("ssssss", 	$datos['nombre'],
                                            $datos['Apellidos'],               
											$datos['fechaNacimiento'],
											$datos['Nombre_Usuario'],
											$datos['password'],
											$datos['RolUsuario']
											 
									);
			$respuesta = $query->execute();
			$query->close();

			return $respuesta;
		}
		return 2;
	}

	
public function obtenerusuario($idUsuario){
	$conexion = Conectar::conexion();
	$sql = "select Id_usuario, Nombre, Apellido_Usuario,FechaNacimiento_Usuario,  Nombre_Usuario, Clave_Usuario, Rol_Usuario   from tb_usuarios where Id_usuario='$idUsuario' "; 
	$result = mysqli_query($conexion, $sql);
	$mostrar = mysqli_fetch_array($result);

	$datos=array(
		"idusuario"=>$mostrar['Id_usuario'],
		"nombre"=>$mostrar['Nombre'],
		"apellidos"=>$mostrar['Apellido_Usuario'],
		"fechanacimiento"=>$mostrar['FechaNacimiento_Usuario'],
		"nombreUsuario"=>$mostrar['Nombre_Usuario'],
		"password"=>$mostrar['Clave_Usuario'],
		"rolusuario"=>$mostrar['Rol_Usuario']
	);


return $datos;
}
	
public function actualizausuario($datos){

	$conexion = Conectar::conexion();
	$sql = "UPDATE tb_usuarios SET 
								 Nombre=?,
								 Apellido_Usuario=?,
								 FechaNacimiento_Usuario=?,
								 Nombre_Usuario=?,
								 Clave_Usuario=?,
								 Rol_Usuario=?
								  WHERE Id_usuario=? "; 

	$query=$conexion->prepare($sql);
	$query->bind_param("ssssssi",
								$datos['nombre'],
								$datos['apellido'],
								$datos['fechanacimiento'],
								$datos['nombreusuario'],
								$datos['password'],
								$datos['rol'],
								$datos['id']);



$respuesta=$query->execute();
$query->close();
return $respuesta;



}

}




?>