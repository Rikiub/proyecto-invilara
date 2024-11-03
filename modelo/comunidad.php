<?php

require_once "modelo/base_datos.php";

class Comunidad extends BaseDatos
{
    private $tabla = "comunidad";

    private $tipo;
    private $id;
    private $id_parroquia;
    private $nombre;
    private $direccion;
    private $representante;
    private $rif;
    private $ambito;

    // Setter
    public function set_tipo($valor)
    {
        $this->tipo = $valor;
    }
    public function set_id($valor)
    {
        $this->id = $valor;
    }
    public function set_id_parroquia($valor)
    {
        $this->id_parroquia = $valor;
    }
    public function set_nombre($valor)
    {
        $this->nombre = ucwords(strtolower($valor));
    }
    public function set_direccion($valor)
    {
        $this->direccion = $valor;
    }
    public function set_representante($valor)
    {
        $this->representante = $valor;
    }
    public function set_rif($valor)
    {
        $this->rif = $valor;
    }
    public function set_ambito($valor)
    {
        $this->ambito = $valor;
    }

    // Getter
    public function get_id()
    {
        return $this->id;
    }
    public function get_nombre()
    {
        return $this->nombre;
    }
    public function get_direccion()
    {
        return $this->direccion;
    }
    public function get_tipo()
    {
        return $this->tipo;
    }
    public function get_representante()
    {
        return $this->representante;
    }
    public function get_rif()
    {
        return $this->rif;
    }
    public function get_ambito()
    {
        return $this->ambito;
    }

    public function insertar()
    {
        if (!empty($this->obtenerUno($this->nombre))) {
            throw new Exception("Ya existe");
        }

        $this->conexion()->query(
            "INSERT INTO {$this->tabla} (
                tipo,
                id_parroquia,
				nombre,
				direccion,
				representante,
                rif,
                ambito
			)
			VALUES (
				'{$this->tipo}',
                '{$this->id_parroquia}',
				'{$this->nombre}',
				'{$this->direccion}',
                '{$this->representante}',
                '{$this->rif}',
                '{$this->ambito}'
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
                id_parroquia = '{$this->id_parroquia}',
				tipo = '{$this->tipo}',
				nombre = '{$this->nombre}',
				direccion = '{$this->direccion}',
                representante = '{$this->representante}',
                rif = '{$this->rif}',
                ambito = '{$this->ambito}'
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
                parroquia.nombre AS nombre_parroquia
            FROM
                {$this->tabla}
            LEFT JOIN
                parroquia ON {$this->tabla}.id_parroquia = parroquia.id"
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
