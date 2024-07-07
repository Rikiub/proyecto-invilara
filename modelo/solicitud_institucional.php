<?php

require_once "modelo/base_datos.php";

class Registro extends BaseDatos
{
	private $tabla = "solicitud_institucional";

	private $nro_control;
	private $nro_oficio;
	private $id_institucion;
	private $id_comunidad;
	private $id_gerencia;
	private $fecha;
	private $problematica;
	private $instrucciones;
	private $observacion;
	private $estatus;


	// Getter
	public function set_nro_control($valor)
	{
		$this->nro_control = $valor;
	}
	public function set_nro_oficio($valor)
	{
		$this->nro_oficio = $valor;
	}
	public function set_id_institucion($valor)
	{
		$this->id_institucion = $valor;
	}
	public function set_id_comunidad($valor)
	{
		$this->id_comunidad = $valor;
	}
	public function set_id_gerencia($valor)
	{
		$this->id_gerencia = $valor;
	}
	public function set_fecha($valor)
	{
		$this->fecha = $valor;
	}
	public function set_problematica($valor)
	{
		$this->problematica = $valor;
	}
	public function set_instrucciones($valor)
	{
		$this->instrucciones = $valor;
	}
	public function set_observacion($valor)
	{
		$this->id_observacion = $valor;
	}
	public function set_estatus($valor)
	{
		$this->estatus = $valor;
	}



	// Setter
	public function get_nro_control()
	{
		return $this->nro_control;
	}
	public function get_nro_oficio()
	{
		return $this->nro_oficio;
	}
	public function get_id_institucion()
	{
		return $this->id_institucion;
	}
	public function get_id_comunidad()
	{
		return $this->id_comunidad;
	}
	public function get_id_gerencia()
	{
		return $this->id_gerencia;
	}
	public function get_fecha()
	{
		return $this->fecha;
	}
	public function get_problematica()
	{
		return $this->problematica;
	}
	public function get_instrucciones()
	{
		return $this->instrucciones;
	}
	public function get_observacion()
	{
		return $this->observacion;
	}
	public function get_estatus()
	{
		return $this->estatus;
	}



	public function insertar()
	{
		if (!empty($this->obtenerUno($this->nro_control))) {
			throw new Exception("Ya existe");
		}

		$this->conexion()->query(
			"INSERT INTO {$this->tabla} (
				nro_control,
				nro_oficio,
				id_institucion,
				id_comunidad,
                id_gerencia,
				fecha,
				problematica,
				instrucciones,
				observacion,
				estatus
			)
			VALUES (
				'{$this->nro_control}',
				'{$this->nro_oficio}',
				'{$this->id_institucion}',
				'{$this->id_comunidad}',
				'{$this->id_gerencia}',
				'{$this->fecha}',
				'{$this->problematica}',
				'{$this->instrucciones}',
				'{$this->observacion}',
				'{$this->estatus}'
			)"
		);
	}

	public function modificar()
	{
		if (empty($this->obtenerUno($this->nro_control))) {
			throw new Exception("No existe");
		}

		$this->conexion()->query(
			"UPDATE {$this->tabla} SET 
				nro_control = '{$this->nro_control}',
				nro_oficio = '{$this->nro_oficio}',
				id_institucion = '{$this->id_institucion}',
				id_comunidad = '{$this->id_comunidad}',
				id_gerencia = '{$this->id_gerencia}',
				fecha = '{$this->fecha}',
				problematica = '{$this->problematica}',
				instrucciones = '{$this->instrucciones}',
				observacion = '{$this->observacion}',
				estatus = '{$this->estatus}'
		
			WHERE
				nro_control = '{$this->nro_control}'
			"
		);

	}

	public function eliminar()
	{
		if (empty($this->obtenerUno($this->nro_control))) {
			throw new Exception("No existe");
		}

		$this->conexion()->query(
			"DELETE FROM {$this->tabla}
			WHERE
				nro_control = '{$this->nro_control}'
			"
		);
	}

	public function consultar()
	{
		$result = $this->conexion()->query("SELECT * FROM {$this->tabla}");
		return $result;
	}

	public function obtenerUno($nro_control)
	{
		$stmt = $this->conexion()->query("SELECT * FROM {$this->tabla} WHERE nro_control='$nro_control'");
		$fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $fila;
	}
}

?>