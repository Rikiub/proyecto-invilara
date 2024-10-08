<?php

require_once "modelo/base_datos.php";

class Institucion extends BaseDatos
{
    private $tabla = "institucion";

    private $id;
    private $id_parroquia;
    private $nombre;
    private $cedula_director;
    private $correo;
    private $telefono;
    private $direccion;

    // Setter
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
        $this->nombre = $valor;
    }
    public function set_cedula_director($valor)
    {
        $this->cedula_director = $valor;
    }
    public function set_correo($valor)
    {
        $this->correo = $valor;
    }
    public function set_telefono($valor)
    {
        $this->telefono = $valor;
    }
    public function set_direccion($valor)
    {
        $this->direccion = $valor;
    }

    // Getter
    public function get_id()
    {
        return $this->id;
    }
    public function get_id_parroquia()
    {
        return $this->id_parroquia;
    }
    public function get_nombre()
    {
        return $this->nombre;
    }
    public function get_cedula_director()
    {
        return $this->cedula_director;
    }
    public function get_correo()
    {
        return $this->correo;
    }
    public function get_telefono()
    {
        return $this->telefono;
    }
    public function get_direccion()
    {
        return $this->direccion;
    }

    public function insertar()
    {
        if (!empty($this->obtenerUno($this->id))) {
            throw new Exception("Ya existe.");
        }

        if (empty($this->obtenerDirector($this->cedula_director))) {
            throw new Exception("El director con la cedula seleccionada no existe.");
        }

        $this->conexion()->query(
            "INSERT INTO {$this->tabla} (
                id_parroquia,
                nombre,
                cedula_director,
                correo,
                telefono,
                direccion
			)
			VALUES (
                '{$this->id_parroquia}',
                '{$this->nombre}',
                '{$this->cedula_director}',
                '{$this->correo}',
                '{$this->telefono}',
                '{$this->direccion}'
			)"
        );
    }

    public function modificar()
    {
        if (empty($this->obtenerUno($this->id))) {
            throw new Exception("No existe");
        }

        if (empty($this->obtenerDirector($this->cedula_director))) {
            throw new Exception("El director con la cedula seleccionada no existe.");
        }

        $this->conexion()->query(
            "UPDATE {$this->tabla} SET 
				id = '{$this->id}',
                id_parroquia = '{$this->id_parroquia}',
                nombre = '{$this->nombre}',
                cedula_director = '{$this->cedula_director}',
                correo = '{$this->correo}',
                telefono = '{$this->telefono}',
                direccion = '{$this->direccion}'
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

    public function obtenerDirector($cedula)
    {
        $stmt = $this->conexion()->query("SELECT * FROM {$this->tabla} WHERE cedula_director='$cedula'");
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }
}

?>