<?php

require_once "modelo/solicitud_institucional.php";

$modelo = new Registro();

if (isset($_POST["accion"])) {
	$accion = $_POST["accion"];

	$modelo->set_nro_control($_POST['nro_control']);

	try {
		if ($accion == "eliminar") {
			$modelo->eliminar();
		} else {
			$modelo->set_nro_control($_POST["nro_control"]);
			$modelo->set_nro_oficio($_POST["nro_oficio"]);
			$modelo->set_id_institucion($_POST["id_institucion"]);
			$modelo->set_id_comunidad($_POST["id_comunidad"]);
			$modelo->set_id_gerencia($_POST["id_gerencia"]);
			$modelo->set_fecha($_POST["fecha"]);
			$modelo->set_problematica($_POST["problematica"]);
			$modelo->set_instrucciones($_POST["instrucciones"]);
			$modelo->set_observacion($_POST["observacion"]);
			$modelo->set_estatus($_POST["estatus"]);


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
require_once "vista/solicitud_institucional.php";

?>