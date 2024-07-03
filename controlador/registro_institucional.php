<?php

require_once "modelo/registro_institucional.php";

if (isset($_POST["accion"])) {
	$modelo = new Registro();
	$accion = $_POST['accion'];

	if ($accion == 'consultar') {
		echo json_encode($modelo->consultar());
	} elseif ($accion == 'eliminar') {
		$modelo->set_nro_control($_POST['nro_control']);
		echo json_encode($modelo->eliminar());
	} else {
		$modelo->set_nro_control($_POST['nro_control']);
		$modelo->set_nro_oficio($_POST['nro_oficio']);
		$modelo->set_fecha($_POST['fecha']);
		$modelo->set_asunto($_POST['asunto']);
		$modelo->set_telefono($_POST['telefono']);
		$modelo->set_observacion($_POST['observacion']);
		$modelo->set_gerencia_referida($_POST['gerencia_referida']);
		$modelo->set_direccion_comunidad($_POST['direccion_comunidad']);
		$modelo->set_instrucciones_presidenciales($_POST['instrucciones_presidenciales']);
		$modelo->set_estatus($_POST["estatus"]);

		if ($accion == 'incluir') {
			echo json_encode($modelo->insertar());
		} elseif ($accion == 'modificar') {
			echo json_encode($modelo->modificar());
		}
	}

	exit;
}

require_once "vista/registro_institucional.php";
