<?php

require_once "modelo/institucion.php";

$modelo = new Institucion();

if (isset($_POST["accion"])) {
	$accion = $_POST["accion"];

	try {
		$modelo->set_id($_POST["id"]);

		if ($accion == "eliminar") {
			$modelo->eliminar();
		} else {
			$modelo->set_nombre($_POST["nombre"]);
			$modelo->set_cedula_director($_POST["cedula_director"]);
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

// Preparar datos a mostrar
$datos = $modelo->consultar();

// Cargar vista
require_once "vista/institucion.php";

?>