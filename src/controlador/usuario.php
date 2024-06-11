<?php

require_once "src/controlador/controlador.php";

require_once "src/modelo/modelo.php";
require_once "src/modelo/usuario.php";

class Usuario extends Controlador
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        $modelo = new UsuarioModelo();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_GET["id"];
        }

        $this->render(
            "usuario",
            ["usuarios" => $modelo->obtenerUsuarios()]
        );
    }
}
