<?php

require_once "modelo/director.php";

$institucion = new Director();

if (isset($_POST["accion"])) {
	$accion = $_POST["accion"];

	try {
		$institucion->set_cedula(isset($_POST["id"]) ? $_POST["id"] : $_POST["cedula"]);

		if ($accion == "eliminar") {
			$institucion->eliminar();
		} else {
			$institucion->set_nombre($_POST["nombre"]);
			$institucion->set_correo($_POST["correo"]);
			$institucion->set_telefono($_POST["telefono"]);
			$institucion->set_direccion($_POST["direccion"]);

			if ($accion == "insertar") {
				$institucion->insertar();
			} elseif ($accion == "modificar") {
				$institucion->modificar();
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

$datos = $institucion->consultar();
require_once "vista/director.php";

?>