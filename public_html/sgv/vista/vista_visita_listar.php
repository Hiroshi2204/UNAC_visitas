<?php session_start();?>

<script type="text/javascript" src="../js/visita.js"></script>
<div class="col-md-12">
<div class="card card-warning">
  <div class="card-header">
	<h3 class="card-title">BIENVENIDO AL REGISTRO DE VISITAS</h3>

	<div class="card-tools">
	  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
	  </button>
	</div>
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
		<button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i class="fa fa-plus"></i> Nuevo Registro</button>
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
				<input type="text" id="txt_sede_nom" class="form-control" placeholder="Número Documento" value="<?php echo $_SESSION['S_SEDE_NOM'];?>" disabled>
				<input type="hidden" id="txt_sede_id" value="<?php echo $_SESSION['S_SEDE'];?>">
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
				  <select class="form-control" name="cb_oficina" id="cb_oficina" style="width:100%;">
				<option value="0">--->seleccione Oficina</option>
				</select>
			  </div>

			</div>
			<br>
			<input type="checkbox" id="chk_otro">
			<label class="form-check-label" for="chk_otro" style="cursor: pointer;">Otro Funcionario</label>	
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
                <button type="button" class="btn btn-primary" onclick="Registrar_Visita()"><i class="fa fa-check"></i>&nbsp;Registrar</button>
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
              <p>Va a finalizar la Visita de <br><h4><span id="span_visitante"> </span></h4></p>
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
	listar_visita("<?php echo $_SESSION['S_SEDE'];?>");
	listar_combo_oficinas();
	$('#cb_oficina').select2();
	$('#pn_empresa').hide("fast");
	$('#pn_otro').hide("fast");
	

	listar_combo_rol();
	$("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_usu").focus();  
    })

} );
	
$('#cb_tipo').on("change", function() {
	var id = $(this).val();
	if(id=="1"){
		//alert("es ruc");
		$('#pn_empresa').hide("fast");
	}else{
		$('#pn_empresa').show("fast");
	}

});

$("#chk_otro").on( 'change', function() {
    if( $(this).is(':checked') ) {
        $('#pn_otro').show("fast");
		$("#cb_oficina").prop( "disabled", true );
    } else {
        $('#pn_otro').hide("fast");
		$("#cb_oficina").prop( "disabled", false );
		$("#txt_funcionario").val("");
		$("#txt_motivo").val("");
    }
});
	

	
</script>