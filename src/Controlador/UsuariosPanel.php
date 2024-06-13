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
        if (isset($_GET["id"], $_GET["accion"])) {
            // Manejar solicitudes GET y devolver respuesta AJAX.

            $id = $_GET["id"];
            $accion = $_GET["accion"];

            switch ($accion) {
                case "modificar":
                    echo "'Modificar' necesita implementarse.";
                    break;
                case "eliminar":
                    if ($this->modelo->eliminarUsuario($id)) {
                        http_response_code(200);
                        echo "Usuario $id eliminado con éxito";
                    } else {
                        http_response_code(400);
                        echo "Usuario $id no encontrado";
                    }
                    break;
            }
        } else {
            // Renderizar vista.

            $this->render(
                "usuario",
                ["titulo" => "Usuarios", "usuarios" => $this->modelo->obtenerTodosUsuarios()]
            );
        }
    }
}
