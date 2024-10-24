<?php

require_once "modelo/solicitud.php";
$modelo = new Solicitud();

// Fijar tipo de solicitud
$tipo_solicitud = isset($_GET["tipo"]) ? $_GET["tipo"] : "1";
$modelo->set_tipo_solicitud($tipo_solicitud);

switch ($tipo_solicitud) {
    case "1":
        $tipo_solicitud_nombre = "Generales";
        break;
    case "2":
        $tipo_solicitud_nombre = "1x10";
        break;
    case "3":
        $tipo_solicitud_nombre = "Institucionales";
        break;
}

// Procesar POST
if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    $modelo->set_id($_POST['id']);

    try {
        if ($accion == "eliminar") {
            $modelo->eliminar();
        } else {
            if ($modelo->esGeneral()) {
                $modelo->set_cedula_solicitante($_POST['cedula_solicitante']);
            } elseif ($modelo->esInstitucional()) {
                $modelo->set_id_institucion($_POST['id_institucion']);
            }

            $modelo->set_id_comunidad($_POST['id_comunidad']);
            $modelo->set_id_parroquia($_POST['id_parroquia']);
            $modelo->set_id_gerencia($_POST['id_gerencia']);
            $modelo->set_fecha($_POST['fecha']);
            $modelo->set_estatus($_POST['estatus']);
            $modelo->set_remitente($_POST['remitente']);
            $modelo->set_observacion($_POST['observacion']);
            $modelo->set_problematica($_POST['problematica']);

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

// Datos
require_once "modelo/gerencia.php";
$m = new Gerencia();

$gerencias = $m->consultar();

require_once "modelo/institucion.php";
$m = new Institucion();

$instituciones = $m->consultar();

require_once "modelo/solicitante.php";
$m = new Solicitante();

$solicitantes = $m->consultar();

require_once "modelo/comunidad.php";
$m = new Comunidad();

$comunidades = $m->consultar();

require_once "modelo/parroquia.php";
$m = new Parroquia();

$parroquias = $m->consultar();

// Datos principales
$datos = $modelo->consultar();

// Cargar vista
require_once "vista/solicitud.php";

?>