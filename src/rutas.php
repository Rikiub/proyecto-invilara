<?php

require_once "src/router.php";

$router = new Router;

// Login y Registro
require_once "src/controlador/sesion.php";
$router->agregarRuta("/sesion/login", [Sesion::class, "login"]);
$router->agregarRuta("/sesion/registro", [Sesion::class, "registro"]);
$router->agregarRuta("/sesion/cerrar", [Sesion::class, "cerrarSesion"]);

// Panel de control
require_once "src/controlador/usuario.php";
$router->agregarRuta("/panel/usuarios", [Usuario::class, "index"]);

// Pagina de inicio
$router->redirigir("/", "/sesion/login");