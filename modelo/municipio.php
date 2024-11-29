<?php

require_once "modelo/base_datos.php";

class Municipio extends BaseDatos
{
    private $tabla = "municipio";

    private $id;
    private $nombre;

    // Getter
    public function set_id($valor)
    {
        $this->id = $valor;
    }
    public function set_nombre($valor)
    {
        $this->nombre = ucwords(strtolower($valor));
    }

    // Setter
    public function get_id()
    {
        return $this->id;
    }
    public function get_nombre()
    {
        return $this->nombre;
    }

    public function insertar()
    {
        $this->validarNoDuplicado();

        $pdo = $this->conexion();
        $pdo->query(
            "INSERT INTO {$this->tabla} (
				nombre
			)
			VALUES (
				'{$this->nombre}'
			)"
        );
        $id = $pdo->lastInsertId();

        return $id;
    }

    public function modificar()
    {
        $this->validarIdExiste();

        $this->conexion()->query(
            "UPDATE {$this->tabla} SET 
				id = '{$this->id}',
				nombre = '{$this->nombre}'
			WHERE
				id = '{$this->id}'
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
				id = '{$this->id}'
			"
        );
    }

    public function consultar()
    {
        $stmt = $this->conexion()->query(
            "SELECT *
            FROM {$this->tabla}
            ORDER BY nombre ASC"
        );
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function obtenerPorId()
    {
        $stmt = $this->conexion()->prepare("SELECT * FROM {$this->tabla} WHERE id = ?");
        $stmt->execute([$this->id]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }

    public function obtenerPorNombre()
    {
        $stmt = $this->conexion()->prepare("SELECT * FROM {$this->tabla} WHERE nombre = ?");
        $stmt->execute([$this->nombre]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }

    private function validarNoDuplicado()
    {
        if ($this->obtenerPorNombre()) {
            throw new Exception("Ya existe un dato con este nombre.");
        }
    }

    private function validarIdExiste()
    {
        if (!$this->obtenerPorId()) {
            throw new Exception("ID {$this->id} no existe");
        }
    }

    private function validarIdNoExiste()
    {
        if ($this->obtenerPorId()) {
            throw new Exception("ID {$this->id} ya existe.");
        }
    }
}

?>