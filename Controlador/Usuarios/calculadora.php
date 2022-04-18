<?php
	session_start();
 require_once '../../Modelo/calculadora.php';
// $codigo=$_POST['codigopaciente'];



if($_POST['genero']=1) {
$Sexo="Masculino";
}else if ($_POST['genero']=2){
	$Sexo="Femenino";
$Sexo="masculino";
}

$datos = array(
    
	
"ID"=>$_SESSION['idUsuario'], 
"altura" => $_POST['altura'],
"peso"=>$_POST['peso'],
"edad" => $_POST['edad'],
"sexo" => $Sexo,
"pesoK" => $_POST['pesoK'],
"porcentajePI" => $_POST['porcentajePI'],
"IMC"=>$_POST['IMC'] ,
"MCM"=>$_POST['MCM'],
"ASC"=>$_POST['ASC'],
"ACM"=>$_POST['ACT'],

"estadonutricional" => $_POST['nutricion']

);
// print_r($datos);

	$CalculadoraObj = new calculadora();

	echo $CalculadoraObj->datosCalculadora($datos);
	


?>