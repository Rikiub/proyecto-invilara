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
            $user = $this->obtenerPorId();

            if ($user && $user["contrasena"] == $this->contrasena) {
                return true;
            }
        }

        return false;
    }

    public function insertar()
    {
        $this->validarIdNoExiste();

        $pdo = $this->conexion();
        $stmt = $pdo->prepare(
            "INSERT INTO {$this->tabla} (
                cedula,
                contrasena,
                rol
            )
            VALUES (?, ?, ?)"
        );
        $stmt->execute([$this->cedula, $this->contrasena, $this->rol]);

        return $this->cedula;
    }

    public function modificar()
    {
        $this->validarIdExiste();

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
        $this->validarIdExiste();

        $this->conexion()->query(
            "DELETE FROM
                {$this->tabla}
			WHERE
				cedula = '{$this->cedula}'
			"
        );
    }

    public function consultar()
    {
        $stmt = $this->conexion()->query("SELECT * FROM {$this->tabla}");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function obtenerPorId()
    {
        $stmt = $this->conexion()->prepare("SELECT * FROM {$this->tabla} WHERE cedula = ?");
        $stmt->execute([$this->cedula]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }

    private function validarIdExiste()
    {
        if (!$this->obtenerPorId()) {
            throw new Exception("La cedula {$this->cedula} no existe");
        }
    }

    private function validarIdNoExiste()
    {
        if ($this->obtenerPorId()) {
            throw new Exception("La cedula {$this->cedula} ya existe.");
        }
    }
}

?>