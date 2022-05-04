<?php 
	
  require_once '../../Modelo/EliminarEncargado.php';


	

    $EliminaEencargado=new EliminarEncargadoPaciente();
     echo $EliminaEencargado->eliminaencargadopaciente($_POST['IDENCARGADO']);
    
	
 


?>
