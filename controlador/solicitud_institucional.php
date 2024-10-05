<?php

require_once "modelo/solicitud_institucional.php";

$usuario = new Registro();

if (isset($_POST["accion"])) {
	$accion = $_POST["accion"];

	$usuario->set_nro_control($_POST['nro_control']);

	try {
		if ($accion == "eliminar") {
			$usuario->eliminar();
		} else {
			$usuario->set_nro_control($_POST["nro_control"]);
			$usuario->set_nro_oficio($_POST["nro_oficio"]);
			$usuario->set_id_institucion($_POST["id_institucion"]);
			$usuario->set_id_comunidad($_POST["id_comunidad"]);
			$usuario->set_id_gerencia($_POST["id_gerencia"]);
			$usuario->set_fecha($_POST["fecha"]);
			$usuario->set_problematica($_POST["problematica"]);
			$usuario->set_instrucciones($_POST["instrucciones"]);
			$usuario->set_observacion($_POST["observacion"]);
			$usuario->set_estatus($_POST["estatus"]);


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
require_once "vista/solicitud_institucional.php";

?>