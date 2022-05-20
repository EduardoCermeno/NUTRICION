<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loguin</title>
    <link rel="stylesheet" type="text/css" href="css/inicio.css">
    <link rel="stylesheet" type="text/css" href="Librerias/Bootstrap/bootstrap.min.css">
</head>
 <body style="background-color: #081013;">

  

  

    <div class="wrapper"class="justify-content-center">
        <div class="logo">
            <img src="./Img/ancianos.jpg" alt="">
        
        </div>
       

        <div class="text-center mt-4 name">
           ACILO
        </div>
        <form class="p-3 mt-3" method="POST" id="frmLogin" onsubmit="return logear()" autocomplete="off" >
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="login" id="login" placeholder="Nombre de Usuario">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Clave">
            </div>
            <button class="btn mt-3">Iniciar Sesión</button>
        </form>
        
    </div>




<script src="Librerias/Bootstrap/bootstrap.min.js"></script> 
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
               
                    window.location = "Vistas/FuncionesUsuario/inicio.php";
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




