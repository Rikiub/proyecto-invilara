<?php

require_once "modelo/base_datos.php";

class Comunidad extends BaseDatos
{
    private $tabla = "comunidad";

    private $tipo;
    private $id;
    private $id_parroquia;
    private $nombre;
    private $correo;
    private $telefono;
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
    public function set_correo($valor)
    {
        $this->correo = $valor;
    }
    public function set_telefono($valor)
    {
        $this->telefono = $valor;
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
        $this->validarIdNoExiste();
        $this->validarNoDuplicado();

        $pdo = $this->conexion();
        $pdo->query(
            "INSERT INTO {$this->tabla} (
                tipo,
                id_parroquia,
				nombre,
				direccion,
                correo,
                telefono,
				representante,
                rif,
                ambito
			)
			VALUES (
				'{$this->tipo}',
                '{$this->id_parroquia}',
				'{$this->nombre}',
				'{$this->direccion}',
                '{$this->correo}',
                '{$this->telefono}',
                '{$this->representante}',
                '{$this->rif}',
                '{$this->ambito}'
			)"
        );
        $id = $pdo->lastInsertId();

        return $id;
    }

    public function modificar()
    {
        $this->validarIdExiste();
        $this->validarNoDuplicado();

        $this->conexion()->query(
            "UPDATE {$this->tabla} SET 
                id = '{$this->id}',
                id_parroquia = '{$this->id_parroquia}',
				tipo = '{$this->tipo}',
				nombre = '{$this->nombre}',
				direccion = '{$this->direccion}',
                correo = '{$this->correo}',
                telefono = '{$this->telefono}',
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

    public function obtenerPorNombre()
    {
        $stmt = $this->conexion()->prepare("SELECT * FROM {$this->tabla} WHERE nombre = ?");
        $stmt->execute([$this->nombre]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }

    public function obtenerPorId()
    {
        $stmt = $this->conexion()->prepare("SELECT * FROM {$this->tabla} WHERE id = ?");
        $stmt->execute([$this->id]);

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
