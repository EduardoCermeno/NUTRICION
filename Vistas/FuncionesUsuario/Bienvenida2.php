


<?php
 session_start();
 if (isset($_SESSION['usuario'])){
 include "../header.php";

require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();


?>



<div class="table-responsive">
	<table class="table table-hover table-dark" id="">
		<thead>
	
		
			<tr style="text-align: center;">
				<td>nombre</td>
				<td>medicamento</td>
				<td>horario</td>
                <td>correo</td>
              
			</tr>
		</thead>
		<tbody>

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
    
    

    



			 <tr style="text-align: center;">

			 	<td><?php echo  $mostrar['Nombre_Medicamento'];?></td>
				<td><?php echo  $mostrar['Horario_Medicamento'];?></td>
				<td><?php echo $mostrar['Nombre_Paciente']." ".$mostrar['Apellido_Paciente']; ?></td>
        <td><?php echo  $mostrar['Correo_EncargadoPaciente'];?></td>

    
       
             
              <?php 
                   date_default_timezone_set('America/Guatemala');
                   $hora1= date("H:i");
                       if($hora1=="17:55"){
                        $to = $mostrar['Correo_EncargadoPaciente'];
                        $subject = "Horario de Medicamento";
                        $message = "Es hora de darle el medicamento ". $mostrar['Nombre_Medicamento']." Al Paciente ".$mostrar['Nombre_Paciente']." ".$mostrar['Apellido_Paciente'];
                        $headers = "From: eduardocermenopineda@gmail.com" . "\r\n" . "CC: ecermenop1@miumg.edu.gt";
                         
                        mail($to, $subject, $message, $headers);
                        

                       }
                ?>
             
             </tr> 
          <?php  
      }   
				?>

</tbody>
	</table>

</div>
      
			







                            

           
  
             
                    
     







           

                <?php






  include "../footer.php";
 }else {

  header("location:../../index.php");

 }
?>
