<?php

namespace Src\Controlador;

use Src\Modelo\Usuarios;

class Login extends ControladorBase
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Usuarios();
    }

    /**
     * Si recibe un parametro "cerrar" en la URL, cerrara la sesión.
     * 
     * De lo contrario, cargara la vista y validara los inicios de sesion. La vista final es el panel de control.
     */
    public function index()
    {
        if ($_GET["cerrar"] ?? null) {
            $this->modelo->cerrarSesison();
            header("Location: /login");
        } else {
            $error = null;

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $cedula = $_POST["cedula"];
                $contraseña = $_POST["contraseña"];

                if ($this->modelo->iniciarSesion($cedula, $contraseña)) {
                    header("Location: /panel/usuarios");
                    exit;
                } else {
                    $error = "Cedula o contraseña invalida";
                }
            }

            $this->render("/login", ["error" => $error]);
        }
    }
}