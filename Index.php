<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loguin</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="Librerias/Bootstrap/bootstrap.min.css">
</head>
<body style="background-color: #56baed;">
    
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first" >
      <p></p>
      <img src="img/niño.png" class="img-thumbnail", height="10px" id="icon" alt="User Icon" />
      <h1>Nutrición Infantil</h1>
    </div>


    <!-- Login Form -->
  
    <form method="post" id="frmLogin" onsubmit="return logear()">
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="Nombre de Usuario" required="">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña" required="">
    <input type="submit" class="fadeIn fourth" value="Iniciar Sesion"> 
      
    </form>

    <!-- Remind Passowrd -->
  

  </div>
</div>
<div id="layoutSidenav_content">

<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-4">CITAS</h1>

		    <div class="row">
		    	<div class="col-sm-4">
		    		<span class="btn btn-warning" data-toggle="modal" data-target="#modalAgregaCategoria">
		    			 <span class="fas fa-plus-circle"></span> Crear Nueva Cita
		    		</span>
		    	</div>
		    </div>
		    <hr>
		   	<div class="row">
		   		<div class="col-sm-12">
		   			<div id="tablaCategorias"></div>
		   		</div>
		   	</div>
		  </div>
		</div>



    <div class="modal fade" id="modalAgregaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmCategorias">
        	<label>Nombre de la categoría</label>
        	<input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
      </div>
    </div>
  </div>
</div>





<script src="Librerias/Bootstrap/bootstrap.min.js"></script> -->
<script src="Librerias/jquery-3.6.0.min.js"></script>
<script src="Librerias/sweetalert.min.js"></script>


<script type="text/javascript">
   function logear(){
        $.ajax({
            type:"POST",
            data:$('#frmLogin').serialize(),
            url:"Controlador/Usuarios/loguin.php",
            success:function(respuesta) {
              
                respuesta = respuesta.trim();
                if (respuesta == 1) {
               
                    window.location = "Vistas/FuncionesUsuario/Bienvenida.php";
                } else {
                    swal(":(", "El usuario o contraseña son Incorrectos!", "error");
                }
            }
        });

        return false;
   }
 </script>

</body>
</html>