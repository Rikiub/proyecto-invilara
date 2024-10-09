<?php

/* Pagina */
$pagina = "principal";

if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}


/* Sesion */
require_once "modelo/sesion.php";
$sesion = new Sesion();

$rol = $sesion->obtenerRol();

if ($pagina == "salir") {
    $sesion->destruir();
    header("Location: .");
}


/* Front controller */
$controlador = "controlador/" . $pagina . ".php";

if (is_file($controlador)) {
    require_once $controlador;
} else {
    // Redireccionar a pagina de error.
    require_once "vista/404.php";
}

?>