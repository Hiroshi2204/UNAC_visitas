<?php
    require '../../modelo/modelo_visita.php';

    $MV = new Modelo_Visita();
    $consulta = $MV->listar_visita_fecha($_POST['anio'],$_POST['mes'],$_POST['dia']);
	//$consulta = $MV->listar_visita_fecha(2022,03,10);
	if($consulta){
		echo json_encode($consulta);
	}else{
		echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
	}


?>