<?php

require_once "modelo/base_datos.php";

class Usuario extends BaseDatos
{
    private $tabla = "usuario";

    public function iniciarSesion($cedula, $contraseña)
    {
        if ($cedula && $contraseña) {
            $user = $this->obtenerUno($cedula);

            if ($user && $user[0]["contraseña"] == $contraseña) {
                return true;
            }
        }

        return false;
    }

    public function insertar($cedula, $contraseña)
    {
        $sql = "INSERT INTO {$this->tabla} (cedula, contraseña) VALUES (:cedula, :contrasena)";
        $stmt = $this->conexion()->prepare($sql);

        // No usen caracteres especiales para los `bindParam`, como la Ñ, dara error de codificación.
        $stmt->bindParam(":cedula", $cedula, PDO::PARAM_INT);
        $stmt->bindParam(":contrasena", $contraseña);

        return $stmt->execute();
    }

    public function actualizar($cedula_antiguo, $cedula, $contraseña)
    {
        throw new Exception("'actualizar' no ha sido implementado.");
    }

    public function eliminar($cedula)
    {
        $sql = "DELETE FROM {$this->tabla} WHERE cedula = ?";
        $stmt = $this->conexion()->prepare($sql);

        try {
            $stmt->execute([$cedula]);
            return true;
        } catch (Exception) {
            return false;
        }
    }

    public function consultar()
    {
        $sql = "SELECT * FROM {$this->tabla}";
        $stmt = $this->conexion()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerUno($cedula)
    {
        $sql = "SELECT * FROM {$this->tabla} WHERE cedula = ?";

        $stmt = $this->conexion()->prepare($sql);
        $stmt->execute([$cedula]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>