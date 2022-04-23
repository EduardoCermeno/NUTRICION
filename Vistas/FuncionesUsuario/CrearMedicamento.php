<?php

session_start();
if (isset($_SESSION['usuario'])){
include "../header.php";


?>
<div id="layoutSidenav_content">
<form id="msform" onsubmit=" return agregarMedicamento()">
  
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">CREAR MEDICAMENTO</h2>
    <h3 class="fs-subtitle">medicamentos que consumen los pacientes </h3>
    <input type="text" name="IDPACIENTE" id="IDPACIENTE" placeholder="Id del paciente" />
    <input type="text" name="Nmediacmento" id="Nmediacmento"  placeholder="Nombre del Medicamento" />
    <input type="text" name="TMedicamento" id="TMedicamento" placeholder="Tipo DE Medicamento" />
    <input type="text" name="DosisM" id="DosisM" placeholder="Dosis" />
    <input type="textarea" name="DMedicamento" id="DDMedicamentoosisM" placeholder="Descripcion" />
    <input type="text" name="APMedicamento" id="DAPMedicamentoosisM" placeholder="Aplica Medicamento" />
    <input type="time" name="HMedicamento" id="HMedicamento" placeholder="Horario" />
    <input type="submit"  class="previous action-button" value="Crear" />
    <input type="reset"  class="previous action-button" value="Crear" />
    
  </fieldset>
 

</form>
  </div>

  <script src="../../Librerias/jquery-3.6.0.min.js"></script>

  <script>

function agregarMedicamento() {


			$.ajax({
				method: "POST",
				data: $('#msform').serialize(),
				url: "../../Controlador/Usuarios/CrearMedicamento.php",
				success:function(respuesta){
                    
					respuesta = respuesta.trim();
alert (respuesta);
					if (respuesta == 1) {
						$("#msform")[0].reset();
						swal(":D", "Medicamento creado con EXITO!", "success");
					
					} else {
						swal(":(", "Ha ocurrido un error!", "Error");
					}
				}
			});

			return false;

							
		}
	</script>





<?php
   include "../footer.php";
   
}else {

   header("location:../../index.php");

}
