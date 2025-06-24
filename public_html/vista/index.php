<?php
session_start();
if (!isset($_SESSION['S_IDUSUARIO'])) {
  header("Location: ../Login/index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UNAC - REGISTRO DE VISITASs</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../Plantilla/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../Plantilla/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../Plantilla/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Plantilla/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../Plantilla/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../Plantilla/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../Plantilla/plugins/summernote/summernote-bs4.min.css">
  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="../Plantilla/plugins/datatables/jquery.dataTables.min.css">
  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="../Plantilla/plugins/select2/css/select2.min.css">

  <link rel="stylesheet" type="text/css" href="../Plantilla/plugins/sweetalert2/sweetalert2.min.css">

</head>
<style>
  .swal2-popup {
    font-size: 1.6rem !important;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!--
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../Plantilla/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
	
	-->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../vista/index.php" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa-solid fa-right-from-bracket"></i>
          </a>

          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="../controlador/usuario/controlador_cerrar_session.php" class="dropdown-item">
              <i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión
            </a>
            <div class="dropdown-divider"></div>

          </div>
        </li>


        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../vista/index.php" class="brand-link">
        <img src="../Plantilla/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Registro Visitas</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../Plantilla/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['S_USER'] ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

        <!-- Sidebar Menu -->
        <?php if ($_SESSION['S_ROL'] == "1") { //administrador
        ?>
          <nav class="mt-2">
            <h5 style="color: white;">ADMINISTRADOR<h5>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                    <a href="#" class="nav-link" onClick="cargar_contenido('contenido_principal','vista_usuario_listar.php')">
                      <i class="nav-icon fas fa-user"></i>
                      <p>Usuario
                      </p>
                    </a>
                  </li>


                </ul>
          </nav>
        <?php } ?>

        <br>

        <nav class="mt-2">
          <h5 style="color: white;">MENU<h5>
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item menu-open">
                  <a href="#" class="nav-link" onClick="cargar_contenido('contenido_principal','vista_visita_listar.php')">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Visitas </p>
                  </a>
                </li>

                <li class="nav-item menu-open">
                  <a href="#" class="nav-link" onClick="cargar_contenido('contenido_principal','vista_reporte_listar.php')">
                    <i class="nav-icon fas fa-clipboard"></i>
                    <p>Reportes </p>
                  </a>
                </li>

              </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>


    <!-- CONTENIDO -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


      <!-- Main content -->
      <section class="content" style="padding: 20px;">
        <div class="row" id="contenido_principal">
          <div class="col-md-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">BIENVENIDO AL SISTEMA DE GESTIÓN DE VISITAS (SGV)</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                El sistema de registro de visitas de la Universidad Nacional del Callao (UNAC) es una plataforma digital que permite gestionar de forma centralizada y en tiempo real el ingreso y salida de personas externas al campus universitario. A través de una interfaz optimizada, el sistema facilita la captura estructurada de datos personales, entidad de procedencia, área de destino y motivo de la visita, permitiendo además auditoría completa del historial de accesos.
                Está integrado con módulos de verificación por documento de identidad (DNI o RUC), control por tipo de visitante (individual, institucional o proveedor), y funciones de búsqueda avanzada para mejorar la trazabilidad. Toda la información registrada se almacena de forma segura y es accesible para generar reportes dinámicos, alertas y estadísticas, contribuyendo al fortalecimiento de los protocolos de seguridad institucional y al cumplimiento de estándares de gestión universitaria.
                Este sistema forma parte de las soluciones orientadas a la transformación digital de los procesos administrativos de la UNAC, mejorando el control, eficiencia y transparencia en la atención de visitantes.

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        </div>

      </section>
      <!-- /.content -->
    </div>









    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2025 - Oficina de Tecnologías de Información y Comunicación</strong>
      Todos los derechos Reservados.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.1
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    //Date picker
    $('#reservationdate').datetimepicker({
      format: 'L'
    });


    var idioma_espanol = {
      select: {
        rows: "%d fila seleccionada"
      },
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ning&uacute;n dato disponible en esta tabla",
      "sInfo": "Registros del (_START_ al _END_) total de _TOTAL_ registros",
      "sInfoEmpty": "Registros del (0 al 0) total de 0 registros",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "<b>No se encontraron datos</b>",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }
    }

    function cargar_contenido(contenedor, contenido) {
      $("#" + contenedor).load(contenido);
    }

    $.widget.bridge('uibutton', $.ui.button)
  </script>

  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/018cbdfdbb.js" crossorigin="anonymous"></script>
  <!-- jQuery -->
  <script src="../Plantilla/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../Plantilla/plugins/jquery-ui/jquery-ui.min.js"></script>

  <!-- Datatables -->
  <script type="text/javascript" src="../Plantilla/plugins/datatables/jquery.dataTables.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../Plantilla/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../Plantilla/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../Plantilla/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../Plantilla/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../Plantilla/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../Plantilla/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../Plantilla/plugins/moment/moment.min.js"></script>
  <script src="../Plantilla/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../Plantilla/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../Plantilla/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../Plantilla/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../Plantilla/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../Plantilla/dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../Plantilla/dist/js/pages/dashboard.js"></script>

  <!-- OTROS -->
  <script src="../Plantilla/plugins/datatables/datatables.min.js"></script>
  <script src="../Plantilla/plugins/select2/js/select2.min.js"></script>
  <script src="../Plantilla/plugins/sweetalert2/sweetalert2.min.js"></script>
</body>

</html>