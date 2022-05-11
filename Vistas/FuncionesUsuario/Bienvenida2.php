
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
            
  

?>



                            

            <div id="layoutSidenav_content">
                  
            <div class="card" style="width: 18rem;">
  <img src="https://w7.pngwing.com/pngs/970/388/png-transparent-profession-job-computer-icons-user-profile-avatar-doctor-cartoon-author-head-trade-thumbnail.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">USUARIOS REGISTRADOS</h5>
    <p class="card-text"><?php echo $Usuarios?></p>
  </div>
  
  
</div>               
                        
                    </div>
             
     
                <?php
 
  include "../footer.php";
 }else {

  header("location:../../index.php");

 }
?>


