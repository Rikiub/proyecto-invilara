<?php

require_once "modelo/gerencia.php";

$modelo = new Gerencia();

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    $modelo->set_id($_POST['id']);

    try {
        if ($accion == "eliminar") {
            $modelo->eliminar();
        } else {
            $modelo->set_id($_POST["id"]);
            $modelo->set_nombre($_POST["nombre"]);
            $modelo->set_cedula_gerente($_POST["cedula_gerente"]);
            $modelo->set_direccion($_POST["direccion"]);

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

require_once "modelo/gerente.php";
$m = new Gerente();

$gerentes = $m->consultar();

$datos = $modelo->consultar();
require_once "vista/gerencia.php";

?>