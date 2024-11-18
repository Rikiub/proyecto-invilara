<?php

require_once "modelo/parroquia.php";

$modelo = new Parroquia();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $accion = $_POST["accion"] ?? null;
        if (!$accion) {
            throw new Exception("Se necesita especificar una acción.");
        }

        $id = $_POST["id"] ?? null;
        $modelo->set_id($id);

        $municipio = $_POST["id_municipio"] ?? null;
        $modelo->set_id_municipio($municipio);

        $res["mensaje"] = "Exito";

        switch ($accion) {
            case "consultar":
                if ($id) {
                    $datos = $modelo->obtenerPorId();
                } elseif ($municipio) {
                    $datos = $modelo->consultarPorMunicipio();
                } else {
                    $datos = $modelo->consultar();
                }

                $res = $datos;
                break;
            case "eliminar":
                $modelo->eliminar();
                break;
            case "insertar" || "modificar":
                $modelo->set_id($_POST["id"]);
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
    require_once "modelo/municipio.php";
    $m = new Municipio();
    $municipios = $m->consultar();

    // Preparar datos a mostrar
    $datos = $modelo->consultar();

    // Cargar vista
    require_once "vista/parroquia.php";
}

?>