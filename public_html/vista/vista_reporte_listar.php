<?php session_start(); ?>
<style>
	table.dataTable td {
		white-space: normal !important;
		word-wrap: break-word;
		vertical-align: middle;
		font-size: 13px;
	}

	.dataTables_wrapper .dataTables_scroll {
		overflow-x: auto;
	}
</style>
<script type="text/javascript" src="../js/reporte.js"></script>

<div class="col-md-12">
	<div class="card card-warning">
		<div class="card-header">
			<h3 class="card-title"><i class="fas fa-file-alt"></i> REPORTES DE REGISTRO DE VISITAS</h3>
		</div>
		<div class="card-body">
			<!-- <div class="row mb-3">
				<div class="col-md-4">
					<label for="select_mes">Mes:</label>
					<select id="select_mes" class="form-control">
						<option value="0">-- Todos los meses --</option>
						<option value="1">Enero</option>
						<option value="2">Febrero</option>
						<option value="3">Marzo</option>
						<option value="4">Abril</option>
						<option value="5">Mayo</option>
						<option value="6">Junio</option>
						<option value="7">Julio</option>
						<option value="8">Agosto</option>
						<option value="9">Septiembre</option>
						<option value="10">Octubre</option>
						<option value="11">Noviembre</option>
						<option value="12">Diciembre</option>
					</select>
				</div>
				<div class="col-md-3">
					<label for="select_anio">Año:</label>
					<select id="select_anio" class="form-control">
					</select>
				</div>
				<div class="col-md-3">
					<label>&nbsp;</label>
					<button class="btn btn-primary form-control" onclick="filtrarPorFecha()">
						<i class="fas fa-filter"></i> Filtrar
					</button>
				</div>
				<div class="col-md-2">
					<label>&nbsp;</label>
					<button class="btn btn-danger form-control" onclick="descargarPDF()" disabled>
						<i class="fas fa-file-pdf"></i> PDF
					</button>
				</div>
			</div> -->

			<div class="table-responsive">
				<table id="tabla_visita" class="table table-striped table-bordered nowrap" style="width:100%">
					<thead>
						<tr>
							<th>#</th>
							<th>Sede</th>
							<th>Visitante</th>
							<th>Tipo</th>
							<th>Entidad</th>
							<th>Área</th>
							<th>Funcionario</th>
							<th>Motivo</th>
							<th>Ingreso</th>
							<th>Salida</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Sede</th>
							<th>Visitante</th>
							<th>Tipo</th>
							<th>Entidad</th>
							<th>Área</th>
							<th>Funcionario</th>
							<th>Motivo</th>
							<th>Ingreso</th>
							<th>Salida</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		const sede = "<?php echo $_SESSION['S_SEDE']; ?>";

		// Cargar años desde 2020 hasta el actual
		const anioActual = new Date().getFullYear();
		for (let anio = anioActual; anio >= 2023; anio--) {
			$('#select_anio').append(`<option value="${anio}">${anio}</option>`);
		}

		// Cargar visitas al inicio
		listar_visita_reporte(1, 0, 0); // Todos los registros

		// Eventos automáticos al cambiar mes o año
		$('#select_mes, #select_anio').on('change', function() {
			filtrarPorFecha();
		});
	});

	function filtrarPorFecha() {
		const sede = "<?php echo $_SESSION['S_SEDE']; ?>";
		const mes = $('#select_mes').val() || 0;
		const anio = $('#select_anio').val() || 0;

		listar_visita_reporte(sede, mes, anio);
	}

	function descargarPDF() {
		const mes = $('#select_mes').val();
		const anio = $('#select_anio').val();
		const sede = "<?php echo $_SESSION['S_SEDE']; ?>";

		window.open(`../controlador/reporte/controlador_reporte_pdf.php?mes=${mes}&anio=${anio}&sede=${sede}`, '_blank');
	}
</script>