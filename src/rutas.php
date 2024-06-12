<?php

namespace Src;

use Src\Controlador;
use Src\Router;

$router = new Router;

// Login
$router->agregarRuta("/login", [Controlador\Login::class, "index"]);

// Registro
$router->agregarRuta("/registro", [Controlador\Registro::class, "index"]);

// Pagina de inicio
$router->redirigir("/", "/login");

// Panel de control
$router->agregarRuta("/panel/usuarios", [Controlador\UsuariosPanel::class, "index"]);

# Iniciar enrutador al importarse.
$router->despachar();