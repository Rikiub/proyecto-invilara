<?php

require_once "modelo/base_datos.php";

class Institucional extends BaseDatos
{
	//el primer paso dentro de la clase
	//sera declarar los atributos (variables) que describen la clase
	//para nostros no es mas que colcoar los inputs (controles) de
	//la vista como variables aca
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcoarlo privado es usando la palabra private

	private $control; //recuerden que en php, las variables no tienen tipo predefinido
	private $fecha;
	private $nrooficio;
	private $asunto;
	private $telefono;
	private $observacion;
	private $gerencia;
	private $direccion;
	private $instrucciones;

	function set_control($valor)
	{
		$this->control = $valor; //fijencen como se accede a los elementos dentro de una clase
		//this que singnifica esto es decir esta clase luego -> simbolo que indica que apunte
		//a un elemento de this, es decir esta clase
		//luego el nombre del elemento sin el $
	}
	//lo mismo que se hizo para cedula se hace para usuario y clave

	function set_fecha($valor)
	{
		$this->fecha = $valor;
	}

	function set_nrooficio($valor)
	{
		$this->nrooficio = $valor;
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
		$this->observacion = $valor;
	}
	function set_gerencia($valor)
	{
		$this->gerencia = $valor;
	}
	function set_direccion($valor)
	{
		$this->direccion = $valor;
	}
	function set_instrucciones($valor)
	{
		$this->instrucciones = $valor;
	}

	//ahora la misma cosa pero para leer, es decir get

	function get_control()
	{
		return $this->control;
	}

	function get_fecha()
	{
		return $this->fecha;
	}

	function get_nrooficio()
	{
		return $this->nrooficio;
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
	function get_gerencia()
	{
		return $this->telefono;
	}
	function get_direccion()
	{
		return $this->direccion;
	}
	function get_instrucciones()
	{
		return $this->telefono;
	}

	//Lo siguiente que demos hacer es crear los metodos para incluir, consultar y eliminar

	function incluir()
	{
		//Ok ya tenemos la base de datos y la funcion conecta dentro de la clase
		//datos, ahora debemos ejecutar las operaciones para realizar las consultas 

		//Lo primero que debemos hacer es consultar por el campo clave
		//en este caso la cedula, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		$r = array();
		if (!$this->existe($this->control)) {
			//si estamos aca es porque la cedula no existe es decir se puede incluir
			//los pasos a seguir son
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2 Se ejecuta el sql
			try {
				$co->query("Insert into solicitud_institucional(
						nro_control,
						fecha_solicitud,
						nro_oficio,
						asunto,
						telefono,
						observacion,
						gerencia_referida,
						direccion_comunidad,
						isntrucciones_presidenciales
						)
						Values(
						'$this->control',
						'$this->fecha',
						'$this->nrooficio',
						'$this->asunto',
						'$this->telefono',
                        '$this->observacion',
						'$this->gerencia',
						'$this->direccion',
						'$this->instrucciones'
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
		//Listo eso es todo y es igual para el resto de las operaciones
		//incluir, modificar y eliminar
		//solo cambia para buscar 
	}

	function modificar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->cedula)) {
			try {
				$co->query("Update solicitante set 
					    cedula = '$this->cedula',
						nombre = '$this->nombre',
						correo = '$this->correo',
						telefono = '$this->telefono',
						direccion = '$this->direccion'
						where
						cedula = '$this->cedula'
						");
				$r['resultado'] = 'modificar';
				$r['mensaje'] = 'Registro Modificado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] = $e->getMessage();
			}
		} else {
			$r['resultado'] = 'modificar';
			$r['mensaje'] = 'Cedula no registrada';
		}
		return $r;
	}

	function eliminar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->control)) {
			try {
				$co->query("delete from solicitud_institucional 
						where
						cedula = '$this->control'
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
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {

			$resultado = $co->query("Select * from solicitante");

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
					$respuesta = $respuesta . $r['cedula'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['nombre'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['correo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['telefono'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['direccion'];
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


	private function existe($control)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("Select * from solicitud_institucional where nro_control='$control'");


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



	function obtienefecha()
	{
		$r = array();

		$f = date('Y-m-d');
		$f1 = strtotime('-18 year', strtotime($f));
		$f1 = date('Y-m-d', $f1);
		$r['resultado'] = 'obtienefecha';
		$r['mensaje'] = $f1;

		return $r;
	}




}
?>