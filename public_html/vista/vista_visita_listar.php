<?php session_start(); ?>

<head>
	<!-- Select2 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	<!-- Select2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<style>
	/* SWITCH moderno */
	.switch {
		position: relative;
		display: inline-block;
		width: 50px;
		height: 26px;
	}

	.switch input {
		opacity: 0;
		width: 0;
		height: 0;
	}

	/* Slider del switch */
	.slider {
		position: absolute;
		cursor: pointer;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #ccc;
		transition: .4s;
		border-radius: 34px;
	}

	.slider:before {
		position: absolute;
		content: "";
		height: 22px;
		width: 22px;
		left: 2px;
		bottom: 2px;
		background-color: white;
		transition: .4s;
		border-radius: 50%;
	}

	input:checked+.slider {
		background-color: #28a745;
		/* Verde Bootstrap */
	}

	input:focus+.slider {
		box-shadow: 0 0 1px #28a745;
	}

	input:checked+.slider:before {
		transform: translateX(24px);
	}

	/* Estilo redondeado */
	.slider.round {
		border-radius: 34px;
	}

	.slider.round:before {
		border-radius: 50%;
	}

	.select2-container--default .select2-selection--single {
		height: 50px;
		font-size: 1.1rem;
		padding: 10px 16px;
		border-radius: 8px;
	}

	.select2-container--default .select2-selection--single .select2-selection__rendered {
		line-height: 48px;
	}
</style>
<script type="text/javascript" src="../js/visita.js"></script>
<div class="col-md-12">
	<div class="card card-warning">
		<div class="card-header">
			<h3 class="card-title">BIENVENIDO AL REGISTRO DE VISITAS</h3>

			<!-- <div class="card-tools">
				<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
				</button>
			</div> -->
			<!-- /.card-tools -->
		</div>
		<!-- /.card-header -->
		<div class="card-body">


			<div class="row">
				<div class="col-10">
					<div class="input-group">
						<input type="text" class="global_filter form-control" id="global_filter" placeholder="Ingresar dato a buscar">
						<div class="input-group-append">
							<div class="input-group-text"><i class="fas fa-search"></i></div>
						</div>

					</div>
				</div>
				<div class="col-2">
					<button class="btn btn-info" style="width:100%" onclick="AbrirModalRegistro()"><i class="fa fa-plus"></i> Nuevo Registro</button>
				</div>

			</div>


			<table id="tabla_visita" class="display" style="width:100%">
				<thead>
					<tr>
						<th>#</th>
						<th>Sede</th>
						<th>Visitante</th>
						<th>Tipo</th>
						<th>Entidad</th>
						<th>Area</th>
						<th>Funcionario</th>
						<th>Motivo</th>
						<th>Ingreso</th>
						<th>Acci&oacute;n</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>#</th>
						<th>Sede</th>
						<th>Visitante</th>
						<th>Tipo</th>
						<th>Entidad</th>
						<th>Area</th>
						<th>Funcionario</th>
						<th>Motivo</th>
						<th>Ingreso</th>
						<th>Acci&oacute;n</th>
					</tr>
				</tfoot>
			</table>

		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
</div>

