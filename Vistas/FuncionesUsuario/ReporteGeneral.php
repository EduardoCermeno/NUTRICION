
<?php
 session_start();
 if (isset($_SESSION['usuario'])){
 include "../header2.php";

require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();


$sql = "SELECT count(*) as existeUsuarioAdministrador
					FROM tb_usuarios  WHERE Rol_Usuario='SuperUsuario'";
			$result = mysqli_query($Conexion, $sql);

			$UsuariosAdmin = mysqli_fetch_array($result)['existeUsuarioAdministrador'];


            $sqlU = "SELECT count(*) as existeUsuario 
            FROM tb_usuarios  WHERE Rol_Usuario='Usuario'";
    $resultU = mysqli_query($Conexion, $sqlU);

    $UsuariosU = mysqli_fetch_array($resultU)['existeUsuario'];

          
            $sql2 = "SELECT count(*) as numeropaciente
					FROM tb_paciente";
			$result2 = mysqli_query($Conexion, $sql2);

			$Pacientes = mysqli_fetch_array($result2)['numeropaciente'];  

            $sql3 = "SELECT count(*) as Encargado
            FROM 	tb_encargadopaciente ";
    $result3 = mysqli_query($Conexion, $sql3);

    $Encargados = mysqli_fetch_array($result3)['Encargado'];  


           
    $sql4 = "SELECT count(*) as Medicamentos
    FROM tb_medicamento ";
$result4 = mysqli_query($Conexion, $sql4);

$Medicamentos= mysqli_fetch_array($result4)['Medicamentos'];   ?>



                            

            <div id="layoutSidenav_content">
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Resumen General</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Informe Resumido</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-primary text-white mb-4" >
                                    <div class="card-body" >USUARIOS ADMIN</div>

                                    
                                    <h1 style="text-align: center;"><?php echo $UsuariosAdmin ?></h1>
                                    <div style="display: inline" class="spinner-border text-warning" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                    
                                    </div>
                                  
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-info text-white mb-4" >
                                    <div class="card-body" >USUARIOS CIENTES</div>

                                    
                                    <h1 style="text-align: center;"><?php echo $UsuariosU ?></h1>
                                    <div style="display: inline" class="spinner-border text-danger" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                    
                                    </div>
                                  
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">PACIENTES</div>
                                    <h1 style="text-align: center;"><?php echo  $Pacientes ?></h1>
                                    <div  class="spinner-border text-success" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">ENCARGADOS </div>
                                    <h1 style="text-align: center;"><?php echo $Encargados ?></h1>
                                    <div style="display: inline" class="spinner-border text-danger" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                  </div>
                                  
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Medicamentos</div>
                                    <h1 style="text-align: center;"><?php echo $Medicamentos ?></h1>
                                    <div  class="spinner-border text-success" role="status ">
                                    <span class="visually-hidden">Loading...</span>
                                    </div>

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
