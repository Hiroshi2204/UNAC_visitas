<?php
require_once '../../lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$mes  = isset($_GET['mes']) ? $_GET['mes'] : 0;
$anio = isset($_GET['anio']) ? $_GET['anio'] : 0;
$sede = isset($_GET['sede']) ? $_GET['sede'] : 0;

// Conexión
$conexion = new mysqli("localhost", "root", "", "visitas");
if ($conexion->connect_errno) {
  die("Error de conexión: " . $conexion->connect_error);
}

// Llamar al SP
$conexion->query("SET NAMES 'utf8'"); // Para evitar problemas de acentos
$query = $conexion->prepare("CALL SP_LISTAR_VISITAS_POR_FECHA(?, ?, ?)");
$query->bind_param("iii", $sede, $mes, $anio);
$query->execute();
$res = $query->get_result();

// Construir HTML para el PDF
$html = '
<style>
  table {
    border-collapse: collapse;
    width: 100%;
    font-size: 11px;
  }
  th, td {
    border: 1px solid #666;
    padding: 4px;
    text-align: center;
  }
  th {
    background-color: #f2f2f2;
  }
</style>
<h3 style="text-align: center;">REPORTE DE VISITAS - Mes: '.$mes.' Año: '.$anio.'</h3>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Sede</th>
      <th>Visitante</th>
      <th>Tipo</th>
      <th>Entidad</th>
      <th>Área</th>
      <th>Funcionario</th>
      <th>Motivo</th>
      <th>Ingreso</th>
      <th>Salida</th>
    </tr>
  </thead>
  <tbody>';

$i = 1;
while ($row = $res->fetch_assoc()) {
  $html .= "<tr>
    <td>$i</td>
    <td>{$row['sede']}</td>
    <td>{$row['visitante']}</td>
    <td>{$row['tipo']}</td>
    <td>{$row['entidad']}</td>
    <td>{$row['area']}</td>
    <td>{$row['funcionario']}</td>
    <td>{$row['motivo']}</td>
    <td>{$row['ingreso']}</td>
    <td>{$row['salida']}</td>
  </tr>";
  $i++;
}

$html .= '</tbody></table>';

// Liberar resultados y cerrar el SP correctamente
$query->close();
$conexion->next_result(); // ← MUY IMPORTANTE después de CALL

// Generar PDF con DOMPDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream("reporte_visitas_{$mes}_{$anio}.pdf", array("Attachment" => false));
?>