// JavaScript Document


var table;
function listar_visita(){
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
           type:'POST'
       },
       "columns":[
           {"data":"visitante"},
           {"data":"tipo"},
           {"data":"entidad"},
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
















