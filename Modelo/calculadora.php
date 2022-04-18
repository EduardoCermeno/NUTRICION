<?php 

require_once 'Conexion.php';

class calculadora extends Conectar{
public function datosCalculadora($datos) {
    $conexion = Conectar::conexion();
    
    
   
//         $sql = "SELECT CodigoPaciente
//         FROM tb_paciente
//         WHERE CodigoPaciente = '$datos[codigopaciente]'";
// $result = mysqli_query($conexion, $sql);
// $datosResultado = mysqli_fetch_array($result);

// if($datosResultado==null||$datosResultado==""){





    $sql = "INSERT INTO  tb_antropometia(Id_Paciente, Altura, Peso, Edad, Sexo, Peso_Ideal, PorcentajePI, IMC, MCM, ARSC, ACM, EstadoNutricional)  
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $query = $conexion->prepare($sql);

    $query->bind_param("ississssssss", 	$datos['ID'],
                                    $datos['altura'],        
                                    $datos['peso'],
                                    $datos['edad'],
                                    $datos['sexo'],
                                    $datos['pesoK'],
                                    $datos['porcentajePI'],
                                    $datos['IMC'] ,
                                    $datos['MCM'], 
                                    $datos['ASC'],
                                    $datos['ACM'],
                                    $datos['estadonutricional']
                            );
    $respuesta = $query->execute();
    $query->close();

    return $respuesta;

// return 2;
 }
}

?>