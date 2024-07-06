<?php

require_once "modelo/base_datos.php";

class Comunidad extends BaseDatos
{
    private $tabla = "comunidad";


    private $nombre;
    private $direccion;
    private $tipo;


    // Setter

    public function set_nombre($valor)
    {
        $this->nombre = $valor;
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
        if (empty($this->obtenerUno($this->nombre))) {
            throw new Exception("No existe");
        }

        $this->conexion()->query(
            "UPDATE {$this->tabla} SET 
				nombre = '{$this->nombre}',
				direccion = '{$this->direccion}',
				tipo = '{$this->tipo}'
		
			WHERE
				nombre = '{$this->nombre}'
			"
        );
    }

    public function eliminar()
    {
        if (empty($this->obtenerUno($this->nombre))) {
            throw new Exception("No existe");
        }

        $this->conexion()->query(
            "DELETE FROM {$this->tabla}
			WHERE
				nombre = '{$this->nombre}'
			"
        );
    }

    public function consultar()
    {
        $result = $this->conexion()->query("SELECT * FROM {$this->tabla}");
        return $result;
    }

    public function obtenerUno($nombre)
    {
        $stmt = $this->conexion()->query("SELECT * FROM {$this->tabla} WHERE nombre='$nombre'");
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }
}
