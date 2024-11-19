<?php

require_once "modelo/base_datos.php";

class Solicitante extends BaseDatos
{
	private $tabla = "solicitante";

	private $cedula;
	private $nombre;
	private $correo;
	private $telefono;
	private $direccion;

	// Getter
	public function set_cedula($valor)
	{
		$this->cedula = $valor;
	}
	public function set_nombre($valor)
	{
		$this->nombre = ucwords(strtolower($valor));
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

	// Setter
	public function get_cedula()
	{
		return $this->cedula;
	}
	public function get_nombre()
	{
		return $this->nombre;
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
				cedula,
				nombre,
				correo,
				telefono,
				direccion
			)
			VALUES (
				'{$this->cedula}',
				'{$this->nombre}',
				'{$this->correo}',
				'{$this->telefono}',
				'{$this->direccion}'
			)"
		);

		return $this->cedula;
	}

	public function modificar()
	{
		$this->validarIdExiste();

		$this->conexion()->query(
			"UPDATE {$this->tabla} SET 
				cedula = '{$this->cedula}',
				nombre = '{$this->nombre}',
				correo = '{$this->correo}',
				telefono = '{$this->telefono}',
				direccion = '{$this->direccion}'
			WHERE
				cedula = '{$this->cedula}'
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
				cedula = '{$this->cedula}'
			"
		);
	}

	public function consultar()
	{
		$stmt = $this->conexion()->query(
			"SELECT *
            FROM {$this->tabla}
            ORDER BY nombre ASC"
		);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function obtenerPorId()
	{
		$stmt = $this->conexion()->prepare("SELECT * FROM {$this->tabla} WHERE cedula = ?");
		$stmt->execute([$this->cedula]);

		$fila = $stmt->fetch(PDO::FETCH_ASSOC);
		return $fila;
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
			throw new Exception("ID {$this->cedula} no existe");
		}
	}

	private function validarIdNoExiste()
	{
		if ($this->obtenerPorId()) {
			throw new Exception("ID {$this->cedula} ya existe.");
		}
	}
}

?>