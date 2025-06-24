<?php
    require '../../modelo/modelo_visita.php';
    $MV = new Modelo_Visita();
	$visita= htmlspecialchars($_POST['xvisita'],ENT_QUOTES,'UTF-8');
    $consulta = $MV->Finalizar_Visita($visita);
    echo $consulta;

?>