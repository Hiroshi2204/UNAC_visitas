<?php
require '../../modelo/modelo_visita.php';
$MV = new Modelo_Visita();

$sede = htmlspecialchars($_POST['sede'], ENT_QUOTES, 'UTF-8');
$mes = htmlspecialchars($_POST['mes'], ENT_QUOTES, 'UTF-8');
$anio = htmlspecialchars($_POST['anio'], ENT_QUOTES, 'UTF-8');

$consulta = $MV->listar_visita_reporte($sede, $mes, $anio);
echo json_encode($consulta);
?>