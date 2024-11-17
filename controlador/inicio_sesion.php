<?php

require_once "modelo/usuario.php";

$modelo = new Usuario();

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST["cedula"];

    $modelo->set_cedula($cedula);
    $modelo->set_contrasena($_POST["contrasena"]);

    if ($modelo->iniciarSesion()) {
        session_start();

        $user = $modelo->obtenerUsuario();
        $_SESSION["rol"] = $user["rol"];

        header("Location: ?pagina=principal");
        exit;
    } else {
        $error = "Cedula o contraseña invalida";
    }
}

// Mostrar vista
require_once "vista/inicio_sesion.php";

?>