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

    function insertar()
    {
        if (!empty($this->buscarID($this->id))) {
            throw new Exception("Ya existe");
        }

        if (empty($this->buscarGerente($this->cedula_gerente))) {
            throw new Exception("El gerente con la cedula proporcionada no existe.");
        }

        $this->conexion()->query(
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
    }

    function modificar()
    {
        if (empty($this->buscarID($this->id))) {
            throw new Exception("No existe");
        }

        if (empty($this->buscarGerente($this->cedula_gerente))) {
            throw new Exception("El gerente con la cedula proporcionada no existe.");
        }

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

    function eliminar()
    {
        if (empty($this->buscarID($this->id))) {
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

    function buscarID($id)
    {
        $stmt = $this->conexion()->query("SELECT * FROM {$this->tabla} WHERE id='$id'");
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }

    function buscarGerente($cedula)
    {
        $stmt = $this->conexion()->query("SELECT * FROM {$this->tabla} WHERE cedula_gerente='$cedula'");
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }
}

?>