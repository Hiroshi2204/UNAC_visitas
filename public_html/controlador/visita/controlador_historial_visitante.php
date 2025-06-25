<?php
require '../../modelo/modelo_conexion.php';

$cnn = new conexion();
$cnn->conectar();
$conexion = $cnn->conexion;

$dni = $_POST['dni']; // Aquí realmente es el número de documento

$sql = "SELECT
            DATE(vi.ingreso) AS fecha,
            TIME(vi.ingreso) AS hora_ingreso,
            TIME(vi.salida) AS hora_salida,
            vi.area,
            vi.funcionario,
            m.motivo AS motivo
        FROM t_visita vi
        INNER JOIN t_visita_motivo m ON vi.id_motivo = m.id_motivo
        INNER JOIN t_visitante tv ON vi.id_visitante = tv.id_visitante
        WHERE tv.num_doc = '$dni'
        ORDER BY vi.ingreso DESC";

$resultado = mysqli_query($conexion, $sql);
$datos = [];

while ($row = mysqli_fetch_assoc($resultado)) {
    $datos[] = $row;
}

$cnn->cerrar();

echo json_encode($datos);
