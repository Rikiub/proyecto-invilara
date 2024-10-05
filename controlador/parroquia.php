<?php

require_once "modelo/parroquia.php";
require_once "modelo/municipio.php";

$usuario = new Parroquia();
$municipio = new Municipio();

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    $usuario->set_id($_POST['id']);

    try {
        if ($accion == "eliminar") {
            $usuario->eliminar();
        } else {
            $usuario->set_id($_POST["id"]);
            $usuario->set_nombre($_POST["nombre"]);
            $usuario->set_id_municipio($_POST["id_municipio"]);

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

// Preparar datos a mostrar
$datos = $usuario->consultar();
$municipios = $municipio->consultar();

// Traducir datos transaccionales
foreach ($datos as $index => $valor) {
    $nombre = $municipio->obtenerUno($valor["id_municipio"])[0]["nombre"];
    $datos[$index]["nombre_municipio"] = $nombre;
}

// Cargar vista
require_once "vista/parroquia.php";

?>