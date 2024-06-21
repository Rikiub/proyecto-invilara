<?php

require_once "src/Controlador/ControladorBase.php";
require_once "src/Modelo/Usuarios.php";

class Registro extends ControladorBase
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Usuarios();
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
                header("Location: /inicio-sesion");
                exit;
            }
        }

        $this->vista("/registro", ["titulo" => "Registro", "error" => $error]);
    }
}
