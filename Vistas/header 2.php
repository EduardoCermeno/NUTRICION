
   
   



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Nutrición</title>
        <link  rel="stylesheet" href="../../Librerias/Bootstrap/bootstrap.min.js">

        <link href="../../Css/styles.css" rel="stylesheet" />
      
       
       
        <!-- <link href="../../Css/logn.css" rel="stylesheet" /> -->
        <!-- <link href="../../Css/Programarcita.css" rel="stylesheet" /> -->
        <link  rel="stylesheet" href="../../Librerias/datatable/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="../../librerias/fontawesome/css/all.css">
        
    </head>
    <body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        
            <!-- Navbar Brand-->
            
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-2 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <a class="navbar-brand ps-3"    href="index.html"> <?php echo $_SESSION['usuario']?></a>
            <!-- Navbar Search-->
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
           
                <li class="nav-item dropdown">
               
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../../Controlador/salir.php">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Bienvenido al sistema</div>
                           


                            <a class="nav-link" href="../FuncionesUsuario/Bienvenida.php">
                                <div class="sb-nav-link-icon"><i class="far fa-calendar-alt"> </i></div>
                                
                                INICIO
                            </a>
                            

                            <a class="nav-link" href="../FuncionesUsuario/ProgramarCita.php">
                                <div class="sb-nav-link-icon"><i class="far fa-calendar-alt"> </i></div>
                                
                                Agendar Cita
                            </a>
                          
                            
                            
                            
                          
                           
                            
                          
                            
                            <a class="nav-link" href="../FuncionesUsuario/MostrarTablaCItas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                          Reportes
                            </a>
                       


                        </div>

                        
                    </div>
                    
                </nav>
            </div>
            
        