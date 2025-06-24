// JavaScript Document

function VerificarVisitante() {
	var nrodoc = $("#txt_nrodoc").val();
	//alert(usu);

	if (nrodoc.length == 0) {
		return Swal.fire(
			"Mensaje de Advertencia",
			"Llene el Número de Documento",
			"warning"
		);
	}

	$.ajax({
		url: "../controlador/visita/controlador_verificar_visitante.php",
		type: "POST",
		data: {
			nrodoc: nrodoc,
		},
	}).done(function (resp) {
		if (resp == 0) {
			Swal.fire("No se encontró Visitante");
			$("#txt_paterno").val("");
			$("#txt_materno").val("");
			$("#txt_nombres").val("");
			$("#txt_paterno").prop("disabled", false);
			$("#txt_materno").prop("disabled", false);
			$("#txt_nombres").prop("disabled", false);
		} else {
			var data = JSON.parse(resp);
			$("#txt_paterno").val(data[0]["apepat"]);
			$("#txt_materno").val(data[0]["apemat"]);
			$("#txt_nombres").val(data[0]["nombres"]);
			$("#txt_paterno").prop("disabled", true);
			$("#txt_materno").prop("disabled", true);
			$("#txt_nombres").prop("disabled", true);
		}
	});
}

function VerificarRuc() {
	var ruc = $("#txt_ruc").val();
	//alert(usu);

	if (ruc.length == 0) {
		return Swal.fire(
			"Mensaje de Advertencia",
			"Llene el Número de RUC",
			"warning"
		);
	}

	if (ruc.length != 11) {
		return Swal.fire(
			"Mensaje de Advertencia",
			"Número de RUC incorrecto",
			"warning"
		);
	}

	$.ajax({
		url: "../controlador/visita/controlador_verificar_ruc.php",
		type: "POST",
		data: {
			id: ruc,
		},
	}).done(function (resp) {
		if (resp == 0) {
			Swal.fire("No se encontró RUC");
			$("#txt_razon").val("");
			$("#txt_razon").prop("disabled", false);
		} else {
			var data = JSON.parse(resp);
			$("#txt_razon").val(data[0]["razon"]);
			$("#txt_razon").prop("disabled", true);
		}
	});
}

var table;
function listar_visita(xsede) {
	table = $("#tabla_visita").DataTable({
		ordering: false,
		paging: false,
		bLengthChange: false,
		searching: { regex: true },
		lengthMenu: [
			[10, 25, 50, 100, -1],
			[10, 25, 50, 100, "All"],
		],
		pageLength: 10,
		destroy: true,
		async: false,
		processing: true,
		ajax: {
			url: "../controlador/visita/controlador_visita_listar.php",
			type: "POST",
			data: {
				sede: xsede,
			},
		},
		columns: [
			{ data: "posicion" },
			{ data: "nom_sede" },
			{ data: "visitante" },
			{ data: "tipo" },
			{ data: "entidad" },
			{ data: "area" },
			{ data: "funcionario" },
			{ data: "motivo" },
			{ data: "ingreso" },
			{
				defaultContent:
					"<button style='font-size:13px;' type='button' class='finalizar btn btn-danger' \"><i class='fa fa-close'></i></button>",
			},
		],

		select: true,
	});
	document.getElementById("tabla_visita_filter").style.display = "none";
	$("input.global_filter").on("keyup click", function () {
		filterGlobal();
	});
	$("input.column_filter").on("keyup click", function () {
		filterColumn($(this).parents("tr").attr("data-column"));
	});
}

$("#tabla_visita").on("click", ".finalizar", function () {
	AbrirModalFinalizarVisita();
	var data = table.row($(this).parents("tr")).data();
	$("#txt_id_visita").val(data.id_visita);
	$("#span_visitante").html(data.visitante);
});

function filterGlobal() {
	$("#tabla_visita").DataTable().search($("#global_filter").val()).draw();
}

function AbrirModalRegistro() {
	$("#modal_registro").modal({ backdrop: "static", keyboard: false });
	$("#modal_registro").modal("show");
}

