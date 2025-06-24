<?php
    require '../../modelo/modelo_visita.php';

    $MV = new Modelo_Visita();

	$xtipodoc= htmlspecialchars($_POST['xtipodoc'],ENT_QUOTES,'UTF-8');
	$xsede= htmlspecialchars($_POST['xsede'],ENT_QUOTES,'UTF-8');
	$xdoc = htmlspecialchars($_POST['xdoc'],ENT_QUOTES,'UTF-8');
	$xpaterno = htmlspecialchars($_POST['xpaterno'],ENT_QUOTES,'UTF-8');
	$xmaterno = htmlspecialchars($_POST['xmaterno'],ENT_QUOTES,'UTF-8');
	$xnombres = htmlspecialchars($_POST['xnombres'],ENT_QUOTES,'UTF-8');
	$xruc = htmlspecialchars($_POST['xruc'],ENT_QUOTES,'UTF-8');
	$xrazon = htmlspecialchars($_POST['xrazon'],ENT_QUOTES,'UTF-8');
	$xtipo = htmlspecialchars($_POST['xtipo'],ENT_QUOTES,'UTF-8');
	$xbpId = htmlspecialchars($_POST['xbpId'],ENT_QUOTES,'UTF-8');
	$xroleId = htmlspecialchars($_POST['xroleId'],ENT_QUOTES,'UTF-8');
	$xareaId = htmlspecialchars($_POST['xareaId'],ENT_QUOTES,'UTF-8');
	$xarea = htmlspecialchars($_POST['xarea'],ENT_QUOTES,'UTF-8');
	$xfuncionario = htmlspecialchars($_POST['xfuncionario'],ENT_QUOTES,'UTF-8');
	$xmotivo = htmlspecialchars($_POST['xmotivo'],ENT_QUOTES,'UTF-8');
    $consulta = $MV->Registrar_Visita($xsede,$xtipodoc,$xdoc,$xpaterno,$xmaterno,$xnombres,$xruc,$xrazon,$xtipo,$xbpId,$xroleId,$xareaId,$xarea,$xfuncionario,$xmotivo);
    echo $consulta;
	//echo "0aa";

?>