<?php

require_once "src/controlador/controlador.php";
require_once "src/modelo/usuario.php";

class Registro extends Controlador
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new UsuarioModelo();
    }

    public function index()
    {
        $error = null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cedula = $_POST["cedula"];
            $contraseña = $_POST["contraseña"];

            if ($this->modelo->obtenerUsuario($cedula)) {
                $error = "El usuario ya existe.";
            } elseif (!$contraseña) {
                $error = "Debe proporcionar una contraseña.";
            }

            if (!$error) {
                $this->modelo->insertarUsuario($cedula, $contraseña);
                header("Location: /login");
                exit;
            }
        }

        $this->render("/registro", ["error" => $error]);
    }
}
