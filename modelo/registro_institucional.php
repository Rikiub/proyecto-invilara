<?php

require_once "modelo/base_datos.php";

class Registro extends BaseDatos
{
	private $tabla = "solicitud_institucional";

	private $nro_control;
	private $nro_oficio;
	private $fecha;
	private $asunto;
	private $telefono;
	private $observacion;
	private $gerencia_referida;
	private $direccion_comunidad;
	private $instrucciones_presidencial;
	private $estatus;

	function set_nro_control($valor)
	{
		$this->nro_control = $valor;
	}

	function set_nro_oficio($valor)
	{
		$this->nro_oficio = $valor;
	}

	function set_fecha($valor)
	{
		$this->fecha = $valor;
	}

	function set_asunto($valor)
	{
		$this->asunto = $valor;
	}

	function set_telefono($valor)
	{
		$this->telefono = $valor;
	}

	function set_observacion($valor)
	{
		$this->observacion = intval($valor);
	}
	function set_gerencia_referida($valor)
	{
		$this->gerencia_referida = $valor;
	}
	function set_direccion_comunidad($valor)
	{
		$this->direccion_comunidad = $valor;
	}
	function set_instrucciones_presidenciales($valor)
	{
		$this->instrucciones_presidencial = $valor;
	}
	public function set_estatus($valor)
	{
		$this->estatus = $valor;
	}

	function get_nro_control()
	{
		return $this->nro_control;
	}

	function get_nro_oficio()
	{
		return $this->nro_oficio;
	}

	function get_fecha()
	{
		return $this->fecha;
	}

	function get_asunto()
	{
		return $this->asunto;
	}

	function get_telefono()
	{
		return $this->telefono;
	}

	function get_observacion()
	{
		return $this->observacion;
	}
	function get_gerencia_referida()
	{
		return $this->gerencia_referida;
	}
	function get_direccion_comunidad()
	{
		return $this->direccion_comunidad;
	}
	function get_instrucciones_presidencial()
	{
		return $this->instrucciones_presidencial;
	}

	function insertar()
	{
		$r = array();
		if (!$this->existe($this->nro_control)) {
			$co = $this->conexion();

			try {
				$co->query("INSERT INTO {$this->tabla} (
						nro_control,
						nro_oficio,
						fecha,
						asunto,
						telefono,
						observacion,
						gerencia_referida,
						direccion_comunidad,
						instrucciones_presidencial
						estatus,
						)
						VALUES (
						'$this->nro_control',
						'$this->nro_oficio',
						'$this->fecha',
						'$this->asunto',
						'$this->telefono',
                        '$this->observacion',
						'$this->gerencia_referida',
						'$this->direccion_comunidad',
						'$this->instrucciones_presidencial',
						{$this->estatus}
						)");
				$r['resultado'] = 'incluir';
				$r['mensaje'] = 'Registro Inluido';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] = $e->getMessage();
			}
		} else {
			$r['resultado'] = 'incluir';
			$r['mensaje'] = 'Ya existe el numero de control';
		}
		return $r;
	}

	function modificar()
	{
		$co = $this->conexion();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->nro_control)) {
			try {
				$co->query("UPDATE {$this->tabla} SET 
					    nro_control = '$this->nro_control',
						nro_oficio = '$this->nro_oficio',
						fecha = '$this->fecha',
						asunto = '$this->asunto',
						telefono = '$this->telefono',
						observacion = '$this->observacion',
						gerencia_referida = '$this->gerencia_referida',
						direccion_comunidad = '$this->direccion_comunidad',
						instrucciones_presidenciales = '$this->instrucciones_presidencial',
						where
						nro_control = '$this->nro_control'
						");
				$r['resultado'] = 'modificar';
				$r['mensaje'] = 'Registro Modificado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] = $e->getMessage();
			}
		} else {
			$r['resultado'] = 'modificar';
			$r['mensaje'] = 'solicitud no registrada';
		}
		return $r;
	}

	function eliminar()
	{
		$co = $this->conexion();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->nro_control)) {
			try {
				$co->query("delete from {$this->tabla} 
						where
						nro_control = '$this->nro_control'
						");
				$r['resultado'] = 'eliminar';
				$r['mensaje'] = 'Registro Eliminado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] = $e->getMessage();
			}
		} else {
			$r['resultado'] = 'eliminar';
			$r['mensaje'] = 'No existe la solicitud';
		}
		return $r;
	}


	function consultar()
	{
		$co = $this->conexion();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {

			$resultado = $co->query("SELECT * FROM {$this->tabla}");

			if ($resultado) {

				$respuesta = '';
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . "<button type='button'
							class='btn btn-primary w-100 small-width mb-3' 
							onclick='pone(this,0)'
						    >Modificar</button><br/>";
					$respuesta = $respuesta . "<button type='button'
							class='btn btn-primary w-100 small-width mt-2' 
							onclick='pone(this,1)'
						    >Eliminar</button><br/>";
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['nro_control'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['nro_oficio'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['fecha'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['asunto'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['telefono'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['observacion'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['gerencia_referida'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['direccion_comunidad'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['instrucciones_presidenciales'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";


				}

				$r['resultado'] = 'consultar';
				$r['mensaje'] = $respuesta;
			} else {
				$r['resultado'] = 'consultar';
				$r['mensaje'] = '';
			}

		} catch (Exception $e) {
			$r['resultado'] = 'error';
			$r['mensaje'] = $e->getMessage();
		}
		return $r;
	}


	private function existe($nro_control)
	{
		$co = $this->conexion();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("Select * from {$this->tabla} where nro_control='$nro_control'");


			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if ($fila) {

				return true;

			} else {

				return false;
				;
			}

		} catch (Exception $e) {
			return false;
		}
	}
}
?>