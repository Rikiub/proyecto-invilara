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
        $consulta = $this->obtenerPorNombre($this->nombre);

        if ($consulta) {
            throw new Exception("Ya hay un dato con este nombre, por favor inserte otro nombre.");
        }

        $this->conexion()->query(
            "INSERT INTO {$this->tabla} (
                nombre,
                id_municipio
            )
            VALUES (
                '{$this->nombre}',
                '{$this->id_municipio}'
            )"
        );
    }

    public function modificar()
    {
        $consulta = $this->obtenerPorId($this->id);
        if (!$consulta) {
            throw new Exception("No existe");
        }

        $consulta = $this->obtenerPorNombre($this->nombre);
        if ($consulta) {
            throw new Exception("Ya hay un dato con este nombre.");
        }

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
        if (!$this->obtenerPorId($this->id)) {
            throw new Exception("No existe");
        }

        $this->conexion()->query(
            "DELETE FROM {$this->tabla}
			WHERE
				id = '{$this->id}'
			"
        );
    }

    public function consultar()
    {
        $stmt = $this->conexion()->query(
            "SELECT
                {$this->tabla}.*,
                municipio.nombre AS nombre_municipio
            FROM
                {$this->tabla}
            LEFT JOIN
                municipio ON {$this->tabla}.id_municipio = municipio.id
            ORDER BY municipio.nombre ASC"
        );
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function obtenerPorId($id)
    {
        $stmt = $this->conexion()->prepare(
            "SELECT *
            FROM
                {$this->tabla}
            WHERE id = ?"
        );
        $stmt->execute([$id]);

        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }

    public function obtenerPorNombre($nombre)
    {
        $stmt = $this->conexion()->prepare(
            "SELECT
                {$this->tabla}.*,
                municipio.nombre AS nombre_municipio
            FROM
                {$this->tabla}
            LEFT JOIN
                municipio ON {$this->tabla}.id_municipio = municipio.id
            WHERE {$this->tabla}.nombre = ?"
        );
        $stmt->execute([$nombre]);

        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }
}

?>