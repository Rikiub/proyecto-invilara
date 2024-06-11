<?php

require_once "src/modelo/modelo.php";

class UsuarioModelo extends Modelo
{
    public function __construct()
    {
        parent::__construct("usuario");
    }

    public function usuarioExiste(string $cedula): bool
    {
        return $this->filaExiste("cedula", $cedula);
    }

    public function contraseñaValida(string $contraseña): bool
    {
        return $this->filaExiste("contraseña", $contraseña);
    }

    public function insertarUsuario(string $cedula, string $contraseña)
    {
        $this->insertar(["cedula" => $cedula, "contraseña" => $contraseña]);
    }

    public function obtenerUsuarios(): array
    {
        return $this->consultar();
    }
}