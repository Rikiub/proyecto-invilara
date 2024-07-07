<?php

require_once "modelo/institucional.php";

if (!empty($_POST)) {
	$modelo = new institucional();

	$accion = $_POST['accion'];

	if ($accion == 'consultar') {
		echo json_encode($modelo->consultar());
	} else if ($accion == 'obtienefecha') {
		echo json_encode($modelo->obtienefecha());
	} elseif ($accion == 'eliminar') {
		$modelo->set_control($_POST['nro_control']);
		echo json_encode($modelo->eliminar());
	} else {
		$modelo->set_control($_POST['nro_control']);
		$modelo->set_fecha($_POST['fecha_solicitante']);
		$modelo->set_nrooficio($_POST['nro_oficio']);
		$modelo->set_asunto($_POST['asunto']);
		$modelo->set_telefono($_POST['telefono']);
		$modelo->set_observacion($_POST['observacion']);
		$modelo->set_gerencia($_POST['gerencia_referida']);
		$modelo->set_direccion($_POST['direccion_comunidad']);
		$modelo->set_instrucciones($_POST['instrucciones_presidenciales']);

		if ($accion == 'incluir') {
			echo json_encode($modelo->incluir());
		} elseif ($accion == 'modificar') {
			echo json_encode($modelo->modificar());
		}
	}

	exit;
}

require_once ("vista/" . $pagina . ".php");

?>