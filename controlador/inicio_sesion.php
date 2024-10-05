<?php

require_once "modelo/usuario.php";

$institucion = new Usuario();

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $institucion->set_cedula($_POST["cedula"]);
    $institucion->set_contrasena($_POST["contrasena"]);

    if ($institucion->iniciarSesion()) {
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