<?php
require_once '../../Modelo/ActualizaEncargado.php';

$actualizaencargadoS=new actualizaencargado();

echo json_encode($actualizaencargadoS->obtenenerencargado($_POST['IDENCARGADO']));
//print_r($_POST['IDENCARGADO']);
?>
