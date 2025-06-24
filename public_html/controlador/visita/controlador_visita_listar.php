<?php
    require '../../modelo/modelo_visita.php';

    $MV = new Modelo_Visita();
    $consulta = $MV->listar_visita($_POST['sede']);
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