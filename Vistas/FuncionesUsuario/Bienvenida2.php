<script>
    window.load=function ejecutar(){
        alert("hola mundo");
    }
</script>
<?php

require_once "../../Modelo/Conexion.php";
$conexion=new Conectar();
$Conexion=$conexion->Conexion();

?>





<div class="table-responsive">
	<table class="table table-hover table-dark" id="tablaencargadopaciente">
		<thead>
			<tr style="text-align: center;">
				<td>NombrePaciente</td>
                <td>apellidos</td>
				<td>NombreMedicamento</td>
                <td>horario</td>
                <td>Correo</td>
				
                
               
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
			 
				

                <td><?php echo $mostrar['Nombre_Paciente']." ".$mostrar['Apellido_Paciente']; ?></td>
                <td><?php echo $mostrar['Nombre_Medicamento']; ?></td>
                <td><?php echo $mostrar['Correo_EncargadoPaciente']; ?></td>
                <td><?php echo $mostrar['Horario_Medicamento']; ?></td>
				
				
				


			</tr> 
            
			<?php
            try {
				
                   date_default_timezone_set('America/Guatemala');
                   $hora1= date("H:i");
                       if($hora1==$mostrar['Horario_Medicamento']){
                        $to = $mostrar['Correo_EncargadoPaciente'];
                        $subject = "Horario de Medicamento";
                        $message = "Es hora de darle el medicamento de prueba ".  $mostrar['Nombre_Medicamento']." Al Paciente " .  $mostrar['Nombre_Paciente']." ". $mostrar['Apellido_Paciente'];
                        $headers = "From: ecermenop1@miumg.edu.gt" . "\r\n" . "CC: ecermenop1@miumg.edu.gt";
                         
                        mail($to, $subject, $message, $headers); 
                        echo 'email enviado';
                       }
                       
                    } catch (Exception $e) { echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}

			}

			?>
		</tbody>
	</table>

</div>

       
