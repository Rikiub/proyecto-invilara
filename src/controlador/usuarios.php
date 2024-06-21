<?php

require_once "src/modelo/usuarios.php";

$modelo = new Usuarios();

if (isset($_GET["id"], $_GET["accion"])) {
    // Manejar solicitudes GET y devolver respuesta AJAX.

    $id = $_GET["id"];
    $accion = $_GET["accion"];

    switch ($accion) {
        case "modificar":
            echo "'Modificar' necesita implementarse.";
            break;
        case "eliminar":
            if ($modelo->eliminarUsuario($id)) {
                http_response_code(200);
                echo "Usuario $id eliminado con éxito";
            } else {
                http_response_code(400);
                echo "Usuario $id no encontrado";
            }
            break;
    }
} else {
    // Mostrar vista
    $usuarios = $modelo->obtenerTodosUsuarios();
    require_once "src/vista/usuarios.php";
}
