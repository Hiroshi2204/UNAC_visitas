<?php session_start(); ?>

<div class="container-fluid">
	<div class="card card-primary shadow-lg" style="max-width: 100%;">
		<div class="card-header">
			<h3 class="card-title">
				<i class="fas fa-user-clock"></i> Historial del Visitante
			</h3>
		</div>
		<div class="card-body">
			<!-- BUSCADOR -->
			<div class="row mb-4">
				<div class="col-md-10">
					<input type="text" class="form-control form-control-lg" id="buscar_visitante"
						placeholder="Buscar por DNI, Nombre o Apellidos">
				</div>
				<div class="col-md-2">
					<button class="btn btn-lg btn-primary btn-block" onclick="BuscarVisitante()">
						<i class="fas fa-search"></i> Buscar
					</button>
				</div>
			</div>

			<!-- TABLA DE RESULTADOS -->
			<div class="table-responsive">
				<table class="table table-striped table-bordered w-100" id="tabla_resultados">
					<thead class="thead-dark text-center">
						<tr>
							<th style="width: 5%;">#</th>
							<th style="width: 15%;">DNI</th>
							<th style="width: 40%;">Nombre completo</th>
							<th style="width: 20%;">Última visita</th>
							<th style="width: 20%;">Acción</th>
						</tr>
					</thead>
					<tbody id="tbody_resultados">
						<!-- Resultados aquí -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- MODAL HISTORIAL -->
<div class="modal fade" id="modal_historial" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white">
				<h4 class="modal-title">
					<i class="fas fa-history"></i> Historial de <span id="nombre_visitante"></span>
				</h4>
				<button type="button" class="close text-white" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-sm text-center">
						<thead class="thead-light">
							<tr>
								<th style="white-space: nowrap;">Fecha</th>
								<th style="white-space: nowrap;">Hora ingreso</th>
								<th style="white-space: nowrap;">Hora salida</th>
								<th style="min-width: 280px;">Área visitada</th>
								<th style="min-width: 220px;">Funcionario</th>
								<th style="min-width: 200px;">Motivo</th>
							</tr>
						</thead>
						<tbody id="tbody_historial">
							<!-- El td correspondiente también debe tener nowrap desde JS o back -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- JS: LÓGICA DE BÚSQUEDA Y MOSTRAR HISTORIAL -->
<script>
	function BuscarVisitante() {
		const valor = $("#buscar_visitante").val().trim();

		if (valor.length < 3) {
			return Swal.fire("Advertencia", "Ingrese al menos 3 caracteres", "warning");
		}

		$.ajax({
			url: "../controlador/visita/controlador_buscar_visitante.php",
			type: "POST",
			data: {
				valor: valor
			},
			success: function(resp) {
				let data = JSON.parse(resp);
				let html = "";
				if (data.length === 0) {
					html = `<tr><td colspan="5" class="text-center text-danger">No se encontraron resultados</td></tr>`;
				} else {
					data.forEach((v, i) => {
						html += `
              <tr class="text-center">
                <td>${i + 1}</td>
                <td>${v.dni}</td>
                <td>${v.nombres} ${v.apepat} ${v.apemat}</td>
                <td>${v.ultima_visita}</td>
                <td>
                  <button class="btn btn-info btn-sm" onclick="VerHistorial('${v.dni}', '${v.nombres} ${v.apepat} ${v.apemat}')">
                    <i class="fas fa-clock"></i> Ver Historial
                  </button>
                </td>
              </tr>`;
					});
				}
				$("#tbody_resultados").html(html);
			}
		});
	}

	function VerHistorial(dni, nombre) {
		$("#nombre_visitante").text(nombre);
		$.ajax({
			url: "../controlador/visita/controlador_historial_visitante.php",
			type: "POST",
			data: {
				dni: dni
			},
			success: function(resp) {
				let data = JSON.parse(resp);
				let html = "";
				if (data.length === 0) {
					html = `<tr><td colspan="6" class="text-center text-danger">No hay historial registrado</td></tr>`;
				} else {
					data.forEach(v => {
						html += `
						<tr>
							<td style="white-space: nowrap;">${v.fecha}</td>
							<td>${v.hora_ingreso}</td>
							<td>${v.hora_salida ?? '—'}</td>
							<td>${v.area}</td>
							<td>${v.funcionario}</td>
							<td>${v.motivo}</td>
						</tr>`;
					});
				}
				$("#tbody_historial").html(html);
				$("#modal_historial").modal("show");
			}
		});
	}
</script>