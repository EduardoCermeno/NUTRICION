
<?php
 session_start();
 if (isset($_SESSION['usuario'])){
 include "../header.php";

require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();


$sql = "SELECT count(*) as existeUsuario 
					FROM tb_usuarios ";
			$result = mysqli_query($Conexion, $sql);

			$Usuarios = mysqli_fetch_array($result)['existeUsuario'];


          
            $sql2 = "SELECT count(*) as numeropaciente
					FROM tb_paciente ";
			$result2 = mysqli_query($Conexion, $sql2);

			$Pacientes = mysqli_fetch_array($result2)['numeropaciente'];  

            $sql3 = "SELECT count(*) as normal
            FROM tb_antropometia where EstadoNutricional='Peso normal' ";
    $result3 = mysqli_query($Conexion, $sql2);

    $PesoNormal= mysqli_fetch_array($result2)['normal'];  


    $sql4 = "SELECT count(*) as bajopeso
    FROM tb_antropometia where EstadoNutricional='BAJO PESO' ";
$result4 = mysqli_query($Conexion, $sql4);

$BajoPeso= mysqli_fetch_array($result4)['bajopeso'];  

$sql5 = "SELECT count(*) as sobrepeso
FROM tb_antropometia where EstadoNutricional='SOBREPESO' ";
$result5 = mysqli_query($Conexion, $sql5);

$SobrePeso= mysqli_fetch_array($result5)['sobrepeso'];  


$sql5 = "SELECT count(*) as obesidadI
FROM tb_antropometia where EstadoNutricional='OBECIDAD GRADO I' ";
$result5 = mysqli_query($Conexion, $sql5);

$ObesidadGradoI= mysqli_fetch_array($result5)['obesidadI'];  




$sql6 = "SELECT count(*) as obecidad2
FROM tb_antropometia where EstadoNutricional='OBESIDAD GRADO II' ";
$result6 = mysqli_query($Conexion, $sql6);

$ObeciadGrado2= mysqli_fetch_array($result6)['obecidad2'];  


$sql7= "SELECT count(*) as obecidad3
FROM tb_antropometia where EstadoNutricional='OBESIDAD GRADO III' ";
$result7 = mysqli_query($Conexion, $sql7);

$ObeciadGrado3= mysqli_fetch_array($result7)['obecidad3'];  

?>



                            

            <div id="layoutSidenav_content">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Resumen General</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Informe Resumido</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-primary text-white mb-4" >
                                    <div class="card-body" >USUARIOS</div>

                                    
                                    <h1 style="text-align: center;"><?php echo $Usuarios ?></h1>
                                    <div style="display: inline" class="spinner-border text-danger" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                    
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../FuncionesUsuario/MostrarTablaCItas.php">Ver detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Pacientes</div>
                                    <h1 style="text-align: center;"><?php echo  $Pacientes ?></h1>
                                    <div  class="spinner-border text-danger" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../FuncionesUsuario/MostrarTablaCItas.php">Ver detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Peso Normal </div>
                                    <h1 style="text-align: center;"><?php echo $Usuarios ?></h1>
                                    <div style="display: inline" class="spinner-border text-danger" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                  </div>
                                  <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../FuncionesUsuario/MostrarTablaCItas.php">Ver detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">BAJO PESO</div>
                                    <h1 style="text-align: center;"><?php echo $BajoPeso ?></h1>
                                    <div  class="spinner-border text-warning" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                    </div>

                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../FuncionesUsuario/MostrarTablaCItas.php">Ver detalles</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-xl-3 col-md-3">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">SOBREPESO</div>
                                    <h1 style="text-align: center;"><?php echo $SobrePeso ?></h1>
                                    <div  class="spinner-border text-warning" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-primary text-white mb-4" >
                                    <div class="card-body" >OBESIDAD GRADO 1</div>

                                    
                                    <h1 style="text-align: center;"><?php echo $ObesidadGradoI?></h1>
                                    <div style="display: inline" class="spinner-border text-danger" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-warning text-white mb-4">
                                <div class="card-body" >OBESIDAD GRADO II</div>
                                    <h1 style="text-align: center;"><?php echo $ObeciadGrado2?></h1>
                                    <div  class="spinner-border text-danger" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-success text-white mb-4">
                                <div class="card-body" >OBESIDAD GRADO III</div>
                                    <h1 style="text-align: center;"><?php echo $ObeciadGrado3 ?></h1>
                                    <div style="display: inline" class="spinner-border text-danger" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                  </div>
                                </div>
                            </div>

                            
                        </div>

                        
                        
                       
                        </div>
                    </div>
             
     
                <?php
 
  include "../footer.php";
 }else {

  header("location:../../index.php");

 }
?>


