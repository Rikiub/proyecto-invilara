<?php

if (!isset($_GET["pagina"])) {
    // Si no hay "pagina", volver a la pagina principal.
    $pagina = "inicio_sesion";
} else {
    $pagina = $_GET["pagina"];
}

$controlador = "controlador/" . $pagina . ".php";

if (is_file($controlador)) {
    require_once $controlador;
} else {
    echo "Pagina no encontrada";
}

?>