<?php

require_once "src/modelo/usuarios.php";

$modelo = new Usuarios();

$error = null;

if (isset($_GET["cerrar"])) {
    $modelo->cerrarSesison();

    /* Redirigir al mismo controlador, pero sin parametros GET. */
    $uri = $_SERVER["REQUEST_URI"];
    $uri = strtok($uri, "?");
    header("Location: " . $uri);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];
    $contraseña = $_POST["contraseña"];

    if ($modelo->iniciarSesion($cedula, $contraseña)) {
        require_once "src/controlador/usuarios.php";
        exit;
    } else {
        $error = "Cedula o contraseña invalida";
    }
}

// Mostrar vista
require_once "src/vista/inicio-sesion.php";
