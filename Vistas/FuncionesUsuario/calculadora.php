<?php

session_start();
if (isset($_SESSION['usuario'])){
include "../header.php";


?>

         


<div id="layoutSidenav_content">

<h4 style="margin-left: 25%;">CALCULADORA ANTROPOMÉTRICA</h4> 

<div class="jumbotron jumbotron-fluid">
		  <div class="container">

		    <div class="row">
		    	<div class="col-sm-4">
		    		<span class="btn btn-warning" data-toggle="modal" data-target="#conversor">
		    			 <span class="fas fa-exchange-alt"></span> convertidor de Unidades
		    		</span>
		    	</div>
				
		    </div>
		    <hr>
		   	<div class="row">
		   		<div class="col-sm-12">
		   			 <div id="tablaCitas" ></div> 
					
		   		</div>
		   	</div>
		  </div>
		</div>






   





      <div class="container" style="margin-right: 25px; margin-left: 25px">
         
      <form  method="POST" onsubmit=" return DatosCaluladora()"  id="frmFormulario" class="row gx-3 gy-2 align-items-center" id="formulario">
      <div class="row mb-3">
  <div class="col-sm-6" >
    <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text" >Estatura en Centimetros</div>

      <input type="number" id="altura" name="altura" class="form-control" id="specificSizeInputGroupUsername" required="">
    </div>
  </div>
  


  <div class="col-md-6">
    <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text">Peso Ideal En Kilogramos</div>
      <input type="text" id="pesoK" name="pesoK" class="form-control" id="specificSizeInputGroupUsername" required="" readonly="readonly">
    </div>
  </div>
  </div>


  <div class="row mb-3">
<div class="col-sm-6">
    <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text" class="col-sm-3">Peso en Kilogramos</div>
      <input type="number" id="peso" name="peso" class="form-control" id="specificSizeInputGroupUsername" required="">
    </div>
  </div>
  
  


  <div class="col-md-6">
    <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text">Porcentage de Peso Ideal</div>
      <input type="text" id="porcentajePI" name="porcentajePI" class="form-control" id="specificSizeInputGroupUsername" required="" readonly="readonly">
    </div>
  </div>
  
  </div>
  

  <div class="row mb-3">
  <div class="col-sm-6">
    <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text">Edad</div>
      <input type="number" id="edad" name="edad"  class="form-control" id="specificSizeInputGroupUsername" required="">
    </div>
  </div>

  </div>
  
  <div class="row mb-3">
  <div class="col-sm-6">
    <label class="visually-hidden" for="specificSizeSelect" required="">Género</label>
    <select class="form-select" id="genero" name="genero"  id="specificSizeSelect">
      <option selected>Seleccionar Género</option>
      <option value="1">Masculino</option>
      <option value="2" >Femenino</option>
      
    </select>
  </div>
  </div>


<div class="row gx-3 gy-2 align-items-center"  id="contenedor2"></div>
<div class="row mb-3">
<div class="col-sm-6">
    <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text" class="col-sm-3"  >(IMC)</div>
      <input type="text" id="IMC" name="IMC"  class="form-control" id="specificSizeInputGroupUsername" placeholder="Indice de masa corporal "  required="" readonly="readonly" >
    </div>
  </div>
  
  
  <div class="col-sm-6">
  <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text" class="col-sm-3"> (ASC)</div>
      <input type="text" id="ASC" name="ASC" class="form-control" id="specificSizeInputGroupUsername" placeholder="Area de Superficie Corporal" required=""  readonly="readonly">
    </div>
  </div>
 </div>


 <div class="row mb-3">
<div class="col-sm-6">
    <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text" class="col-sm-3"> (MCM)</div>
      <input type="text" id="MCM" name="MCM" class="form-control" id="specificSizeInputGroupUsername" placeholder="Masa Corporal Magra" required="" readonly="readonly">
    </div>
  </div>
  
  
  <div class="col-sm-6">
  <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text" class="col-sm-3">ACT</div>
      <input type="text" id="ACT" name="ACT" class="form-control" id="specificSizeInputGroupUsername" placeholder="Agua Corporal Magra"  required="" readonly="readonly">
    </div>
  </div>
 </div>
 

<div class="col-sm-8" style="padding-left: 20%;
padding-top: 25px;">
    <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
    <div class="input-group">
      <div class="input-group-text" class="col-sm-3">Estado Nutricional</div>
      <input type="text" id="nutricion" name="nutricion" class="form-control" id="specificSizeInputGroupUsername" required="" readonly="readonly">
    </div>

		<hr>
					<div class="row">
						<div class="col-sm-4 text-left" >
							<button type="submit" class="btn btn-success">Registrar</button>
						</div>
         

        
            <div class="col-sm-4 text-left" >
							<button type="button" onclick="calculadora()" class="btn btn-warning">Calcular</button>
						</div>
					
         
            <div class="col-sm-2 text-left" >
							<button type="button" onclick="cancelar()" class="btn btn-danger">cancelar</button>
						</div>
					</div>


          
			
			

</form>

<!-- VISTA DE CONVERSION DE LIBRAS A KILOGRAMOS -->
<div class="modal fade" id="conversor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Conversor </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmcreandocitas" >
        	<label>Libras</label>
        	<input type="text" onclick="conversorlibras()" name="libras" id="libras" class="form-control" require="">
          <label>Kilogramos</label>
        	<input type="text"  name="kilogramos" id="kilogramos" class="form-control" require="" readonly="readonly">
								
							
      
				
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="cancelar()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       
      </div>
    
</div>
</div> 

<!-- </div> -->
<!-- </div> 
</div> -->

            </div>
            </div>


            

   

<script type="text/javascript">
   function DatosCaluladora(){
        $.ajax({
            method:"POST",
            data:$('#frmFormulario').serialize(),
            url:"../../Controlador/Usuarios/calculadora.php",
            success:function(respuesta) {
               
              respuesta = respuesta.trim();
         

              if (respuesta == 1) {
                $("#frmFormulario")[0].reset();
                swal(":D", "Agregado con exito!", "success");
              } else if(respuesta == 2){
                swal("No se encuentra ningun paciente registrado con el código de paciente Indicado !!!");
              } else {
                swal(":(", "Fallo al agregar!", "error");
              }
              }         });

                    return false;
              }
              
 </script>

<script>
function cancelar(){
  $("#frmFormulario")[0].reset();

}

</script>

     
<script>

function conversorlibras(){
libras=document.getElementById("libras").value;
kilogramos=document.getElementById("kilogramos").value=libras*0.453592;

}

</script>



<script>

function calculadora(){
    var Altura=document.getElementById("altura");
  
  var Genero=document.getElementById("genero");
  var pesok=document.getElementById("pesoK");
  
  if(Genero.value==1){
     pesok.value=value=Altura.value-100-((Altura.value-150)/4)
  }else if(Genero.value==2){
    alert (Genero.value)
  
    pesok.value=Altura.value-100-((Altura.value-150)/2.5)
    alert (Genero.value)
  }
  else{
    alert (Genero.value)
  
  }
  
  
  
  var Peso=document.getElementById("peso");
  var medida=document.getElementById("medida");
  var PorcentagePI1;
  var PorcentagePI;
  //Calculando Peso Ideal
    PorcentagePI1=(Peso.value/pesok.value)*100;
    PorcentagePI=document.getElementById("porcentajePI").value= PorcentagePI1.toFixed(2)+"  %";
  
  
  
  
  
  // var Edad=document.getElementById("edad").value=1;
  var datopotenciaIMC=Altura.value/100;
  
  var IMC1=Peso.value/(Math.pow(datopotenciaIMC,2));
  var IMC=document.getElementById("IMC").value=IMC1.toFixed(2)
  var edad=document.getElementById("edad");
  
  //Area de Superficie Corporal
  var datopotenciaASC1=((Peso.value*Altura.value)/3600)
  var ASC1=Math.pow(datopotenciaASC1,0.5)
   var ASC=document.getElementById("ASC").value=ASC1.toFixed(2);
  
   //AGUA CORPORAL TOTAL
  var ACT=document.getElementById("ACT");
  var datosACT1=2.447-(0.09156*edad.value)+(0.1074*Altura.value)+(0.3362*Peso.value);
  var datosACT2=(0.1069*Altura.value)+(0.2466*Peso.value)-2.097;
  
  if(Genero.value==1){
  
    ACT.value=datosACT1.toFixed(2)
  
  }else if (Genero.value==2) {
    ACT.value=datosACT2.toFixed(2)
  
  }
  
  //MASA CORPORAL MAGRA
  var MCM= document.getElementById("MCM");
  var MCM1=(1.10*Peso.value)-(128*(Math.pow(Peso.value,2)/Math.pow(Altura.value,2)));
  var MCM2=(1.07*Peso.value)-(148*(Math.pow(Peso.value,2)/Math.pow(Altura.value,2)));
  
  if(Genero.value==1){
  MCM.value=MCM1.toFixed(2);
  
  }else if(Genero.value==2){
    MCM.value=MCM2.toFixed(2);
  
  
  }
  
  
  // CALCULANDO EL ESTADO NUTRICIONAL;
  var EstadoNutricional=document.getElementById("nutricion");
  var imc=document.getElementById("IMC");
  
  
  if(imc.value<=18.5){
    EstadoNutricional.value="BAJO PESO";
  
  }else if(imc.value>=18.5 && imc.value<=24.9){
  
    EstadoNutricional.value="PESO NORMAL";
  
  
  }else if(imc.value>=25 && imc.value<=29.9){
    EstadoNutricional.value="SOBREPESO";
  
  }else if(imc.value>=30 && imc.value<=34.9){
    EstadoNutricional.value="OBECIDAD GRADO I";
  
  }else if(imc.value>=35 && imc.value<=39.9){
    EstadoNutricional.value="OBESIDAD GRADO II";
  
  }else if(imc.value>=40){
    EstadoNutricional.value="OBESIDAD GRADO III";
  
  } else{
    EstadoNutricional.value="OBESIDAD GRADO III";
  

  }
  
  
  
  
  
  
  }

  
</script>




   <?php
 
   include "../footer.php";
}else {

   header("location:../../index.php");

}

   ?>


</>