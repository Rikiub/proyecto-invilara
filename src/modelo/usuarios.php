<?php

require_once "src/modelo/modelo-base.php";

class Usuarios extends ModeloBase
{
    private $tabla = "usuario";

    public function iniciarSesion(string $cedula, string $contraseña): bool
    {
        if ($cedula && $contraseña) {
            $user = $this->obtenerUno($cedula);

            if ($user && $user[0]["contraseña"] == $contraseña) {
                return true;
            }
        }

        return false;
    }

    public function insertar(string|int $cedula, string $contraseña): bool
    {
        $sql = "INSERT INTO {$this->tabla} (cedula, contraseña) VALUES (:cedula, :contrasena)";
        $stmt = $this->pdo->prepare($sql);

        // No usen caracteres especiales para los `bindParam` como la Ñ, dara error de codificación.
        $stmt->bindParam(":cedula", $cedula, PDO::PARAM_INT);
        $stmt->bindParam(":contrasena", $contraseña);

        return $stmt->execute();
    }

    public function actualizar(string $cedula_antiguo, string $cedula, string $contraseña): bool
    {
        throw new \Exception("'actualizar' no ha sido implementado.");
    }

    public function eliminar(string $cedula): bool
    {
        $sql = "DELETE FROM {$this->tabla} WHERE cedula = ?";
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute([$cedula]);
            return true;
        } catch (\Exception) {
            return false;
        }
    }

    public function obtenerTodos(): array
    {
        $sql = "SELECT * FROM {$this->tabla}";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function obtenerUno($cedula): array
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE cedula = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$cedula]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}