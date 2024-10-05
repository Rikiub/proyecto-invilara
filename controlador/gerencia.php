<?php

require_once "modelo/gerencia.php";

$usuario = new Gerencia();

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    $usuario->set_id($_POST['id']);

    try {
        if ($accion == "eliminar") {
            $usuario->eliminar();
        } else {
            $usuario->set_id($_POST["id"]);
            $usuario->set_nombre($_POST["nombre"]);
            $usuario->set_cedula_gerente($_POST["cedula_gerente"]);
            $usuario->set_direccion($_POST["direccion"]);

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
require_once "vista/gerencia.php";

?>