<?php

require_once "modelo/usuario.php";

$modelo = new Usuario();

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    try {
        $modelo->set_cedula(isset($_POST["id"]) ? $_POST["id"] : $_POST["cedula"]);

        if ($accion == "eliminar") {
            $modelo->eliminar();
        } else {
            $modelo->set_contrasena($_POST["contrasena"]);
            $modelo->set_rol($_POST["rol"]);

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
require_once "vista/usuario.php";

?>