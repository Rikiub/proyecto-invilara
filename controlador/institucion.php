<?php

require_once "modelo/institucion.php";

$institucion = new Institucion();

if (isset($_POST["accion"])) {
	$accion = $_POST["accion"];

	try {
		$institucion->set_id($_POST["id"]);

		if ($accion == "eliminar") {
			$institucion->eliminar();
		} else {
			$institucion->set_id_parroquia($_POST["id_parroquia"]);
			$institucion->set_nombre($_POST["nombre"]);
			$institucion->set_cedula_director($_POST["cedula_director"]);
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

// Cargar vista
require_once "vista/institucion.php";

?>