function AbrirModalFinalizarVisita() {
	$("#modal_finalizar_visita").modal({ backdrop: "static", keyboard: false });
	$("#modal_finalizar_visita").modal("show");
}

function listar_combo_rol() {
	$.ajax({
		url: "../controlador/usuario/controlador_como_rol_listar.php",
		type: "POST",
	}).done(function (resp) {
		//alert(resp);
		var data = JSON.parse(resp);
		var cadena = "";
		if (data.length > 0) {
			for (var i = 0; i < data.length; i++) {
				cadena +=
					"<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
			}
			$("#cbm_rol").html(cadena);
		} else {
			cadena += "<option value ''> NO SE ENCONTRARON REGISTROS</option>";
		}
	});
}

function Registrar_Visita() {
	//$("#chk_otro").val("0").change();
	//$("#chk_otro").prop( "checked", false );
	//alert("aa");

	var xsede = $("#txt_sede_id").val();
	var xtipodoc = $("#cbtipodoc").val();
	var xdoc = $("#txt_nrodoc").val();
	var xpaterno = $("#txt_paterno").val();
	var xmaterno = $("#txt_materno").val();
	var xnombres = $("#txt_nombres").val();
	var xruc = $("#txt_ruc").val();
	var xrazon = $("#txt_razon").val();
	var xtipo = $("#cb_tipo").val();
	var xmotivo = $("#cb_motivo").val();

	var cboficina_id = $("#cb_oficina").val();
	var cboficina = $("#cb_oficina option:selected").text();
	var cboficina_id_a = cboficina_id.split("|");
	var cboficina_a = cboficina.split("|");

	var xbpId, xroleId, xareaId, xarea, xfuncionario;

	if (xtipo != "1" && (xruc.length == 0 || xrazon.length == 0)) {
		return Swal.fire(
			"Mensaje de Advertencia",
			"Ingrese Ruc y Razón Social",
			"warning"
		);
	}

	if (xtipo != "1" && xruc.length != 11) {
		return Swal.fire("Mensaje de Advertencia", "Ruc Incorrecto", "warning");
	}

	if ($("#chk_otro").is(":checked")) {
		xbpId = "";
		xroleId = "";
		xareaId = "";
		xarea = $("#txt_area").val();
		xfuncionario = $("#txt_funcionario").val(); /*
		if(xtipodoc.xarea==0 || xfuncionario.length==0){
			return Swal.fire("Mensaje de Advertencia","Ingrese area y Funcionario","warning");
		}*/
	} else {
		if (cboficina_id == "0") {
			return Swal.fire(
				"Mensaje de Advertencia",
				"Seleccione Oficina y Funcionario",
				"warning"
			);
		}
		xbpId = cboficina_id_a[0];
		xroleId = cboficina_id_a[1];
		xareaId = cboficina_id_a[2];
		xarea = cboficina_a[0] + "-" + cboficina_a[1];
		xfuncionario = cboficina_a[2];
	}

	if (
		xtipodoc.length == 0 ||
		xdoc.length == 0 ||
		xpaterno.length == 0 ||
		xmaterno.length == 0 ||
		xnombres.length == 0 ||
		xtipo.length == 0 ||
		xmotivo.length == 0 ||
		xarea.length == 0 ||
		xfuncionario.length == 0
	) {
		//xruc.length==0 || xrazon.length==0
		return Swal.fire(
			"Mensaje de Advertencia",
			"Llene los campos vacíos",
			"warning"
		);
	}

	$.ajax({
		url: "../controlador/visita/controlador_visita_registro.php",
		type: "POST",
		data: {
			xsede: xsede,
			xtipodoc: xtipodoc,
			xdoc: xdoc,
			xpaterno: xpaterno,
			xmaterno: xmaterno,
			xnombres: xnombres,
			xruc: xruc,
			xrazon: xrazon,
			xtipo: xtipo,
			xbpId: xbpId,
			xroleId: xroleId,
			xareaId: xareaId,
			xarea: xarea,
			xfuncionario: xfuncionario,
			xmotivo: xmotivo,
		},
	}).done(function (resp) {
		//$("#txt_funcionario").val(resp);
		//alert(resp);
		//return false;
		if (resp > 0) {
			if (resp == 1) {
				$("#modal_registro").modal("hide");
				Swal.fire(
					"Mensaje de Confirmación",
					"Datos correctamente, Nueva Visita Registrada",
					"success"
				).then((value) => {
					LimpiarRegistro();
					table.ajax.reload();
				});
			} else {
				Swal.fire(
					"Mensaje de Advertencia",
					"Lo sentimos el nombre del usuario ya se encuentra en nuestra base de datos",
					"warning"
				);
			}
		} else {
			Swal.fire(
				"Mensaje de Error",
				"Lo sentimos no se pudo completar el registro",
				"error"
			);
		}
	});
}

