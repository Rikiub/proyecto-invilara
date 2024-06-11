<?php

require_once "src/controlador/controlador.php";
require_once "src/modelo/usuario.php";

class Sesion extends Controlador
{
    private $session;

    public function __construct()
    {
        session_start();
    }

    public function login()
    {
        if ($this->estaLogeado()) {
            header("Location: /panel/usuarios");
        }

        $modelo = new UsuarioModelo();
        $error = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST["cedula"];
            $contraseña = $_POST["contraseña"];

            if (!$modelo->usuarioExiste($usuario)) {
                $error = "Cedula invñalida";
            } elseif (!$modelo->contraseñaValida($contraseña)) {
                $error = "Contraseña invalida";
            }

            if (!$error) {
                $this->guardarSesion($usuario);
                header("Location: /panel/usuarios");
            }
        }

        $this->render("/sesion/login", ["error" => $error ?? null]);
    }

    public function registro()
    {
        $modelo = new UsuarioModelo();
        $error = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cedula = $_POST["cedula"];
            $contraseña = $_POST["contraseña"];

            if ($modelo->usuarioExiste($cedula)) {
                $error = "El usuario ya existe.";
            } elseif (!$contraseña) {
                $error = "Debe proporcionar una contraseña.";
            }

            if (!$error) {
                $modelo->insertarUsuario($cedula, $contraseña);
                $this->guardarSesion($cedula);
                $this->login();
            }
        }

        $this->render("/sesion/registro", ["error" => $error]);
    }

    public function cerrarSesion()
    {
        session_destroy();
        $this->login();
    }

    private function estaLogeado(): bool
    {
        return isset($_SESSION["usuario"]);
    }

    private function guardarSesion($usuario)
    {
        $_SESSION["usuario"] = $usuario;
    }
}
