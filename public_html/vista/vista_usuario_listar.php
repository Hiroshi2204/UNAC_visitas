<script type="text/javascript" src="../js/usuario.js"></script>
<div class="col-md-12">
<div class="card card-warning">
  <div class="card-header">
	<h3 class="card-title">BIENVENIDO AL CONTENIDO DEL USUARIO</h3>

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
	  

	  
	  <table id="tabla_usuario" class="display" style="width:100%">
		<thead>
			<tr>
				<th>#</th>
				<th>Usuario</th>
				<th>Rol</th>
				<th>Sexo</th>
				<th>Estatus</th>
				<th>Acci&oacute;n</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>#</th>
				<th>Usuario</th>
				<th>Rol</th>
				<th>Sexo</th>
				<th>Estatus</th>
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
        <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
            
            <h4 class="modal-title">Registro De Usuario</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <label for="">Usuario</label>
                    <input type="text" class="form-control" id="txt_usu" placeholder="Ingrese usuario"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="txt_con1" placeholder="Ingrese contrase&ntilde;a"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Repita la Contrase&ntilde;a</label>
                    <input type="password" class="form-control" id="txt_con2" placeholder="Repita contrase&ntilde;a"><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Sexo</label>
                    <select class="js-example-basic-single" name="state" id="cbm_sexo" style="width:100%;">
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select><br><br>
                </div>
                <div class="col-lg-12">
                    <label for="">Rol</label>
                    <select class="js-example-basic-single" name="state" id="cbm_rol" style="width:100%;">
                    </select><br><br>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="Registrar_Usuario()"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
            </div>
        </div>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
	listar_usuario();
	$('.js-example-basic-single').select2();
	listar_combo_rol();
	$("#modal_registro").on('shown.bs.modal',function(){
        $("#txt_usu").focus();  
    })

} );
</script>