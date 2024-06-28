<?php

require_once "src/modelo/usuarios.php";

$modelo = new Usuarios();

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];
    $contraseña = $_POST["contraseña"];

    if ($modelo->iniciarSesion($cedula, $contraseña)) {
        header("Location: ?ruta=usuarios");
        exit;
    } else {
        $error = "Cedula o contraseña invalida";
    }
}

// Mostrar vista
require_once "src/vista/inicio-sesion.php";
