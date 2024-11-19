<?php

require_once "modelo/base_datos.php";

class Institucion extends BaseDatos
{
    private $tabla = "institucion";

    private $id;
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
    public function set_nombre($valor)
    {
        $this->nombre = ucwords(strtolower($valor));
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
        $this->validarNoDuplicado();

        $pdo = $this->conexion();
        $pdo->query(
            "INSERT INTO {$this->tabla} (
                cedula_director,
                nombre,
                correo,
                telefono,
                direccion
			)
			VALUES (
                '{$this->cedula_director}',
                '{$this->nombre}',
                '{$this->correo}',
                '{$this->telefono}',
                '{$this->direccion}'
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
                cedula_director = '{$this->cedula_director}',
                nombre = '{$this->nombre}',
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
        $stmt = $this->conexion()->query($this->getSqlConsulta() . "ORDER BY nombre ASC");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function obtenerPorId()
    {
        $stmt = $this->conexion()->prepare($this->getSqlConsulta() . "WHERE id = ?");
        $stmt->execute([$this->id]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }

    private function getSqlConsulta()
    {
        return "SELECT
                    {$this->tabla}.*,
                    director.nombre AS nombre_director
                FROM
                    {$this->tabla}
                LEFT JOIN
                    director ON {$this->tabla}.cedula_director = director.cedula
                ";
    }

    public function obtenerPorNombre()
    {
        $stmt = $this->conexion()->prepare("SELECT * FROM {$this->tabla} WHERE nombre = ?");
        $stmt->execute([$this->nombre]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila;
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