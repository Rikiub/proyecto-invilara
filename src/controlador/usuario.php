<?php

require_once "src/controlador/controlador.php";

require_once "src/modelo/modelo.php";
require_once "src/modelo/usuario.php";

class Usuario extends Controlador
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new UsuarioModelo();
        session_start();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
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
