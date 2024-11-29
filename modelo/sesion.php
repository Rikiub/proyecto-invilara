<?php

class Sesion
{
    public function obtenerRol()
    {
        $this->iniciar();

        if (isset($_SESSION['rol'])) {
            $rol = $_SESSION['rol'];
        } else {
            $rol = "";
        }

        return $rol;
    }

    public function iniciar()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    function destruir()
    {
        $this->iniciar();
        session_destroy();
    }
}

?>