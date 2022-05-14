


<?php
 session_start();
 if (isset($_SESSION['usuario'])){
//  include "../header.php";

require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();


?>




<!-- <div class="table-responsive">
	<table class="table table-hover table-dark" id="">
		<thead>
	
		
			<tr style="text-align: center;">
				<td>nombre</td>
				<td>medicamento</td>
				<td>horario</td>
                <td>correo</td>
              
			</tr>
		</thead>
		<tbody> -->

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

			while($datos = mysqli_fetch_array($result)){ 
				
                   date_default_timezone_set('America/Guatemala');
                   $hora1= date("H:i");
                       if($hora1==$datos['Horario_Medicamento']){
                        $to = $datos['Correo_EncargadoPaciente'];
                        $subject = "Horario de Medicamento";
                        $message = "Es hora de darle el medicamento  ". $datos['Nombre_Medicamento']." Al Paciente ".$datos['Nombre_Paciente']." ".$datos['Apellido_Paciente'];
                        $headers = "From:  ecermenop1@miumg.edu.gt" . "\r\n" . "CC: ecermenop1@miumg.edu.gt";
                         
                        mail($to, $subject, $message, $headers);
                        

                       }
           
             
         
      }   
				?>

<!-- </tbody>
	</table>

</div> -->
      
			







                            

           
  
             
                    
     







           

                <?php






  include "../footer.php";
 }else {

  header("location:../../index.php");

 }
?>
