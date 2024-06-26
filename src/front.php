<?php

// Este es el fron-controller

$controlador = $_GET["ruta"] ?? "inicio-sesion";
$controlador = "src/controlador/" . $controlador . ".php";

if (is_file($controlador)) {
    require_once $controlador;
} else {
    echo "Pagina no encontrada";
}
