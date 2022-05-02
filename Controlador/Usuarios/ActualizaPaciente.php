<?php
require_once '../../Modelo/ActualizaPaciente.php';

$actualizaPaciente=new actualizapaciente();

echo json_encode($actualizaPaciente->obtenenerpaciente($_POST['IDPACIENTE']));

?>
