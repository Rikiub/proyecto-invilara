<?php

require_once "modelo/director.php";

$usuario = new Director();

if (isset($_POST["accion"])) {
	$accion = $_POST["accion"];

	try {
		$usuario->set_cedula(isset($_POST["id"]) ? $_POST["id"] : $_POST["cedula"]);

		if ($accion == "eliminar") {
			$usuario->eliminar();
		} else {
			$usuario->set_nombre($_POST["nombre"]);
			$usuario->set_correo($_POST["correo"]);
			$usuario->set_telefono($_POST["telefono"]);
			$usuario->set_direccion($_POST["direccion"]);

			if ($accion == "insertar") {
				$usuario->insertar();
			} elseif ($accion == "modificar") {
				$usuario->modificar();
			}
		}

		$res["exito"] = "Procesado con exito";
		echo json_encode($res);
	} catch (Exception $err) {
		$res["error"] = $err->getMessage();
		echo json_encode($res);
	}

	exit;
}

$datos = $usuario->consultar();
require_once "vista/director.php";

?>