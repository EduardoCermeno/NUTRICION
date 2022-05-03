<?php
require_once 'Conexion.php';
class EliminarMedicamento extends Conectar{

public function eliminamedicamento($idmedicamento){
$conexion=Conectar::conexion();
$sql=" DELETE FROM Tb_medicamento WHERE Id_Medicamento=?";
$query=$conexion->prepare($sql);
$query->bind_param('i',$idmedicamento);
$respuesta=$query->execute();
$query->close();

return $respuesta;
}

}



?>