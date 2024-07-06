<?php

require_once "modelo/comunidad.php";

$modelo = new comunidad();

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    $modelo->set_nombre($_POST['nombre']);
    $modelo->set_direccion($_POST['direccion']);
    $modelo->set_tipo($_POST['tipo']);

    try {
        if ($accion == "eliminar") {
            $modelo->eliminar();
        } else {
            $modelo->set_nombre($_POST['nombre']);
            $modelo->set_direccion($_POST['direccion']);
            $modelo->set_tipo($_POST['tipo']);


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
require_once "vista/comunidad.php";
