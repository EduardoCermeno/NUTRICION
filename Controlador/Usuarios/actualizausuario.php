<?php
require_once '../../Modelo/CrearUsuario.php';

$actualizausuario=new CrearUsuario();

echo json_encode($actualizausuario->obtenerusuario($_POST['IDUSUARIO']));

?>
