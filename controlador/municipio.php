<?php

require_once "modelo/municipio.php";

$modelo = new Municipio();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $accion = isset($_POST["accion"]) ? $_POST["accion"] : null;
        if (!$accion) {
            throw new Exception("Se necesita especificar una acción.");
        }

        $id = isset($_POST["id"]) ? $_POST["id"] : null;
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
                $modelo->set_nombre($_POST["nombre"]);

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
    $datos = $modelo->consultar();
    require_once "vista/municipio.php";
}

?>