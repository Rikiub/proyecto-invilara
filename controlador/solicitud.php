<?php

require_once "modelo/solicitud.php";
$modelo = new Solicitud();

// Fijar tipo de solicitud
$tipo_solicitud = isset($_GET["tipo"]) ? $_GET["tipo"] : "1";
$modelo->set_tipo_solicitud($tipo_solicitud);

switch ($tipo_solicitud) {
    case "1":
        $titulo_solicitud = "Generales";
        break;
    case "2":
        $titulo_solicitud = "1x10";
        break;
    case "3":
        $titulo_solicitud = "Institucionales";
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
        $titulo_vista = "Por asignar";
        $id_estado = "2";
        break;
    case "cerrado":
        $titulo_vista = "Por cerrar";
        $id_estado = "3";
        break;
    case "reporte":
        $titulo_vista = "Reporte";
        $id_estado = null;
        $reporte = true;
        break;
}
$modelo->set_estado($id_estado);

// Procesar POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $accion = $_POST["accion"] ?? null;
        if (!$accion) {
            throw new Exception("Se necesita especificar una acción.");
        }

        $id = $_POST["id"] ?? null;
        $modelo->set_id($id);

        $res["mensaje"] = "Exito";

        switch ($accion) {
            case "consultar":
                if ($id) {
                    $datos = $modelo->obtenerPorId();
                } else {
                    $datos = $modelo->consultar();
                }

                $res = $datos;
                break;
            case "eliminar":
                $modelo->eliminar();
                break;
            case "insertar" || "modificar":
                if ($modelo->esGeneral()) {
                    $modelo->set_cedula_solicitante($_POST['cedula_solicitante']);
                } elseif ($modelo->esInstitucional()) {
                    $modelo->set_id_institucion($_POST['id_institucion']);
                }

                $modelo->set_id_gerencia($_POST['id_gerencia'] ?? null);
                $modelo->set_id_comunidad($_POST['id_comunidad']);
                $modelo->set_fecha($_POST['fecha']);
                $modelo->set_problematica($_POST['problematica']);

                if ($accion == "insertar") {
                    $id = $modelo->insertar();
                    $res["id"] = $id;
                } elseif ($accion == "modificar") {
                    $modelo->modificar();
                }

                break;
            default:
                throw new Exception("Acción no valida.");
        }

        echo json_encode($res);
    } catch (Exception $err) {
        $res["mensaje"] = $err->getMessage();

        echo json_encode($res);
        http_response_code(500);
    }
} else {
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
    $estados = $modelo->consultarEstados();

    // Cargar vista
    require_once "vista/solicitud.php";
}

?>