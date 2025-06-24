<?php

class Modelo_Visita{
	private $conexion;
	function __construct(){
		require_once 'modelo_conexion.php';
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}
	
	
	function VerificarVisitante($id){
		$sql = "call SP_VERIFICAR_VISITANTE('$id')";
		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {
			while ($consulta_VV = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VV;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}
	
	
	function VerificarRuc($id){
		$sql = "call SP_VERIFICAR_RUC('$id')";
		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {
			while ($consulta_VV = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VV;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}
	

	
	function listar_visita($sede){
		$sql = "call SP_LISTAR_VISITA('$sede')";
		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {
			while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
				$arreglo["data"][] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}
	
	function listar_visita_fecha($anio,$mes,$dia){
		$sql = "call SP_LISTAR_VISITA_FECHA($anio,$mes,$dia)";
		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {
			while ($consulta_VU = mysqli_fetch_assoc($consulta)) {
				$arreglo["data"][] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}
	
	function listar_combo_rol(){
		$sql = "call SP_LISTAR_COMBO_ROL()";
		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {
			while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}
	
	function Registrar_Visita($xsede,$xtipodoc,$xdoc,$xpaterno,$xmaterno,$xnombres,$xruc,$xrazon,$xtipo,$xbpId,$xroleId,$xareaId,$xarea,$xfuncionario,$xmotivo){
		$sql = "call SP_REGISTRAR_VISITA('$xsede','$xtipodoc','$xdoc','$xpaterno','$xmaterno','$xnombres','$xruc','$xrazon','$xtipo','$xbpId','$xroleId','$xareaId','$xarea','$xfuncionario','$xmotivo')";
		//return $sql;
		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {
			if($row = mysqli_fetch_array($consulta)) {
				return $id = trim($row[0]);
			}
			$this->conexion->cerrar();
		}
	}
	
	function Finalizar_Visita($id_visita){
		$sql = "call SP_FINALIZAR_VISITA('$id_visita')";
		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {
			if($row = mysqli_fetch_array($consulta)) {
				return $id = trim($row[0]);
			}
			$this->conexion->cerrar();
		}
	}


	
	
}

?>