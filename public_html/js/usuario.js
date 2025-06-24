// JavaScript Document

function VerificarUsuario(){
    var usu = $("#txt_usu").val();
    var con = $("#txt_con").val();
    
    if(usu.length==0 || con.length==0) {
        return Swal.fire("Mensaje de Advertencia","Llene los campos vacíos","warning");
        
    }
    
	$.ajax({
        url:'../controlador/usuario/controlador_verificar_usuario.php',
        type:'POST',
        data:{
            user:usu,
            pass:con
        }
    }).done(function(resp){
		//alert(resp);

		if(resp==0){
			Swal.fire("Mensaje De Error",'Usuario y/o contrase\u00f1a incorrecta',"error");
		}else{
			var data= JSON.parse(resp);
			//alert(data[0]['usu_estatus']);
			
			if(data[0]['usu_estatus']==="INACTIVO"){
				return Swal.fire("Mensaje De Advertencia","Lo sentimos el usuario "+ usu + " se encuentra suspendido, comuníquese con el administrador","warning");	
			}
			
			$.ajax({
				url:'../controlador/usuario/controlador_crear_session.php',
				type:'POST',
				data:{
					idusuario:data[0]['usu_id'],
					user:data[0]['usu_nombre'],
					rol:data[0]['rol_id'],
					sede:data[0]['sede_id'],
					sede_nom:data[0]['nom_sede']
					
				}
			}).done(function(resp){
				let timerInterval
                Swal.fire({
                title: 'BIENVENIDO AL SISTEMA',
                html: 'Usted sera redireccionado en <b></b> milisegundos.',
                timer: 1000,
                timerProgressBar: true,
                onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                    const content = Swal.getContent()
                    if (content) {
                        const b = content.querySelector('b')
                        if (b) {
                        b.textContent = Swal.getTimerLeft()
                        }
                    }
                    }, 100)
                },
                onClose: () => {
                    clearInterval(timerInterval)
                }
                }).then((result) => {
         
                if (result.dismiss === Swal.DismissReason.timer) {
                    location.reload();
                }
				})
			})
			Swal.fire("Mensaje De Confirmación",'Bienvenido al Sistema',"success");	
		}
		
	});
}

 var table;
function listar_usuario(){
    	table = $("#tabla_usuario").DataTable({
       "ordering":false,
		"paging":false,
       "bLengthChange":false,
       "searching": { "regex": true },
       "lengthMenu": [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"] ],
       "pageLength": 10,
       "destroy": true,
       "async": false ,
       "processing": true,
       "ajax":{
           "url":"../controlador/usuario/controlador_usuario_listar.php",
           type:'POST'
       },
       "columns":[
           {"data":"posicion"},
           {"data":"usu_nombre"},
           {"data":"rol_nombre"},
           {"data":"usu_sexo",
                render: function (data, type, row ) {
                    if(data=='M'){
                        return "MASCULINO";                   
                    }else{
                        return "FEMINO";                 
                    }
                }
           }, 
           {"data":"usu_estatus",
             render: function (data, type, row ) {
               if(data=='ACTIVO'){
                   return "<span class='badge badge-success'>"+data+"</span>";                   
               }else{
                 return "<span class='badge badge-danger'>"+data+"</span>";                 
               }
             }
           },  
           {"defaultContent":"<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>"}
       ],

       select: true
   });
   document.getElementById("tabla_usuario_filter").style.display="none";
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });

}



function filterGlobal() {
    $('#tabla_usuario').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}


function AbrirModalRegistro(){
    $("#modal_registro").modal({backdrop:'static',keyboard:false})
    $("#modal_registro").modal('show');
}

function listar_combo_rol(){
	$.ajax({
		url:'../controlador/usuario/controlador_como_rol_listar.php',
		type:'POST'
	}).done(function(resp){
		//alert(resp);
		var data = JSON.parse(resp);
		var cadena="";
		if(data.length>0){
			for(var i=0; i<data.length; i++){
				cadena +="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
			}
			$("#cbm_rol").html(cadena);
		}else{
			cadena +="<option value ''> NO SE ENCONTRARON REGISTROS</option>";
		}
	})
}

function Registrar_Usuario(){
	var usu = $("#txt_usu").val();
	var contra = $("#txt_con1").val();
	var contra2 = $("#txt_con2").val();
	var sexo = $("#cbm_sexo").val();
	var rol = $("#cbm_rol").val();
	
	//alert(usu+"-"+contra+"-"+contra2+"-"+sexo+"-"+rol);
	
	if(usu.length==0 || contra.length==0 || contra.length==0 || contra2.length==0 || sexo.length==0 || rol.length==0){
		return Swal.fire("Mensaje de Advertencia","Llene los campos vacíos","warning");
	}
	
	if(contra != contra2){
		return Swal.fire("Mensaje de Advertencia","Las contraseñas deben coincidir","warning");
	}
	
	$.ajax({
		url:'../controlador/usuario/controlador_usuario_registro.php',
		type:'POST',
		data:{
			usuario:usu,
			contrasena:contra,
			sexo:sexo,
			rol:rol
		}
	}).done(function(resp){
		//alert(resp);
		if(resp>0){
			if(resp==1){
				$("#modal_registro").modal('hide');
				Swal.fire("Mensaje de Confirmación","Datos correctamente, Nuevo Usuario Registrado","success")
				.then((value)=>{
					LimpiarRegistro()
					table.ajax.reload();
				});
			}else{
				Swal.fire("Mensaje de Advertencia","Lo sentimos el nombre del usuario ya se encuentra en nuestra base de datos","warning");
			}
		}else{
			Swal.fire("Mensaje de Error","Lo sentimos no se pudo completar el registro","error");
		}
	})
}

function LimpiarRegistro(){
	$("#txt_usu").val("");
	$("#txt_con1").val("");
	$("#txt_con2").val("");
	
}
















