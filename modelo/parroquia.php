<?php

require_once "modelo/base_datos.php";

class Parroquia extends BaseDatos
{
    private $tabla = "parroquia";

    private $id;
    private $nombre;
    private $id_municipio;


    // Getter
    public function set_id($valor)
    {
        $this->id = $valor;
    }
    public function set_nombre($valor)
    {
        $this->nombre = ucwords(strtolower($valor));
    }
    public function set_id_municipio($valor)
    {
        $this->id_municipio = $valor;
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
    public function get_id_municipio()
    {
        return $this->id_municipio;
    }

    public function insertar()
    {
        $this->validarNoDuplicado();

        $pdo = $this->conexion();
        $pdo->query(
            "INSERT INTO {$this->tabla} (
                nombre,
                id_municipio
            )
            VALUES (
                '{$this->nombre}',
                '{$this->id_municipio}'
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
				id_municipio = '{$this->id_municipio}'
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
            $this->getSqlConsulta() . "ORDER BY municipio.nombre ASC"
        );
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
                    municipio.nombre AS nombre_municipio
                FROM
                    {$this->tabla}
                LEFT JOIN
                    municipio ON {$this->tabla}.id_municipio = municipio.id
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