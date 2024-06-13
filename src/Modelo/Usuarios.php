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
        if ($usuario && $contraseña) {
            $user = $this->sqlObtenerFila("cedula", $usuario);

            if ($user && $contraseña == $user[0]["contraseña"]) {
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
        $this->sqlInsertar(["cedula" => $usuario, "contraseña" => $contraseña]);
    }

    public function actualizarUsuario(string $usuario_antiguo, string $usuario, string $contraseña)
    {
        throw new \Exception("'actualizar' no implementado.");
    }

    public function eliminarUsuario(string $usuario): bool
    {
        try {
            $this->sqlEliminar("cedula", $usuario);
            return true;
        } catch (\Exception) {
            return false;
        }
    }

    public function obtenerTodosUsuarios(): array
    {
        return $this->sqlConsultar();
    }

    public function obtenerUsuario($usuario): array
    {
        return $this->sqlObtenerFila("cedula", $usuario);
    }
}