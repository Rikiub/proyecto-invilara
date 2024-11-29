<?php

require_once "modelo/usuario.php";

$modelo = new Usuario();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $accion = $_POST["accion"] ?? null;
        if (!$accion) {
            throw new Exception("Se necesita especificar una acción.");
        }

        $id = $_POST["id"] ?? $_POST["cedula"] ?? null;
        $modelo->set_cedula($id);

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
                $modelo->set_contrasena($_POST["contrasena"]);
                $modelo->set_rol($_POST["rol"]);

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
    require_once "vista/usuario.php";
}

?>