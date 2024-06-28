<?php

// Este es el front-controller
// En vez de usar la variable $pagina, usamos la variable $ruta.

$pagina_inicio = "inicio-sesion";

// Cargara la "ruta" actual o volvera a la "pagina de inicio".
$controlador = $_GET["ruta"] ?? $pagina_inicio;
$controlador = "src/controlador/" . $controlador . ".php";

if (is_file($controlador)) {
    require_once $controlador;
} else {
    echo "Pagina no encontrada";
}