function Finalizar_Visita() {
	var visita = $("#txt_id_visita").val();

	$.ajax({
		url: "../controlador/visita/controlador_visita_finalizar.php",
		type: "POST",
		data: {
			xvisita: visita,
		},
	}).done(function (resp) {
		//alert(resp);
		$("#modal_finalizar_visita").modal("hide");
		table.ajax.reload();
	});
}

function listar_combo_oficinas() {
	$.ajax({
		url: "../controlador/visita/controlador_lista_oficinas.php",
		type: "POST",
	}).done(function (resp) {
		var content = JSON.parse(resp);
		var cadena = "";

		// Limpiar contenido previo del select
		$("#cb_oficina").empty();

		// Agregar la opción por defecto
		cadena += "<option value='0'>Seleccione Oficina...</option>";

		if (content.data.orgchart.length > 0) {
			for (var i = 0; i < content.data.orgchart.length; i++) {
				var item = content.data.orgchart[i];
				cadena +=
					"<option value='" +
					item.bpId + "|" + item.roleId + "|" + item.areaId +
					"'>" +
					item.area + " | " + item.role + " | " + item.responsable +
					"</option>";
			}
		} else {
			cadena += "<option value=''>NO SE ENCONTRARON REGISTROS</option>";
		}

		$("#cb_oficina").append(cadena);

		// Destruir select2 si ya está inicializado
		if ($.fn.select2 && $("#cb_oficina").hasClass("select2-hidden-accessible")) {
			$("#cb_oficina").select2("destroy");
		}

		// Inicializar select2 con búsqueda
		$("#cb_oficina").select2({
			placeholder: "---> Seleccione Oficina",
			width: "100%",
			dropdownParent: $('#modal_registro'), // opcional si está en modal
			matcher: function (params, data) {
				if ($.trim(params.term) === "") return data;
				if (data.text.toLowerCase().indexOf(params.term.toLowerCase()) > -1) {
					return data;
				}
				return null;
			}
		});
	});
}

function LimpiarRegistro() {
	//$("#cbtipodoc").val("");
	$("#txt_nrodoc").val("");
	$("#txt_paterno").val("");
	$("#txt_materno").val("");
	$("#txt_nombres").val("");
	$("#txt_ruc").val("");
	$("#txt_razon").val("");
	//$("#cb_tipo").val("");
	$("#txt_area").val("");
	$("#txt_funcionario").val("");
	$("#txt_motivo").val("");
	$("#cb_oficina").val("0").change();
	$("#chk_otro").prop("checked", false);
	$("#pn_otro").hide("fast");
	$("#cb_oficina").prop("disabled", false);
}

function filtrarPorFecha() {
	var sede = $("#txt_sede_id").val(); // viene del input oculto
	var mes = $("#select_mes").val();
	var anio = $("#select_anio").val();

	$.ajax({
		url: '../controlador/visita/controlador_listar_visita_fecha.php',
		type: 'POST',
		data: {
			sede: sede,
			mes: mes,
			anio: anio
		}
	}).done(function (resp) {
		var data = JSON.parse(resp);
		$('#tabla_visita').DataTable().clear().rows.add(data.data).draw();
	});
}
