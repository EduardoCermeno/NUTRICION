<?php 
	
  require_once '../../Modelo/EliminarMedicamento.php';


	

    $EliminaMedicamento=new EliminarMedicamento();
     echo $EliminaMedicamento->eliminamedicamento($_POST['IDMEDICAMENTO']);
    
	
 


?>
