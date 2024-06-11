<?php

require_once "src/controlador/base.php";

class Error404 extends Controlador
{
    public function index()
    {
        http_response_code(404);
        $this->render("/error");
    }
}