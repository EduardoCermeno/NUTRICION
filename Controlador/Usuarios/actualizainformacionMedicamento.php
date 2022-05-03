<?php
require_once '../../Modelo/actualizainformacionMedicamento.php';



$actualizaMedicamento=new actualizainformacionmedicamento();

$datos=array(

    "idmedicamento"=>$_POST['idmedicamento'],
    "Nmediacmento"=>$_POST['Nmediacmento'],
    "TMedicamento"=>$_POST['TMedicamento'],
    "DosisM"=>$_POST['DosisM'],
    "DMedicamento"=>$_POST['DMedicamento'],
    "APMedicamento"=>$_POST['APMedicamento'],
    "HMedicamento"=>$_POST['HMedicamento']

);


		   				


echo $actualizaMedicamento->ActualizaMedicamento($datos);

?>
