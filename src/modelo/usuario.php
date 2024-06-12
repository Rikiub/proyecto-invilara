<?php

require_once "src/modelo/modelo.php";

class UsuarioModelo extends Modelo
{
    public function __construct()
    {
        parent::__construct("usuario");
    }

    private function validarUsuario(string $usuario, string $contraseña): bool
    {
        if (!empty($usuario) && !empty($contraseña)) {
            $usuario = $this->obtenerFila("cedula", $usuario);

            if (password_verify($contraseña, $usuario[0]["contraseña"])) {
                return true;
            }
        }

        return false;
    }

    public function iniciarSesion(string $usuario, string $contraseña): bool
    {
        if ($this->validarUsuario($usuario, $contraseña)) {
            session_start();
            $_SESSION["usuario"] = $usuario;
            return true;
        } else {
            return false;
        }
    }

    public function cerrarSesison(): void
    {
        session_destroy();
    }

    public function sesionIniciada(): bool
    {
        return isset($_SESSION["usuario"]);
    }

    public function insertarUsuario(string $usuario, string $contraseña)
    {
        $contraseña = password_hash($contraseña, PASSWORD_DEFAULT);
        $this->insertar(["cedula" => $usuario, "contraseña" => $contraseña]);
    }

    public function eliminarUsuario(string $usuario): bool
    {
        return $this->eliminar("cedula", $usuario);
    }

    public function obtenerTodosUsuarios(): array
    {
        return $this->consultar();
    }

    public function obtenerUsuario($usuario): array
    {
        return $this->obtenerFila("cedula", $usuario);
    }
}