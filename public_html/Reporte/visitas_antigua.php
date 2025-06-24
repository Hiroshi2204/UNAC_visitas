<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="plugins/css/bootstrap.min.css">

	<script type="text/javascript" src="plugins/js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../js/visita_web.js"></script>


	
	

	
	<script>
	$(document).ready(function() {
		listar_visita();
	} );
	</script>
</head>

<body>
	
	
<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="../Reporte/visitas.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Universidad Nacional del Callao <br><span class="fs-5">Oficina de Tecnologías de Información y Comunicación</span></span>
		  
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
		  <!--
        <li class="nav-item"><a href="#" class="nav-link">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li>
		  -->
      </ul>
    </header>
  </div>
	
	
  <div class="content-wrapper">

	  

    <!-- Main content -->
    <section class="content" style="padding: 20px;">
	<div class="row" id="contenido_principal">
	<div class="col-md-12" >
		<div class="card card-primary">
		  <div class="card-header">
			<h3 class="card-title">Consulta de Regitros de Visitas</h3>

			<div class="card-tools">
				
			  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
			  </button>
			</div>
			<!-- /.card-tools -->
		  </div>
		  <!-- /.card-header -->
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
		  <!-- /.card-body -->
		</div>
		<!-- /.card -->
	  </div>
		
	</div>
      
    </section>
    <!-- /.content -->
  </div>
	

	
<div class="container">
  <footer class="py-3 my-4">
    <p class="text-center text-muted"> <strong>Copyright &copy; 2022 - Oficina de Tecnologías de Información y Comunicación</strong><br>
    Todos los derechos Reservados.</p>
  </footer>
</div>
</body>
</html>