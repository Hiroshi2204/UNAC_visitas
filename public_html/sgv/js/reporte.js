// JavaScript Document

var table;
function listar_visita(dia,mes,anio){
    	table = $("#tabla_visita").DataTable({
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
           "url":"../controlador/visita/controlador_visita_fecha.php",
           type:'POST',
		   data:{
			dia:dia,
			mes:mes,
			anio:anio
		}
       },
       "columns":[
		   {"data":"nom_sede"},
           {"data":"visitante"},
           {"data":"tipo"},
           {"data":"entidad"},
		   {"data":"area"}, 
           {"data":"funcionario"}, 
           {"data":"ingreso"},
		   {"data":"salida"}
       ],
       select: true
   });
   //document.getElementById("tabla_visita_filter").style.display="none";
	/*
   $('input.global_filter').on( 'keyup click', function () {
        filterGlobal();
    } );
    $('input.column_filter').on( 'keyup click', function () {
        filterColumn( $(this).parents('tr').attr('data-column') );
    });
	*/

}



function filterGlobal() {
    $('#tabla_visita').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}



function MostrarFecha(){
	var fecha = $("#txt_fecha").val();
	
	if(fecha.length==0) {
        return Swal.fire("Mensaje de Advertencia","Escoja Fecha de Búsqueda","warning");
    }
	
	var dia = fecha.substr(0, 2)
	var mes = fecha.substr(3, 2)
	var anio = fecha.substr(6, 4)
	
	listar_visita(dia,mes,anio);
}

