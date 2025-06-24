<?php
    require '../../modelo/modelo_visita.php';

    $MV = new Modelo_Visita();
    $id = htmlspecialchars($_POST['id'],ENT_QUOTES,'UTF-8');
    $consulta = $MV->VerificarRuc($id);
    $data = json_encode($consulta);
    if(count($consulta)>0){
        echo $data;
    }else{
        echo 0;
    }

?>