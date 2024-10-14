<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fs WebApp</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <!-- <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link rel="stylesheet" href="css/editor.dataTables.min.css">
    <!-- Calendar -->
    <script src='js/index.global.min.js'></script>

</head>
<?php
  error_reporting(E_ALL);
  session_start();  
  $fecha_actual = date("Y-m");
  $user = $_SESSION['usuario'];
  if (!isset($user)){
    header("location: login.php");
  }
  else{
    $tipo_user=$_SESSION['tipo_user'];
    if($tipo_user=='PROVEEDOR'){
        $sql="SELECT * FROM proveedores where ruc='$user' LIMIT 1";
        $resultado=mysqli_query($con,$sql);
        while($filas=mysqli_fetch_assoc($resultado)){
            $nom_usuario=$filas['razon_social'];
        }
    }
    else{
        $sql="SELECT * FROM personal where dni='$user' LIMIT 1";
        $resultado=mysqli_query($con,$sql);
        while($filas=mysqli_fetch_assoc($resultado)){
            $nom_usuario=$filas['nombres'];
        }
    }
  }
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="images/logo_2.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">FS Servicios Integrales</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/usuario.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="panel.php" class="d-block"><?php echo $nom_usuario;?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <?php
                            //validamos tipo de usuario para mostrar menus
                            if($tipo_user=='ADMIN' || $tipo_user=='FINANZAS'|| $tipo_user=='PLANEAMIENTO'  ){
                        ?>
                        
                        <li class="nav-item">
                            <a href="panel.php?modulo=inicio" class="nav-link active">
                            
                                <i class="nav-icon fas fa-th" aria-hidden="true"></i>
                                <p>Inicio</p>
                            </a>
                        </li>
                        <?php
                            }
                            ?>

                        <li class="nav-item has-treeview ">
                        <?php 
                            if($tipo_user=='ADMIN' || $tipo_user=='FINANZAS' || $tipo_user=='RRHH' || $tipo_user=='OPERACIONES' || $tipo_user=='ADMINISTRADOR' || $tipo_user=='PLANEAMIENTO'){
                        ?>
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-edit" aria-hidden="true"></i>
                                <p>
                                    Maestros
                                </p>
                            </a>
                            <?php } ?>
                            <ul class="nav nav-treeview">
                        <?php
                            
                            if($tipo_user=='ADMIN' || $tipo_user=='RRHH' || $tipo_user=='ADMINISTRADOR'){
                        ?>
                                <li class="nav-item">
                                    <a href="panel.php?modulo=usuario" class="nav-link <?php echo ($modulo == "usuario") ? " active " : " "; ?>">
                                        <i class="fas fa-users nav-icon" aria-hidden="true"></i>
                                        <p>Usuarios</p>
                                    </a>
                                </li>
                        <?php
                            }
                            if($tipo_user=='ADMIN' || $tipo_user=='RRHH' || $tipo_user=='ADMINISTRADOR' || $tipo_user=='PLANEAMIENTO'){
                        ?>
                                <li class="nav-item">
                                    <a href="panel.php?modulo=personal" class="nav-link <?php echo ($modulo == "personal") ? " active " : " "; ?>">
                                        <i class="fas fa-users nav-icon" aria-hidden="true"></i>
                                        <p>Personal</p>
                                    </a>
                                </li>
                        <?php
                            }
                            if($tipo_user=='ADMIN' || $tipo_user=='OPERACIONES' || $tipo_user=='ADMINISTRADOR' || $tipo_user=='PLANEAMIENTO'){
                        ?>
                                <li class="nav-item">
                                    <a href="panel.php?modulo=vehiculos" class="nav-link <?php echo ($modulo == "vehiculos") ? " active " : " "; ?>">
                                        <i class="fas fa-users nav-icon" aria-hidden="true"></i>
                                        <p>Vehiculos</p>
                                    </a>
                                </li>
                        <?php
                            }
                            if($tipo_user=='ADMIN'){
                        ?>
                                <li class="nav-item">
                                    <a href="panel.php?modulo=jornadas" class="nav-link <?php echo ($modulo == "servicios") ? " active " : " "; ?>">
                                        <i class="fas fa-users nav-icon" aria-hidden="true"></i>
                                        <p>Jornadas Personal</p>
                                    </a>
                                </li>  
                        <?php
                            }
                            if($tipo_user=='ADMIN' || $tipo_user=='FINANZAS' || $tipo_user=='ADMINISTRADOR'){
                        ?>
                                <li class="nav-item">
                                    <a href="panel.php?modulo=clientes" class="nav-link <?php echo ($modulo == "clientes") ? " active " : " "; ?>">
                                        <i class="fas fa-users nav-icon" aria-hidden="true"></i>
                                        <p>Clientes</p>
                                    </a>
                                </li>
                        <?php
                            }
                            if($tipo_user=='ADMIN' || $tipo_user=='FINANZAS' || $tipo_user=='ADMINISTRADOR'){
                        ?>
                                <li class="nav-item">
                                    <a href="panel.php?modulo=proveedores" class="nav-link <?php echo ($modulo == "proveedores") ? " active " : " "; ?>">
                                        <i class="fas fa-users nav-icon" aria-hidden="true"></i>
                                        <p>Proveedores</p>
                                    </a>
                                </li>
                        <?php
                            }
                        ?>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview ">
                        <?php
                            
                        // validar si es admimn 
                        if($tipo_user=='ADMIN' || $tipo_user=='FINANZAS' || $tipo_user=='OPERACIONES' || $tipo_user=='RRHH' || $tipo_user=='ADMINISTRADOR' || $tipo_user=='PLANEAMIENTO'){
                        ?>
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-copy" aria-hidden="true"></i>
                                <p>
                                    Tareas
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="panel.php?modulo=tareas" class="nav-link <?php echo ($modulo == "tareas") ? " active " : " "; ?>">
                                        <i class="nav-icon fas fa-table" aria-hidden="true"></i>
                                        <p>Lista de Tareas</p>
                                    </a>
                                </li>
                            </ul>
                                             <?php
                            }?>
                        </li>
   
                        <?php
                        //validamos usuario admin
                        if($tipo_user=='ADMIN' || $tipo_user=='OPERACIONES' || $tipo_user=='ADMINISTRADOR' || $tipo_user=='PLANEAMIENTO'){
                        ?>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-copy" aria-hidden="true"></i>
                                <p>
                                    Operaciones
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="panel.php?modulo=asignacion_personal" class="nav-link <?php echo ($modulo == "asignacion_personal") ? " active " : " "; ?>">
                                        <i class="nav-icon fas fa-table" aria-hidden="true"></i>
                                        <p>Asignacion Personal</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="panel.php?modulo=mantenimientos" class="nav-link <?php echo ($modulo == "mantenimientos") ? " active " : " "; ?>">
                                        <i class="nav-icon fas fa-table" aria-hidden="true"></i>
                                        <p>Mantenimientos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php }                      
                        //validamos usuario admin
                        if($tipo_user=='ADMIN' || $tipo_user=='OPERACIONES' || $tipo_user=='RRHH' || $tipo_user=='PLANEAMIENTO'){
                        ?>
                        <li class="nav-item has-treeview ">

                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-copy" aria-hidden="true"></i>
                                <p>
                                    Venci. Documentacion
                                </p>
                            </a>
                        <?php
                            
                        //validamos usuario admin
                        if($tipo_user=='ADMIN' || $tipo_user=='RRHH' || $tipo_user=='PLANEAMIENTO'){
                        ?>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="panel.php?modulo=vencdoc_personal" class="nav-link <?php echo ($modulo == "vencdoc_personal") ? " active " : " "; ?>">
                                        <i class="nav-icon fas fa-table" aria-hidden="true"></i>
                                        <p>Personal</p>
                                    </a>
                                </li>
                            </ul>
                        <?php
                            }
                        //validamos usuario admin
                        if($tipo_user=='ADMIN' || $tipo_user=='OPERACIONES' || $tipo_user=='PLANEAMIENTO'){
                        ?>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="panel.php?modulo=vencdoc_vehiculos" class="nav-link <?php echo ($modulo == "vencdoc_vehiculos") ? " active " : " "; ?>">
                                        <i class="nav-icon fas fa-table" aria-hidden="true"></i>
                                        <p>Vehiculos</p>
                                    </a>
                                </li>
                            </ul>
                        <?php
                            }}
                        ?>
                        </li>
                        <?php
						if($tipo_user!='OPERACIONES' && $tipo_user!='RRHH' && $tipo_user!='PLANEAMIENTO'){
                        ?>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-copy" aria-hidden="true"></i>
                                <p>
                                    Docum. Proveedores
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="panel.php?modulo=recep_docum_provee&list=<?php echo $_SESSION['list']; ?>" class="nav-link <?php echo ($modulo == "recep_docum_provee") ? " active " : " "; ?>">
                                        <i class="nav-icon fas fa-table" aria-hidden="true"></i>
                                        <p>Comprob. Proveedores</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php }
                        if($tipo_user=='ADMIN' || $tipo_user=='ADMINISTRADOR'){
                            ?>
                            <li class="nav-item has-treeview ">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-copy" aria-hidden="true"></i>
                                    <p>Finanzas</p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="panel.php?modulo=cobros" class="nav-link <?php echo ($modulo == "cobros") ? " active " : " "; ?>">
                                            <i class="nav-icon fas fa-table" aria-hidden="true"></i>
                                            <p>Cobros</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="panel.php?modulo=pagos" class="nav-link <?php echo ($modulo == "pagos") ? " active " : " "; ?>">
                                            <i class="nav-icon fas fa-table" aria-hidden="true"></i>
                                            <p>Pagos</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <?php
                            }
                            
                        //validamos usuario admin
                        if($tipo_user=='ADMIN' || $tipo_user=='PLANEAMIENTO' ){
                        ?>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-copy" aria-hidden="true"></i>
                                <p>RRHH</p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="panel.php?modulo=marcacion" class="nav-link <?php echo ($modulo == "marcacionyruster") ? " active " : " "; ?>">
                                        <i class="nav-icon fas fa-table" aria-hidden="true"></i>
                                        <p>Marcaciones</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="panel.php?modulo=roster&fecha=<?php echo $fecha_actual;?>" class="nav-link <?php echo ($modulo == "marcacionyruster") ? " active " : " "; ?>">
                                        <i class="nav-icon fas fa-table" aria-hidden="true"></i>
                                        <p>Roster</p>
                                    </a>
                                </li>
                              <li class="nav-item">
                                    <a href="panel.php?modulo=boletas" class="nav-link <?php echo ($modulo == "boletas") ? " active " : " "; ?>">
                                        <i class="nav-icon fas fa-table" aria-hidden="true"></i>
                                        <p>Boletas de Pago</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a href="salir.php" class="nav-link active">
                            
                                <i class="nav-icon far fa-circle text-danger" aria-hidden="true"></i>
                                <p>Salir</p>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <?php if (isset($_REQUEST['mensaje'])) : ?>
            <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <?php echo $_REQUEST['mensaje'] ?>
            </div>
        <?php endif; ?>