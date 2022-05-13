<?php

session_start();
if (isset($_SESSION['usuario'])){
include "../header.php";


?>



<form id="msform" onsubmit=" return agregarMedicamento()" autocomplete="off">
  
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">CREAR MEDICAMENTO</h2>
    <h3 class="fs-subtitle">medicamentos que consumen los pacientes </h3>
    <input type="text" maxlength="9" name="IDPACIENTE" id="IDPACIENTE" placeholder="CUI Del Paciente" required="" />
    <input type="text" name="Nmediacmento" id="Nmediacmento"  placeholder="Nombre del Medicamento" required=""/>
    <input type="text" name="TMedicamento" id="TMedicamento" placeholder="Tipo DE Medicamento" required=""/>
    <input type="text" name="DosisM" id="DosisM" placeholder="Dosis" />
    <input type="textarea" name="DMedicamento" id="DDMedicamentoosisM" id="specificSizeSelect" placeholder="Descripcion" required="" />
    <label >Consumiendo?</label>
    <select class="form-select" style="Height:50px;" name="APMedicamento" id="DAPMedicamentoosisM" placeholder="Aplica Medicamento" required="" >
    
    <option value="si">si</option>
    <option value="no">no</option>
   
  </select>
  <br>
    <input type="time" name="HMedicamento" id="HMedicamento" placeholder="Horario" />
    <input type="submit"  class="previous action-button" value="Crear" />
    <input type="reset"  class="previous action-button" value="CANCELAR" />
    
  </fieldset>
 

</form>
  </div>
 
 

  

  <script>

function agregarMedicamento() {


			$.ajax({
				method: "POST",
				data: $('#msform').serialize(),
				url: "../../Controlador/Usuarios/CrearMedicamento.php",
				success:function(respuesta){
                    
					respuesta = respuesta.trim();

					if (respuesta == 1) {
						$("#msform")[0].reset();
						swal(":D", "Medicamento creado con EXITO!", "success");
					
					} else if(respuesta==2){
						swal(":(", "Noexiste ningun usuario registrado con ese cui", "Error");
					} else {swal(":(", "ha orucrrido un error al guardar", "Error")}
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
