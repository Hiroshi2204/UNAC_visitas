<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Consulta Visitas </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../Plantilla/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../Plantilla/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../Plantilla/dist/css/adminlte.min.css">
	
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
	
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?php include("side.php"); ?>
  </aside>
			
			

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Consulta de Registro de Visitas</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        

        <!-- SELECT2 EXAMPLE -->
        

       

        <div class="row">
          
          <!-- /.col (left) -->
          <div class="col-md-4">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Seleccione Fecha</h3>
              </div>
              <div class="card-body">
                <!-- Date -->
				  <div class="row">
                  <div class="col-6">
                <div class="form-group">
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="txt_fecha"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
					
                </div>
					  
                  </div>
                  <div class="col-6">
                    <input type="button" class="form-control" value="Buscar" onClick="MostrarFecha()" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		  
		  
        <div class="row">
          
          <!-- /.col (left) -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Reporte</h3>
              </div>
              <div class="card-body">
<table id="tabla_visita" class="display stripe"  style="width:100%">
        <thead>
            <tr>
				<th>Sede</th>
				<th>Visitante</th>
                <th>Tipo</th>
                <th>Entidad</th>
				<th>Area</th>
				<th>Funcionario</th>
                <th>Ingreso</th>
                <th>Salida</th>
            </tr>
        </thead>
        
        <tfoot>
            <tr>
				<th>Sede</th>
				<th>Visitante</th>
                <th>Tipo</th>
                <th>Entidad</th>
				<th>Area</th>
				<th>Funcionario</th>
                <th>Ingreso</th>
                <th>Salida</th>
            </tr>
        </tfoot>
    </table>
              </div>
            </div>
          </div>
        </div>


      </div>

    </section>
    <!-- /.content -->
  </div>
	
<footer class="main-footer">
<?php include ("footer.php")?>
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../Plantilla/plugins/jquery/jquery.min.js"></script>
<!-- InputMask -->
<script src="../Plantilla/plugins/moment/moment.min.js"></script>
<!-- date-range-picker -->
<script src="../Plantilla/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="../Plantilla/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- AdminLTE App -->
<script src="../Plantilla/dist/js/adminlte.min.js"></script>
	
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../js/reporte.js"></script>

<!-- Page specific script -->

<script>
  $(function () {
	var fecha = new Date();
	var dia = fecha.getDate();
	var mes = fecha.getMonth()+1;
	var anio = fecha.getFullYear();
	listar_visita(dia,mes,anio);
	  
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'DD/MM/YYYY',
		defaultDate: new Date()
    });

  })
	//,
	

  
</script>
</body>
</html>
