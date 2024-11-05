<?php

require_once "modelo/solicitud.php";
$modelo = new Solicitud();

// Fijar tipo de solicitud
$tipo_solicitud = isset($_GET["tipo"]) ? $_GET["tipo"] : "1";
$modelo->set_tipo_solicitud($tipo_solicitud);

switch ($tipo_solicitud) {
    case "1":
        $nombre_solicitud = "Generales";
        break;
    case "2":
        $nombre_solicitud = "1x10";
        break;
    case "3":
        $nombre_solicitud = "Institucionales";
        break;
}

# Fijar tipo de vista
$tipo_vista = isset($_GET["vista"]) ? $_GET["vista"] : "programado";

switch ($tipo_vista) {
    case "programado":
        $titulo_vista = "En programación";
        $id_estado = "1";
        break;
    case "ejecucion":
        $titulo_vista = "En programación y ejecución";
        $id_estado = "2";
        break;
    case "cerrado":
        $titulo_vista = "Asignadas y cerradas";
        $id_estado = "3";
        break;
    case "reporte":
        $titulo_vista = "Reporte";
        $id_estado = null;
        $ocultar_acciones = true;
        break;
}
$modelo->set_estado($id_estado);

// Procesar POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (isset($_POST["accion"])) {
            $accion = $_POST["accion"];
        } else {
            throw new Exception("Se necesita especificar una acción.");
        }

        if ($accion == "reportar") {
            $modelo->generarPDF();
        } else {
            $modelo->set_id($_POST['id']);

            if ($accion == "eliminar") {
                $modelo->eliminar();
            } else {
                if ($modelo->esGeneral()) {
                    $modelo->set_cedula_solicitante($_POST['cedula_solicitante']);
                } elseif ($modelo->esInstitucional()) {
                    $modelo->set_id_institucion($_POST['id_institucion']);
                }

                $modelo->set_id_gerencia(isset($_POST['id_gerencia']) ? $_POST['id_gerencia'] : null);
                $modelo->set_id_comunidad($_POST['id_comunidad']);
                $modelo->set_fecha($_POST['fecha']);
                $modelo->set_id_institucion_remitente($_POST['id_remitente']);
                $modelo->set_problematica($_POST['problematica']);

                if ($accion == "insertar") {
                    $modelo->insertar();
                } elseif ($accion == "modificar") {
                    $modelo->modificar();
                }
            }

            $res["exito"] = "Procesado con exito";
            echo json_encode($res);
        }
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
$estados = $modelo->consultar_estados();

// Cargar vista
require_once "vista/solicitud.php";

?>