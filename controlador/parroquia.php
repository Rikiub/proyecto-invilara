<?php

require_once "modelo/parroquia.php";

$modelo = new parroquia();

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    $modelo->set_id($_POST['id']);

    try {
        if ($accion == "eliminar") {
            $modelo->eliminar();
        } else {
            $modelo->set_id($_POST["id"]);
            $modelo->set_nombre($_POST["nombre"]);
            $modelo->set_nombre_municipio($_POST["nombre_municipio"]);


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
require_once "vista/parroquia.php";

?>