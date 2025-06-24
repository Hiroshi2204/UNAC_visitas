// JavaScript Document
var tabla_visita;

function listar_visita_reporte(sede, mes, anio) {
    $.ajax({
        url: '../controlador/reporte/controlador_visita_reporte1.php',
        type: 'POST',
        data: { sede: sede, mes: mes, anio: anio },
        success: function (resp) {
            var data = JSON.parse(resp);

            if ($.fn.DataTable.isDataTable('#tabla_visita')) {
                tabla_visita.clear().destroy(); // Limpia y destruye la instancia anterior
            }

            tabla_visita = $('#tabla_visita').DataTable({
                data: data.data,
                responsive: true,
                scrollX: true,
                autoWidth: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/es-ES.json'
                },
                columns: [
                    { data: 'id_visita' },
                    { data: 'sede' },
                    { data: 'visitante' },
                    { data: 'tipo' },
                    { data: 'entidad' },
                    { data: 'area' },
                    { data: 'funcionario' },
                    { data: 'motivo' },
                    {
                        data: 'ingreso',
                        render: function (data) {
                            const fecha = new Date(data);
                            return fecha.toLocaleString('es-PE', {
                                day: '2-digit',
                                month: '2-digit',
                                year: 'numeric',
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: false
                            });
                        }
                    },
                    {
                        data: 'salida',
                        render: function (data) {
                            if (!data) return '-';
                            const fecha = new Date(data);
                            return fecha.toLocaleString('es-PE', {
                                day: '2-digit',
                                month: '2-digit',
                                year: 'numeric',
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: false
                            });
                        }
                    }
                ]
            });
        }
    });
}


function filterGlobal() {
    $('#tabla_visita').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}



function MostrarFecha() {
    var fecha = $("#txt_fecha").val();

    if (fecha.length == 0) {
        return Swal.fire("Mensaje de Advertencia", "Escoja Fecha de Búsqueda", "warning");
    }

    var dia = fecha.substr(0, 2)
    var mes = fecha.substr(3, 2)
    var anio = fecha.substr(6, 4)

    listar_visita(dia, mes, anio);
}

