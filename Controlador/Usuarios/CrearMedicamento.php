<?php
session_start();

require_once '../../Modelo/Crearmedicamento.php';
$datos=array(

"IDPACIENTE"=>$_POST['IDPACIENTE'],
"IDUSUARIO"=>$_SESSION['idUsuario'],
"Nmediacmento"=>$_POST['Nmediacmento'],
"TMedicamento"=>$_POST['TMedicamento'],
"DosisM"=>$_POST['DosisM'],
"HMedicamento"=>$_POST['HMedicamento'],
"DMedicamento"=>$_POST['DMedicamento'],
"APMedicamento"=>$_POST['APMedicamento'],

);

$medicamentoOBJ=new Crearmedicamento();
echo $medicamentoOBJ->agregamedicmaneto($datos);



?>