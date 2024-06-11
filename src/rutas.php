<?php

require_once "src/router.php";

$router = new Router;

// Login y Registro
require_once "src/controlador/sesion.php";
$router->agregarRuta("/sesion/login", [Sesion::class, "login"]);
$router->agregarRuta("/sesion/registro", [Sesion::class, "registro"]);

// Panel de control
require_once "src/controlador/panel.php";
$router->agregarRuta("/panel", [Panel::class, "index"]);

# Pagina de Error
require_once "src/controlador/error.php";
$router->agregarRuta("/error", [Error404::class, "index"]);

// Pagina de inicio
$router->redirigir("/", "/sesion/login");