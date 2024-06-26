<?php

require_once "src/modelo/usuarios.php";

$modelo = new Usuarios();

$error = null;

if (isset($_POST["cedula"], $_POST["contraseña"])) {
    $cedula = $_POST["cedula"];
    $contraseña = $_POST["contraseña"];

    if ($modelo->obtenerUno($cedula)) {
        $error = "El usuario ya existe.";
    } elseif (!$contraseña) {
        $error = "Debe proporcionar una contraseña.";
    }

    if (!$error) {
        $modelo->insertar($cedula, $contraseña);

        header("Location: ?ruta=usuarios");
        exit;
    }
}

// Mostrar vista
require_once "src/vista/registro.php";
