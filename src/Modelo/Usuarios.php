<?php

namespace Src\Modelo;

class Usuarios extends ModeloBase
{
    public function __construct()
    {
        parent::__construct("usuario");
    }

    private function validarUsuario(string $usuario, string $contraseña): bool
    {
        if (!empty($usuario) && !empty($contraseña)) {
            $user = $this->obtenerFila("cedula", $usuario);

            if (!empty($user) && password_verify($contraseña, $user[0]["contraseña"])) {
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
        if ($this->sesionIniciada()) {
            session_destroy();
        }
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