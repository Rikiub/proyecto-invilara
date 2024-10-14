<?php

require_once "modelo/base_datos.php";

class Comunidad extends BaseDatos
{
    private $tabla = "comunidad";

    private $id;
    private $nombre;
    private $direccion;
    private $tipo;


    // Setter
    public function set_id($valor)
    {
        $this->id = $valor;
    }
    public function set_nombre($valor)
    {
        $this->nombre = ucwords(strtolower($valor));
    }
    public function set_direccion($valor)
    {
        $this->direccion = $valor;
    }
    public function set_tipo($valor)
    {
        $this->tipo = $valor;
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

    public function insertar()
    {
        if (!empty($this->obtenerUno($this->nombre))) {
            throw new Exception("Ya existe");
        }

        $this->conexion()->query(
            "INSERT INTO {$this->tabla} (
				nombre,
				direccion,
				tipo
			)
			VALUES (
				'{$this->nombre}',
				'{$this->direccion}',
				'{$this->tipo}'
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
				direccion = '{$this->direccion}',
				tipo = '{$this->tipo}'
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
        $stmt = $this->conexion()->query("SELECT * FROM {$this->tabla}");
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
