<?php

require_once "modelo/base_datos.php";

class Usuario extends BaseDatos
{
    private $tabla = "usuario";

    private $cedula;
    private $contrasena;
    private $rol;

    // Setter
    public function set_cedula($valor)
    {
        $this->cedula = $valor;
    }
    public function set_contrasena($valor)
    {
        $this->contrasena = $valor;
    }
    public function set_rol($valor)
    {
        $this->rol = $valor;
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
        if ($this->obtenerUsuario($this->cedula)) {
            throw new Exception("Ya existe");
        }

        $stmt = $this->conexion()->prepare(
            "INSERT INTO {$this->tabla} (
                cedula,
                contrasena,
                rol
            )
            VALUES (?, ?, ?)"
        );
        $stmt->execute([$this->cedula, $this->contrasena, $this->rol]);
    }

    public function modificar()
    {
        if (!$this->obtenerUsuario($this->cedula)) {
            throw new Exception("El solicitante con la cedula proporcionada no existe.");
        }

        $this->conexion()->query(
            "UPDATE {$this->tabla} SET 
				cedula = '{$this->cedula}',
				contrasena = '{$this->contrasena}',
                rol = '{$this->rol}'
			WHERE
				cedula = '{$this->cedula}'
			"
        );
    }

    public function eliminar()
    {
        if (!$this->obtenerUsuario($this->cedula)) {
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
        $stmt = $this->conexion()->query("SELECT * FROM {$this->tabla} WHERE cedula='{$this->cedula}'");
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }
}

?>