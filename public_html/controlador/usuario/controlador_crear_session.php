<?php
$IDUSUARIO = $_POST['idusuario'];
$USER = $_POST['user'];
$ROL = $_POST['rol'];
$SEDE = $_POST['sede'];
$SEDE_NOM = $_POST['sede_nom'];
if($ROL==1){//ADMINISTRADOR
	$SEDE="1";
	$SEDE_NOM = "TODAS LAS SEDES";
}
session_start();
$_SESSION['S_IDUSUARIO']=$IDUSUARIO;
$_SESSION['S_USER']=$USER;
$_SESSION['S_ROL']=$ROL;
$_SESSION['S_SEDE']=$SEDE;
$_SESSION['S_SEDE_NOM']=$SEDE_NOM;

?>