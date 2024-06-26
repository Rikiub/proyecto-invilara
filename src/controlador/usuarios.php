<?php

require_once "src/modelo/usuarios.php";

$modelo = new Usuarios();

if (isset($_POST["id"], $_POST["accion"])) {
    // Manejar solicitudes GET y devolver respuesta AJAX.

    $id = $_POST["id"];
    $accion = $_POST["accion"];

    switch ($accion) {
        case "modificar":
            // echo "'Modificar' necesita implementarse.";
            break;
        case "eliminar":
            if ($modelo->eliminar($id)) {
                // echo "Usuario $id eliminado con éxito";
            } else {
                // echo "Usuario $id no encontrado";
            }
            break;
    }
}

// Mostrar vista
$usuarios = $modelo->obtenerTodos();
require_once "src/vista/usuarios.php";

