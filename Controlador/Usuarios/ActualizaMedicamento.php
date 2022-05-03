<?php
require_once '../../Modelo/ActualizaMedicamento.php';

$actualizamedicamento=new actualizamedicamento();

echo json_encode($actualizamedicamento->obtenenermedicamento($_POST['IDMEDICAMENTO']));

?>
