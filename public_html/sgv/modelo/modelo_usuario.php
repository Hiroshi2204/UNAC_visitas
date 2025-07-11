<?php

class Modelo_Usuario{
	private $conexion;
	function __construct(){
		require_once 'modelo_conexion.php';
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}
	/*
	function VerificarUsuario($usuario,$contra){
		$sql = "call SP_VERIFICAR_USUARIO('".$usuario."')";
		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {
			while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}
	*/
	
	function VerificarUsuario($usuario,$contra){
		$sql = "call SP_VERIFICAR_USUARIO('".$usuario."')";
		$arreglo = array();
		if ($consulta = $this->conexion->conexion->query($sql)) {
			while ($consulta_VU = mysqli_fetch_array($consulta)) {
				if(md5($contra) == $consulta_VU["usu_contrasena"])
				{
					$arreglo[] = $consulta_VU;
				}
			}
			return $arreglo;
			$this->conexion->cerrar();
		}
	}
	
	
	
	function listar_usuario(){
		$sql = "call SP_LISTAR_USUARIO()";
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
	
	function Registrar_Usuario($usuario,$contra,$sexo,$rol){
		$sql = "call SP_REGISTRAR_USUARIO('$usuario','$contra','$sexo','$rol')";
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