<?php
    require '../../modelo/modelo_visita.php';

    $MV = new Modelo_Visita();
    $nrodoc = htmlspecialchars($_POST['nrodoc'],ENT_QUOTES,'UTF-8');
    $consulta = $MV->VerificarVisitante($nrodoc);
    $data = json_encode($consulta);
    if(count($consulta)>0){
        echo $data;
    }else{
        echo 0;
    }

?>