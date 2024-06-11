<?php

require_once "src/controlador/base.php";

class Sesion extends Controlador
{
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            header("Location: /panel");
        }
        $this->render("/sesion/login");
    }

    public function registro()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            header("Location: /panel");
        }
        $this->render("/sesion/registro");
    }
}
