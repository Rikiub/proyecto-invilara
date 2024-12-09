<?php

require_once "modelo/comunidad.php";

$modelo = new Comunidad();

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
                $modelo->set_id_parroquia($_POST['id_parroquia']);
                $modelo->set_tipo($_POST['tipo']);
                $modelo->set_nombre($_POST['nombre']);
                $modelo->set_direccion($_POST['direccion']);
                $modelo->set_correo($_POST['correo']);
                $modelo->set_telefono($_POST['telefono']);
                $modelo->set_representante($_POST['representante']);
                $modelo->set_rif($_POST['tipo_rif'] . "-" . $_POST['rif']);
                $modelo->set_ambito($_POST['ambito']);

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

    $datos = $modelo->consultar();
    require_once "vista/comunidad.php";
}

?>