<?php

require_once "modelo/base_datos.php";

require_once "librerias/dompdf/autoload.inc.php";
use Dompdf\Dompdf;

class Solicitud extends BaseDatos
{
    private $tabla = "solicitud";

    private $id;
    private $cedula_solicitante;
    private $id_institucion;
    private $id_comunidad;
    private $id_gerencia;
    private $fecha;
    private $estado;
    private $id_institucion_remitente;
    private $problematica;
    private $tipo_solicitud;

    // Setter
    public function set_id($valor)
    {
        $this->id = $valor;
    }
    public function set_cedula_solicitante($valor)
    {
        $this->cedula_solicitante = $valor;
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
    public function set_estado($valor)
    {
        $this->estado = $valor;
    }
    public function set_id_institucion_remitente($valor)
    {
        $this->id_institucion_remitente = $valor;
    }
    public function set_problematica($valor)
    {
        $this->problematica = $valor;
    }
    public function set_tipo_solicitud($valor)
    {
        $this->tipo_solicitud = $valor;
    }

    // Getter
    public function get_id()
    {
        return $this->id;
    }
    public function get_cedula_solicitante()
    {
        return $this->cedula_solicitante;
    }
    public function get_id_institucion()
    {
        return $this->id_institucion;
    }
    public function get_id_comunidad()
    {
        return $this->id_comunidad;
    }
    public function get_estado()
    {
        return $this->estado;
    }

    public function insertar()
    {
        $pdo = $this->conexion();

        $stmt = $pdo->prepare(
            "INSERT INTO `asignacion` (
                `id_gerencia`,
                `id_estado`
            )
            VALUES (?, ?)"
        );
        $stmt->execute([
            $this->id_gerencia,
            $this->estado
        ]);
        $id_asignacion = $pdo->lastInsertId();

        // Cambiar la columna y el valor según el tipo de solicitud.
        if ($this->esGeneral()) {
            $sql_columna = "cedula_solicitante";
            $sql_valor = $this->cedula_solicitante;
        } else if ($this->esInstitucional()) {
            $sql_columna = "id_institucion";
            $sql_valor = $this->id_institucion;
        }

        $stmt = $pdo->prepare(
            "INSERT INTO `{$this->tabla}` (
                `id`,
                `id_asignacion`,
                `{$sql_columna}`,
                `id_comunidad`,
                `fecha`,
                `problematica`,
                `tipo_solicitud`
            ) VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $this->id,
            $id_asignacion,
            $sql_valor,
            $this->id_comunidad,
            $this->fecha,
            $this->problematica,
            $this->tipo_solicitud
        ]);

        $id = $pdo->lastInsertId();
        return $id;
    }

    public function modificar()
    {
        $this->validarIdExiste();

        // Actualizar asignacion
        $solicitud = $this->obtenerPorId();

        $stmt = $this->conexion()->prepare(
            "UPDATE `asignacion` SET
                `id_gerencia` = ?,
                `id_estado` = ?
            WHERE
                id = ?"
        );
        $stmt->execute([
            $this->id_gerencia,
            $this->id_institucion_remitente,
            $this->estado,

            $solicitud["id_asignacion"],
        ]);

        // Actualizar solicitud

        // Cambiar la columna y el valor según el tipo de solicitud.
        if ($this->esGeneral()) {
            $sql_columna = "cedula_solicitante";
            $sql_valor = $this->cedula_solicitante;
        } else if ($this->esInstitucional()) {
            $sql_columna = "id_institucion";
            $sql_valor = $this->id_institucion;
        }

        $stmt = $this->conexion()->prepare(
            "UPDATE `{$this->tabla}` SET
                `{$sql_columna}` = ?,
                `id_comunidad` = ?,
                `fecha` = ?,
                `problematica` = ?,
                `tipo_solicitud` = ?
            WHERE
                id = ?"
        );

        $stmt->execute([
            $sql_valor,

            $this->id_comunidad,
            $this->fecha,
            $this->problematica,
            $this->tipo_solicitud,

            $this->id,
        ]);
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

    public function consultar_estados()
    {
        $stmt = $this->conexion()->query(
            "SELECT
                *
            FROM
                tipo_estado"
        );
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function consultar()
    {
        $filtro = "";
        switch ($this->estado) {
            case "1":
                $filtro = "AND id_estado='1'";
                break;
            case "2":
                $filtro = "AND id_estado='1' OR id_estado='2'";
                break;
            case "3":
                $filtro = "AND id_estado='2'";
                break;
        }

        $query = $this->getSqlConsulta() . $filtro . " ORDER BY id_estado DESC";

        $stmt = $this->conexion()->query($query);
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function generarPDF()
    {
        $dompdf = new Dompdf();
        $reporte = true;

        // Generar HTML
        $datos = $this->consultar();
        $tipo_solicitud = $this->tipo_solicitud;
        $tipo_vista = "programado";

        ob_start();
        require_once "vista/componentes/encabezado_dompdf.php";
        require_once "vista/componentes/tabla_solicitud.php";
        $html = ob_get_clean();

        // Generar PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper("A4", "landscape");
        $dompdf->render();
        $dompdf->stream("reporte_invilara.pdf", array("Attachment" => 0));
    }

    public function obtenerPorId()
    {
        $stmt = $this->conexion()->prepare($this->getSqlConsulta() . "WHERE {$this->tabla}.id = ?");
        $stmt->execute([$this->id]);

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }

    private function getSqlConsulta()
    {
        return "SELECT
                    {$this->tabla}.*,
                    asignacion.id_gerencia,
                    tipo_estado.id AS id_estado,
                    tipo_estado.nombre AS nombre_estado,
                    comunidad.nombre AS nombre_comunidad,
                    municipio.nombre AS nombre_municipio,
                    parroquia.nombre AS nombre_parroquia,
                    institucion.nombre AS nombre_institucion,
                    gerencia.nombre AS nombre_gerencia
                FROM
                    {$this->tabla}
                LEFT JOIN
                    comunidad ON {$this->tabla}.id_comunidad = comunidad.id
                LEFT JOIN
                    parroquia ON comunidad.id_parroquia = parroquia.id
                LEFT JOIN
                    municipio ON parroquia.id_municipio = municipio.id
                LEFT JOIN
                    asignacion ON {$this->tabla}.id_asignacion = asignacion.id
                LEFT JOIN
                    tipo_estado ON asignacion.id_estado = tipo_estado.id
                LEFT JOIN
                    institucion ON {$this->tabla}.id_institucion = institucion.id
                LEFT JOIN
                    gerencia ON asignacion.id_gerencia = gerencia.id
                WHERE
                    tipo_solicitud='{$this->tipo_solicitud}'
                ";
    }

    /* Ayudantes para verificar el tipo de solicitud. */
    public function esGeneral()
    {
        // 1: General  ||  2: 1x10
        if ($this->tipo_solicitud == 1 || $this->tipo_solicitud == 2) {
            return true;
        } else {
            return false;
        }
    }

    public function esInstitucional()
    {
        // 3: Institucional
        if ($this->tipo_solicitud == 3) {
            return true;
        } else {
            return false;
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