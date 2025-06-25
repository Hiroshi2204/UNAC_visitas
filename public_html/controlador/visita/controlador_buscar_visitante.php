<?php
require '../../modelo/modelo_conexion.php';

$cnn = new conexion();
$cnn->conectar();
$conexion = $cnn->conexion;

$valor = $_POST['valor'];

$sql = "SELECT v.id_visitante, v.num_doc AS dni, v.apepat, v.apemat, v.nombres,
               MAX(vi.ingreso) AS ultima_visita
        FROM t_visitante v
        INNER JOIN t_visita vi ON v.id_visitante = vi.id_visitante
        WHERE v.num_doc LIKE '%$valor%' 
           OR v.apepat LIKE '%$valor%' 
           OR v.apemat LIKE '%$valor%' 
           OR v.nombres LIKE '%$valor%'
        GROUP BY v.id_visitante, v.num_doc, v.apepat, v.apemat, v.nombres
        ORDER BY ultima_visita DESC";

$resultado = mysqli_query($conexion, $sql);
$datos = [];

while ($row = mysqli_fetch_assoc($resultado)) {
    $datos[] = $row;
}

$cnn->cerrar();
echo json_encode($datos);
