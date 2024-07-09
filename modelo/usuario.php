<?php

require_once "modelo/base_datos.php";

class Usuario extends BaseDatos
{
    private $tabla = "usuario";

    private $cedula;
    private $contrasena;

    // Setter
    public function set_cedula($valor)
    {
        $this->cedula = $valor;
    }
    public function set_contrasena($valor)
    {
        $this->contrasena = $valor;
    }

    public function iniciarSesion()
    {
        if ($this->cedula && $this->contrasena) {
            $user = $this->obtenerUno($this->cedula);

            if ($user && $user[0]["contrasena"] == $this->contrasena) {
                return true;
            }
        }

        return false;
    }

    public function insertar()
    {
        if (!empty($this->obtenerUno($this->cedula))) {
            throw new Exception("Ya existe");
        }

        $this->conexion()->query(
            "INSERT INTO {$this->tabla}
                (cedula, contrasena)
            VALUES
                ({$this->cedula}, {$this->contrasena})"
        );
    }

    public function modificar($cedula)
    {
        throw new Exception("'modificar' no ha sido implementado.");
    }

    public function eliminar($cedula)
    {
        if (empty($this->obtenerUno($this->cedula))) {
            throw new Exception("No existe");
        }

        $this->conexion()->query(
            "DELETE FROM {$this->tabla}
            WHERE
                cedula = '{$this->cedula}'"
        );
    }

    public function consultar()
    {
        $stmt = $this->conexion()->query(
            "SELECT * FROM {$this->tabla}"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerUno($cedula)
    {
        $stmt = $this->conexion()->query(
            "SELECT * FROM {$this->tabla}
            WHERE
                cedula = '{$this->cedula}'"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>