<form autocomplete="false" onsubmit="return false">
	<div class="modal fade" id="modal_registro" role="dialog">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">

					<h4 class="modal-title">Registro De Usuario</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">




					<h4>DATOS DEL VISITANTE</h4>
					<div class="row">
						<div class="col-3">
							<label for="">SEDE</label>
							<input type="text" id="txt_sede_nom" class="form-control" placeholder="Sede" value="<?php echo $_SESSION['S_SEDE_NOM']; ?>" disabled>
							<input type="hidden" id="txt_sede_id" value="<?php echo $_SESSION['S_SEDE']; ?>">
						</div>
						<div class="col-3">
							<label for="">Tipo Documento</label>
							<select class="form-control" name="state" id="cbtipodoc" style="width:100%;">
								<option value="1">DNI</option>
								<option value="2">PASSAPORTE</option>
								<option value="3">CARNET EXT.</option>
							</select>
						</div>
						<div class="col-3">
							<label for="">Nro Documento</label>
							<input type="text" id="txt_nrodoc" class="form-control" placeholder="Número Documento">
						</div>
						<div class="col-3">
							<br>
							<button type="button" class="btn btn-primary" onclick="VerificarVisitante()"><i class="fa fa-search"></i>&nbsp;Buscar</button>
						</div>
					</div>
					<br>


					<div class="row">
						<div class="col-3">
							<label for="">Ape. Paterno</label>
							<input type="text" class="form-control" placeholder="Ape. Paterno" id="txt_paterno" disabled>
						</div>
						<div class="col-3">
							<label for="">Ape. Materno</label>
							<input type="text" class="form-control" placeholder="Ape. Materno" id="txt_materno" disabled>
						</div>
						<div class="col-6">
							<label for="">Nombres</label>
							<input type="text" class="form-control" placeholder="Nombres" id="txt_nombres" disabled>
						</div>
					</div>
					<br>


					<div class="row">
						<div class="col-3">
							<label for="cb_tipo">Representación</label>
							<select class="form-control" name="state" id="cb_tipo" style="width:100%;">
								<option value="1">Titulo Personal</option>
								<option value="2">Entidad Pública</option>
								<option value="3">Entidad Privada</option>
							</select>
						</div>
						<div class="col-9">
							<label for="cb_motivo">Motivo</label>
							<select class="form-control" name="state" id="cb_motivo" style="width:100%;">
								<option value="1">REUNION DE TRABAJO</option>
								<option value="2">GESTION ADMINISTRATIVA</option>
								<option value="3">MOTIVO INSTITUCIONAL</option>
								<option value="4">PROVEEDOR DE BIENES Y SERVICIOS</option>
								<option value="5">VISITAL PERSONAL</option>
							</select>
						</div>
					</div>
					<br>

					<div id="pn_empresa">
						<h4>DATOS DE EMPRESA</h4>
						<div class="row">
							<div class="col-3">
								<label for="">RUC</label>
								<input type="text" class="form-control" placeholder="Número de RUC" id="txt_ruc" maxlength="11">
							</div>
							<div class="col-2" style="padding-top: 30px;">
								<button type="button" class="btn btn-primary" onclick="VerificarRuc()"><i class="fa fa-search"></i>&nbsp;Buscar</button>
							</div>
							<div class="col-7">
								<label for="">Razón Social</label>
								<input type="text" class="form-control" placeholder="Razón Social" id="txt_razon">
							</div>
						</div>
					</div>
					<br>


					<h4>DATOS DE OFICINA A VISITAR</h4>
					<div class="row">
						<div class="col-12">
							<label for="cb_oficina">AREA/CARGO/RESPONSABLE</label>
							<select class="form-select" name="cb_oficina" id="cb_oficina" style="width: 100%; font-size: 1.1rem; padding: 12px 12px; height: 40px;">
								<option value="0">Seleccione Oficina...</option>
							</select>
						</div>
					</div>
					<br>
					<!-- <input type="checkbox" id="chk_otro">
					<label class="form-check-label" for="chk_otro" style="cursor: pointer;">Otro Funcionario</label> -->
					<div class="form-group">
						<label class="switch">
							<input type="checkbox" id="chk_otro">
							<span class="slider round"></span>
						</label>
						<span style="margin-left: 10px; font-weight: 500;">Otro Funcionario</span>
					</div>
					<br>

					<div id="pn_otro">
						<div class="row">
							<div class="col-6">
								<label for="">AREA</label>
								<input type="text" class="form-control" placeholder="Oficina" id="txt_area">
							</div>
							<div class="col-6">
								<label for="">FUNCIONARIO</label>
								<input type="text" class="form-control" placeholder="FUNCIONARIO" id="txt_funcionario">
							</div>
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success" onclick="Registrar_Visita()"><i class="fa fa-check"></i>&nbsp;Registrar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
				</div>
			</div>
		</div>
	</div>


	<!-- MODAL DE FINALIZAR VISITA -->
	<div class="modal fade" id="modal_finalizar_visita" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Finalizar Visita</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Va a finalizar la Visita de <br>
					<h4><span id="span_visitante"> </span></h4>
					</p>
					<input type="hidden" id="txt_id_visita" value="">
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-danger" onClick="Finalizar_Visita()">Finalizar Visitas</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>


</form>

<script>
	$(document).ready(function() {
		listar_visita("<?php echo $_SESSION['S_SEDE']; ?>");
		listar_combo_oficinas();
		$("#cb_oficina").select2({
			placeholder: "---> Seleccione Oficina",
			width: '100%',
			dropdownParent: $('#modal_registro'),
			matcher: function(params, data) {
				if ($.trim(params.term) === '') return data;
				if (data.text.toLowerCase().indexOf(params.term.toLowerCase()) > -1) {
					return data;
				}
				return null;
			}
		});
		$('#pn_empresa').hide("fast");
		$('#pn_otro').hide("fast");


		listar_combo_rol();
		$("#modal_registro").on('shown.bs.modal', function() {
			$("#txt_usu").focus();
		})

	});

	$('#cb_tipo').on("change", function() {
		var id = $(this).val();
		if (id == "1") {
			//alert("es ruc");
			$('#pn_empresa').hide("fast");
		} else {
			$('#pn_empresa').show("fast");
		}

	});

	$("#chk_otro").on('change', function() {
		if ($(this).is(':checked')) {
			$('#pn_otro').show("fast");
			$("#cb_oficina").prop("disabled", true);
		} else {
			$('#pn_otro').hide("fast");
			$("#cb_oficina").prop("disabled", false);
			$("#txt_funcionario").val("");
			$("#txt_motivo").val("");
		}
	});

	function forzarMayusculas(id) {
		const input = document.getElementById(id);
		if (input) {
			input.addEventListener('input', function() {
				this.value = this.value.toUpperCase();
			});
		}
	}

	// Aplicar a los campos
	forzarMayusculas("txt_paterno");
	forzarMayusculas("txt_materno");
	forzarMayusculas("txt_nombres");
	$("#txt_paterno, #txt_materno, #txt_nombres").on("input", function() {
		this.value = this.value.toUpperCase();
	});
</script>