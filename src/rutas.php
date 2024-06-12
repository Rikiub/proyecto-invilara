<?php

require_once "src/router.php";

$router = new Router;

// Login y Registro
require_once "src/controlador/login.php";
require_once "src/controlador/registro.php";
$router->agregarRuta("/login", [Login::class, "index"]);
$router->agregarRuta("/registro", [Registro::class, "index"]);

// Panel de control
require_once "src/controlador/usuario.php";
$router->agregarRuta("/panel/usuarios", [Usuario::class, "index"]);

// Pagina de inicio
$router->redirigir("/", "/login");