<?php

require_once "modelo/base_datos.php";

class Gerente extends BaseDatos
{
    private $tabla = "gerencia";

    private $id;
    private $nombre;
    private $nombre_gerente;


    // Getter
    public function set_id($valor)
    {
        $this->id = $valor;
    }
    public function set_nombre($valor)
    {
        $this->nombre = $valor;
    }
    public function set_nombre_gerente($valor)
    {
        $this->nombre_gerente = $valor;
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
    public function get_nombre_gerente()
    {
        return $this->nombre_gerente;
    }


    public function insertar()
    {
        if (!empty($this->obtenerUno($this->id))) {
            throw new Exception("Ya existe");
        }

        $this->conexion()->query(
            "INSERT INTO {$this->tabla} (
				id,
				nombre,
				nombre_gerente
				
			)
			VALUES (
				'{$this->id}',
				'{$this->nombre}',
				'{$this->nombre_gerente}'
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
				nombre_gerente = '{$this->nombre_gerente}'
		
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
        $result = $this->conexion()->query("SELECT * FROM {$this->tabla}");
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