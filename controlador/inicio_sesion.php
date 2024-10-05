<?php

require_once "modelo/usuario.php";

$usuario = new Usuario();

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario->set_cedula($_POST["cedula"]);
    $usuario->set_contrasena($_POST["contrasena"]);

    if ($usuario->iniciarSesion()) {
        header("Location: ?pagina=principal");
        exit;
    } else {
        $error = "Cedula o contraseña invalida";
    }
}

// Mostrar vista
$barra_simple = true;
require_once "vista/inicio_sesion.php";

?>