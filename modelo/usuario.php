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
            $user = $this->obtenerUsuario();

            if ($user && $user["contrasena"] == $this->contrasena) {
                return true;
            }
        }

        return false;
    }

    public function insertar()
    {
        if ($this->obtenerUsuario()) {
            throw new Exception("Ya existe");
        }

        $this->conexion()->query(
            "INSERT INTO {$this->tabla}
                (cedula, contrasena)
            VALUES
                ({$this->cedula}, {$this->contrasena})"
        );
    }

    public function modificar()
    {
        throw new Exception("'modificar' no ha sido implementado.");
    }

    public function eliminar()
    {
        if (!$this->obtenerUsuario()) {
            throw new Exception("No existe");
        }

        $this->conexion()->query(
            "DELETE FROM
                {$this->tabla}
            WHERE
                cedula = '{$this->cedula}'"
        );
    }

    public function consultar()
    {
        $stmt = $this->conexion()->query(
            "SELECT *
            FROM {$this->tabla}"
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerUsuario()
    {
        $stmt = $this->conexion()->query(
            "SELECT *
            FROM
                {$this->tabla}
            WHERE
                cedula = '{$this->cedula}'"
        );

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>