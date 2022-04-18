<?php 
	
  require_once '../../Modelo/eliminarUsuario.php';


	
$dato=$_POST['IDUSUARIO'];

	 $elimUs = new  Paciente();
  echo		$elimUs->eliminaUsuario($dato);
    
	



?>

