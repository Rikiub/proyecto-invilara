<?php

require_once "modelo/municipio.php";

$modelo = new Municipio();

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    try {
        if ($accion == "reporte") {
            $modelo->generarPDF();
        } elseif ($accion == "consultar") {
            $datos = $modelo->consultar();
            echo json_encode($datos);
            exit;
        } else {
            if ($accion == "eliminar") {
                $modelo->eliminar();
            }

            $modelo->set_id($_POST["id"]);
            $modelo->set_nombre($_POST["nombre"]);

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
require_once "vista/municipio.php";

?>