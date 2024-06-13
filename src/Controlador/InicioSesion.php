<?php

namespace Src\Controlador;

use Src\Modelo\Usuarios;

class InicioSesion extends ControladorBase
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
        $error = null;

        if (isset($_GET["cerrar"])) {
            $this->modelo->cerrarSesison();

            // Redireccionar a la misma URL, pero sin parametros.
            header("Location: " . parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
            exit;
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cedula = $_POST["cedula"];
            $contraseña = $_POST["contraseña"];

            if ($this->modelo->iniciarSesion($cedula, $contraseña)) {
                header("Location: /panel/usuarios");
                exit;
            } else {
                $error = "Cedula o contraseña invalida";
            }
        }

        $this->render("/inicio-sesion", ["titulo" => "Inicio de sesion", "error" => $error]);
    }
}
