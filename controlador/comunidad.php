<?php

require_once "modelo/comunidad.php";

$modelo = new Comunidad();

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    $modelo->set_id($_POST['id']);

    try {
        if ($accion == "eliminar") {
            $modelo->eliminar();
        } else {
            $modelo->set_id_parroquia($_POST['id_parroquia']);
            $modelo->set_tipo($_POST['tipo']);
            $modelo->set_nombre($_POST['nombre']);
            $modelo->set_direccion($_POST['direccion']);
            $modelo->set_representante($_POST['representante']);
            $modelo->set_rif($_POST['tipo_rif'] . "-" . $_POST['rif']);
            $modelo->set_ambito($_POST['ambito']);

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

require_once "modelo/parroquia.php";
$m = new Parroquia();

$parroquias = $m->consultar();

$datos = $modelo->consultar();
require_once "vista/comunidad.php";

?>