<?php


 session_start();
 if (isset($_SESSION['usuario'])){
 include "../header.php";

require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();

?>
<div id="layoutSidenav_content">
<?php


$sql = " SELECT 
   P.Nombre_Paciente,
   P.Apellido_Paciente,
  M.Nombre_Medicamento, 
  M.Horario_Medicamento,
      E.Correo_EncargadoPaciente

FROM tb_paciente AS P 
INNER JOIN tb_medicamento AS M ON P.Dpi=M.Id_Paciente INNER JOIN tb_encargadopaciente AS E ON P.Id_Paciente=E.Id_Paciente" ; 






    
		$result = mysqli_query($Conexion, $sql);

			while($mostrar = mysqli_fetch_array($result)){ 
				
			
        
        ?>
				
	



             
                     
               


<div id="layoutSidenav_content">





        <div>       
 <div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong><?php echo  "A ".$mostrar['Nombre_Paciente']." ".$mostrar['Apellido_Paciente'] ?></strong> LE CORRESPONDE EL MEDICAMENTO <?php echo $mostrar['Nombre_Medicamento']." "."a las". $mostrar['Horario_Medicamento']." horas"?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div> 


            



   <?php
   
                       }
   include "../footer.php";
}else {

   header("location:../../index.php");

}

   ?>


</script>