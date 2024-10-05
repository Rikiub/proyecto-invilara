<?php

require_once "modelo/municipio.php";

$usuario = new Municipio();

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    $usuario->set_id($_POST['id']);

    try {
        if ($accion == "eliminar") {
            $usuario->eliminar();
        } else {
            $usuario->set_id($_POST["id"]);
            $usuario->set_nombre($_POST["nombre"]);

            if ($accion == "insertar") {
                $usuario->insertar();
            } elseif ($accion == "modificar") {
                $usuario->modificar();
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

$datos = $usuario->consultar();
require_once "vista/municipio.php";

?>