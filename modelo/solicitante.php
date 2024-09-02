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
		$this->nombre = $valor;
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
		if (!empty($this->obtenerUno($this->cedula))) {
			throw new Exception("El solicitante con la cedula proporcionada ya existe.");
		}

		$this->conexion()->query(
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
	}

	public function modificar()
	{
		if (empty($this->obtenerUno($this->cedula))) {
			throw new Exception("El solicitante con la cedula proporcionada no existe.");
		}

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
		if (empty($this->obtenerUno($this->cedula))) {
			throw new Exception("No existe");
		}

		$this->conexion()->query(
			"DELETE FROM {$this->tabla}
			WHERE
				cedula = '{$this->cedula}'
			"
		);
	}

	public function consultar()
	{
		$result = $this->conexion()->query("SELECT * FROM {$this->tabla}");
		return $result;
	}

	public function obtenerUno($cedula)
	{
		$stmt = $this->conexion()->query("SELECT * FROM {$this->tabla} WHERE cedula='$cedula'");
		$fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $fila;
	}
}

?>