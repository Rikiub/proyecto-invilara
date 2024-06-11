<?php

require_once "src/controlador/base.php";

require_once "src/modelo/basedatos.php";
require_once "src/modelo/usuario.php";

class Panel extends Controlador
{
    public function index()
    {
        $usuarios = $this->obtenerUsuarios();
        $this->render("panel");
    }

    private function obtenerUsuarios(): array
    {
        $sql = new DatosSQL("usuario");
        $datos = [];

        foreach ($sql->consultar() as $d) {
            $user = new Usuario(
                $d["cedula"],
                $d["contraseña"]
            );
            array_push($datos, $user);
        }

        return $datos;
    }
}
