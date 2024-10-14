<?php

require_once "modelo/director.php";

$modelo = new Director();

if (isset($_POST["accion"])) {
	$accion = $_POST["accion"];

	try {
		$modelo->set_cedula(isset($_POST["id"]) ? $_POST["id"] : $_POST["cedula"]);

		if ($accion == "eliminar") {
			$modelo->eliminar();
		} else {
			$modelo->set_nombre($_POST["nombre"]);
			$modelo->set_correo($_POST["correo"]);
			$modelo->set_telefono($_POST["telefono"]);
			$modelo->set_direccion($_POST["direccion"]);

			if ($accion == "insertar") {
				$modelo->insertar();
			} elseif ($accion == "modificar") {
				$modelo->modificar();
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

$datos = $modelo->consultar();
require_once "vista/director.php";

?>