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
              alert(respuesta);
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




