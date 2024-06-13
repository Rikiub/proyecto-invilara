<?php

namespace Src;

use Src\Controlador;
use Src\Router;

$router = new Router;

// Pagina de inicio
$router->agregarRuta("/", Controlador\InicioSesion::class, "index");

// Inicio de sesion
$router->agregarRuta("/inicio-sesion", Controlador\InicioSesion::class, "index");

// Registro
$router->agregarRuta("/registro", Controlador\Registro::class, "index");

// Panel de control
$router->agregarRuta("/panel/usuarios", Controlador\UsuariosPanel::class, "index");

# Iniciar router al usar `require`.
$router->despachar();