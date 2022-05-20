
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Acilo
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
 
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />

  <link  rel="stylesheet" href="../../Librerias/Bootstrap/bootstrap.min.css">

<link href="../../Css/styles.css" rel="stylesheet" />

<link href="../../Css/medicamento.css" rel="stylesheet" />

<!-- <link href="../../Css/logn.css" rel="stylesheet" /> -->
<!-- <link href="../../Css/Programarcita.css" rel="stylesheet" /> -->
<link  rel="stylesheet" href="../../Librerias/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../Librerias/fontawesome/css/all.css">

</head>

<body class="g-sidenav-show  bg-gray-200">
 
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0">
        <img src="../../Img/usuario.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white"><?php echo $_SESSION['usuario']?></span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="../FuncionesUsuario/inicio.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">INICIO</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../FuncionesUsuario/MostrarTablaPaciente.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">REPORTES</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../FuncionesUsuario/Bienvenida2.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">correo</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../FuncionesUsuario/Registropaciente.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Crear Paciente</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white " href="../FuncionesUsuario/RegistrarEncargado.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">supervisor_account</i>
            </div>
            <span class="nav-link-text ms-1">Crear Encargado</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../FuncionesUsuario/CrearMedicamento.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">pie_chart</i>
            </div>
            <span class="nav-link-text ms-1">Crear Medicamento</span>
          </a>
        </li>
        <?php if($_SESSION['ROLUSUARIO']=="SuperUsuario"){?>
        <li class="nav-item">
          <a class="nav-link text-white " href="../FuncionesUsuario/CrearUsuario.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">group_add</i>
            </div>
            <span class="nav-link-text ms-1">CREAR USUARIOS</span>
          </a>
        </li>
        <?php
        }
       ?>
     
        
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              
            </div>
            <span class="nav-link-text ms-1"><?php echo $_SESSION['usuario']?></span>
         
        </li>
        
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 " >
    
      <div class="mx-3">
      
        <a class="btn bg-gradient-primary mt-4 w-100" href="../../Controlador/salir.php" type="button">CERRAR SESSION</a>
      </div>
    </div>
  </aside>
  <div id="layoutSidenav">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3 bg-gradient-primary">
       
        
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="../../Controlador/salir.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">SALIR</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
 
      </div>

   

	
  <!--   Core JS Files   -->
