<?php

require_once "src/Router.php";

$router = new Router;

// Inicio de sesion
require_once "src/Controlador/InicioSesion.php";
$router->agregarRuta("/inicio-sesion", InicioSesion::class, "index");

// Registro
require_once "src/Controlador/Registro.php";
$router->agregarRuta("/registro", Registro::class, "index");

// Panel de usuarios
require_once "src/Controlador/UsuariosPanel.php";
$router->agregarRuta("/panel/usuarios", UsuariosPanel::class, "index");

// Pagina de inicio
$router->agregarRuta("/", InicioSesion::class, "index");