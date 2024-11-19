<?php

require_once "modelo/base_datos.php";

class Gerencia extends BaseDatos
{
    private $tabla = "gerencia";

    private $id;
    private $cedula_gerente;
    private $nombre;
    private $direccion;

    // Setter
    function set_id($valor)
    {
        $this->id = $valor;
    }
    function set_nombre($valor)
    {
        $this->nombre = ucwords(strtolower($valor));
    }
    function set_cedula_gerente($valor)
    {
        $this->cedula_gerente = $valor;
    }
    function set_direccion($valor)
    {
        $this->direccion = $valor;
    }

    // Getter
    function get_id()
    {
        return $this->id;
    }
    function get_nombre()
    {
        return $this->nombre;
    }
    function get_cedula_gerente()
    {
        return $this->cedula_gerente;
    }
    function get_direccion()
    {
        return $this->direccion;
    }

    public function insertar()
    {
        $this->validarNoDuplicado();

        $pdo = $this->conexion();
        $pdo->query(
            "INSERT INTO {$this->tabla} (
				nombre,
				cedula_gerente,
                direccion
			)
			VALUES (
				'{$this->nombre}',
				'{$this->cedula_gerente}',
                '{$this->direccion}'
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
				nombre = '{$this->nombre}',
				cedula_gerente = '{$this->cedula_gerente}',
                direccion = '{$this->direccion}'
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
        $stmt = $this->conexion()->query($this->getSqlConsulta());
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function obtenerPorNombre()
    {
        $stmt = $this->conexion()->prepare($this->getSqlConsulta() . "WHERE {$this->tabla}.nombre = ?");
        $stmt->execute([$this->nombre]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }

    public function obtenerPorId()
    {
        $stmt = $this->conexion()->prepare($this->getSqlConsulta() . "WHERE {$this->tabla}.id = ?");
        $stmt->execute([$this->id]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }

    private function getSqlConsulta()
    {
        return "SELECT
                    {$this->tabla}.*,
                    gerente.nombre AS nombre_gerente
                FROM
                    {$this->tabla}
                LEFT JOIN
                    gerente ON {$this->tabla}.cedula_gerente = gerente.cedula
                ";
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