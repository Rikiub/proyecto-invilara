<?php

namespace Src\Controlador;

use Src\Modelo\Usuarios;

class UsuariosPanel extends ControladorBase
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new Usuarios();
        session_start();
    }

    public function index()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $accion = $_GET["accion"];

            switch ($accion) {
                case "modificar":
                    echo "'Modificar' necesita implementarse.";
                    break;
                case "eliminar":
                    $this->modelo->eliminarUsuario($id);
                    break;
            }
        }

        $this->render(
            "usuario",
            ["usuarios" => $this->modelo->obtenerTodosUsuarios()]
        );
    }
}
