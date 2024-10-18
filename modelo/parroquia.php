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
        if (!empty($this->obtenerUno($this->id))) {
            throw new Exception("Ya existe");
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
        if (empty($this->obtenerUno($this->id))) {
            throw new Exception("No existe");
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
        if (empty($this->obtenerUno($this->id))) {
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
                municipio ON {$this->tabla}.id_municipio = municipio.id"
        );
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function obtenerUno($id)
    {
        $stmt = $this->conexion()->query("SELECT * FROM {$this->tabla} WHERE id='$id'");
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }
}

?>