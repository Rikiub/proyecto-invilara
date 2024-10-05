<?php

require_once "modelo/solicitud_institucional.php";

$institucion = new Registro();

if (isset($_POST["accion"])) {
	$accion = $_POST["accion"];

	$institucion->set_nro_control($_POST['nro_control']);

	try {
		if ($accion == "eliminar") {
			$institucion->eliminar();
		} else {
			$institucion->set_nro_control($_POST["nro_control"]);
			$institucion->set_nro_oficio($_POST["nro_oficio"]);
			$institucion->set_id_institucion($_POST["id_institucion"]);
			$institucion->set_id_comunidad($_POST["id_comunidad"]);
			$institucion->set_id_gerencia($_POST["id_gerencia"]);
			$institucion->set_fecha($_POST["fecha"]);
			$institucion->set_problematica($_POST["problematica"]);
			$institucion->set_instrucciones($_POST["instrucciones"]);
			$institucion->set_observacion($_POST["observacion"]);
			$institucion->set_estatus($_POST["estatus"]);


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
require_once "vista/solicitud_institucional.php";

?>