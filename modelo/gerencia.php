<?php

require_once "modelo/base_datos.php";

class Gerente extends BaseDatos
{
    private $tabla = "gerencia";

    private $id;
    private $nombre;
    private $nombre_gerente;
    private $direccion;


    // coloco
    function set_id($valor)
    {
        $this->id = $valor;
    }
    function set_nombre($valor)
    {
        $this->nombre = $valor;
    }
    function set_nombre_gerente($valor)
    {
        $this->nombre_gerente = $valor;
    }
    function set_direccion($valor)
    {
        $this->direccion = $valor;
    }


    // leeo
    function get_id()
    {
        return $this->id;
    }
    function get_nombre()
    {
        return $this->nombre;
    }
    function get_nombre_gerente()
    {
        return $this->nombre_gerente;
    }
    function get_direccion()
    {
        return $this->direccion;
    }

    function insertar()
    {
        if (!empty($this->conectamos($this->id))) {
            throw new Exception("Ya existe");
        }

        $this->conexion()->query(
            "INSERT INTO {$this->tabla} (
				nombre,
				nombre_gerente,
                direccion
			)
			VALUES (
				'{$this->nombre}',
				'{$this->nombre_gerente}',
                '{$this->direccion}'
			)"
        );
    }

    function modificar()
    {
        if (empty($this->conectamos($this->id))) {
            throw new Exception("No existe");
        }

        $this->conexion()->query(
            "UPDATE {$this->tabla} SET 
				id = '{$this->id}',
				nombre = '{$this->nombre}',
				nombre_gerente = '{$this->nombre_gerente}',
                direccion = '{$this->direccion}'
			WHERE
				id = '{$this->id}'
			"
        );

    }

    function eliminar()
    {
        if (empty($this->conectamos($this->id))) {
            throw new Exception("No existe");
        }

        $this->conexion()->query(
            "DELETE FROM {$this->tabla}
			WHERE
				id = '{$this->id}'
			"
        );
    }

    function consultar()
    {
        $result = $this->conexion()->query("SELECT * FROM {$this->tabla}");
        return $result;
    }

    function conectamos($id)
    {
        $stmt = $this->conexion()->query("SELECT * FROM {$this->tabla} WHERE id='$id'");
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }
}

?>