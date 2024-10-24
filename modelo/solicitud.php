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
    private $id_parroquia;
    private $id_gerencia;
    private $fecha;
    private $estatus;
    private $remitente;
    private $observacion;
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
    public function set_id_parroquia($valor)
    {
        $this->id_parroquia = $valor;
    }
    public function set_id_gerencia($valor)
    {
        $this->id_gerencia = $valor;
    }
    public function set_fecha($valor)
    {
        $this->fecha = $valor;
    }
    public function set_estatus($valor)
    {
        $this->estatus = $valor;
    }
    public function set_remitente($valor)
    {
        $this->remitente = $valor;
    }
    public function set_observacion($valor)
    {
        $this->observacion = $valor;
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

    public function insertar()
    {
        if (!empty($this->obtenerDato($this->id))) {
            throw new Exception("El numero de control de esta solicitud ya existe");
        }

        $pdo = $this->conexion();

        $stmt = $pdo->prepare(
            "INSERT INTO `asignacion` (
                `id_gerencia`,
                `remitente`,
                `estatus`
            )
            VALUES (?, ?, ?)"
        );
        $stmt->execute([
            $this->id_gerencia,
            $this->remitente,
            $this->estatus
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
                `id_parroquia`,
                `fecha`,
                `observacion`,
                `problematica`,
                `tipo_solicitud`
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $this->id,
            $id_asignacion,
            $sql_valor,
            $this->id_comunidad,
            $this->id_parroquia,
            $this->fecha,
            $this->observacion,
            $this->problematica,
            $this->tipo_solicitud
        ]);
    }

    public function modificar()
    {
        $solicitud = $this->obtenerDato($this->id)[0];

        if (empty($solicitud)) {
            throw new Exception("La solicitud con el ID proporcionado no existe.");
        }

        // Actualizar asignacion
        $stmt = $this->conexion()->prepare(
            "UPDATE `asignacion` SET
                `id_gerencia` = ?,
                `remitente` = ?,
                `estatus` = ?
            WHERE
                id = ?"
        );
        $stmt->execute([
            $this->id_gerencia,
            $this->remitente,
            $this->estatus,

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
                `id_parroquia` = ?,
                `fecha` = ?,
                `observacion` = ?,
                `problematica` = ?,
                `tipo_solicitud` = ?
            WHERE
                id = ?"
        );

        $stmt->execute([
            $sql_valor,

            $this->id_comunidad,
            $this->id_parroquia,
            $this->fecha,
            $this->observacion,
            $this->problematica,
            $this->tipo_solicitud,

            $this->id,
        ]);
    }

    public function eliminar()
    {
        if (empty($this->obtenerDato($this->id))) {
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
        $stmt = $this->conexion()->query(
            "SELECT
                {$this->tabla}.*,
                asignacion.id_gerencia,
                asignacion.estatus,
                asignacion.remitente,
                comunidad.nombre AS nombre_comunidad,
                municipio.nombre AS nombre_municipio,
                parroquia.nombre AS nombre_parroquia,
                institucion.nombre AS nombre_institucion,
                gerencia.nombre AS nombre_gerencia
            FROM
                {$this->tabla}
            LEFT JOIN
                parroquia ON {$this->tabla}.id_parroquia = parroquia.id
            LEFT JOIN
                municipio ON parroquia.id_municipio = municipio.id
            LEFT JOIN
                comunidad ON {$this->tabla}.id_comunidad = comunidad.id
            LEFT JOIN
                institucion ON {$this->tabla}.id_institucion = institucion.id
            LEFT JOIN
                asignacion ON {$this->tabla}.id_asignacion = asignacion.id
            LEFT JOIN
                gerencia ON asignacion.id_gerencia = gerencia.id
            WHERE
                tipo_solicitud='{$this->tipo_solicitud}'"
        );
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
    }

    public function generarPDF()
    {
        $dompdf = new Dompdf();

        // Generar HTML
        $datos = $this->consultar();
        $tipo_solicitud = $this->tipo_solicitud;
        $reporte = true;

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

    public function obtenerDato($id)
    {
        $stmt = $this->conexion()->query("SELECT * FROM {$this->tabla} WHERE id='$id'");
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }

    public function obtenerAsignacion($id)
    {
        $stmt = $this->conexion()->query("SELECT * FROM 'asignacion' WHERE id='$id'");
        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
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
}

?>