<?php

require_once "src/modelo/usuarios.php";

$modelo = new Usuarios();

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];
    $contraseña = $_POST["contraseña"];

    if ($modelo->obtenerUsuario($cedula)) {
        $error = "El usuario ya existe.";
    } elseif (!$contraseña) {
        $error = "Debe proporcionar una contraseña.";
    }

    if (!$error) {
        $modelo->insertarUsuario($cedula, $contraseña);

        require_once "src/controlador/usuarios.php";
        exit;
    }
}

// Mostrar vista
require_once "src/vista/registro.php";
