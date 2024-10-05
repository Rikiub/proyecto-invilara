<?php

require_once "modelo/comunidad.php";

$institucion = new Comunidad();

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    $institucion->set_id($_POST['id']);

    try {
        if ($accion == "eliminar") {
            $institucion->eliminar();
        } else {
            $institucion->set_nombre($_POST['nombre']);
            $institucion->set_direccion($_POST['direccion']);
            $institucion->set_tipo($_POST['tipo']);

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
require_once "vista/comunidad.php";
