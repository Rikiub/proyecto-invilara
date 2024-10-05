<?php

require_once "modelo/institucion.php";

$usuario = new Institucion();

if (isset($_POST["accion"])) {
	$accion = $_POST["accion"];

	try {
		$usuario->set_id($_POST["id"]);

		if ($accion == "eliminar") {
			$usuario->eliminar();
		} else {
			$usuario->set_id_parroquia($_POST["id_parroquia"]);
			$usuario->set_nombre($_POST["nombre"]);
			$usuario->set_cedula_director($_POST["cedula_director"]);
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

// Cargar vista
require_once "vista/institucion.php";

?>