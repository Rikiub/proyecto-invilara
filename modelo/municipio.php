<?php

require_once "modelo/base_datos.php";

require_once "librerias/dompdf/autoload.inc.php";
use Dompdf\Dompdf;

class Municipio extends BaseDatos
{
    private $tabla = "municipio";

    private $id;
    private $nombre;

    // Getter
    public function set_id($valor)
    {
        $this->id = $valor;
    }
    public function set_nombre($valor)
    {
        $this->nombre = ucwords(strtolower($valor));
    }

    // Setter
    public function get_id()
    {
        return $this->id;
    }
    public function get_nombre()
    {
        return $this->nombre;
    }

    public function insertar()
    {
        if ($this->obtenerPorId($this->id)) {
            throw new Exception("Ya existe");
        }

        if ($this->obtenerPorNombre($this->nombre)) {
            throw new Exception("Ya existe un dato con este nombre.");
        }

        $this->conexion()->query(
            "INSERT INTO {$this->tabla} (
				nombre
			)
			VALUES (
				'{$this->nombre}'
			)"
        );
    }

    public function modificar()
    {
        if (!$this->obtenerPorId($this->id)) {
            throw new Exception("Ya existe");
        }

        if ($this->obtenerPorNombre($this->nombre)) {
            throw new Exception("Ya existe un dato con este nombre.");
        }

        $this->conexion()->query(
            "UPDATE {$this->tabla} SET 
				id = '{$this->id}',
				nombre = '{$this->nombre}'
		
			WHERE
				id = '{$this->id}'
			"
        );
    }

    public function eliminar()
    {
        if (empty($this->obtenerPorId($this->id))) {
            throw new Exception("No existe");
        }

        $this->conexion()->query(
            "DELETE FROM {$this->tabla}
			WHERE
				id = '{$this->id}'
			"
        );
    }

    public function generarPDF()
    {
        $dompdf = new Dompdf();

        // Generar HTML
        $datos = $this->consultar();

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

    public function consultar()
    {
        $stmt = $this->conexion()->query("SELECT * FROM {$this->tabla} ORDER BY nombre ASC");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function obtenerPorNombre($nombre)
    {
        $stmt = $this->conexion()->prepare("SELECT * FROM {$this->tabla} WHERE nombre = ?");
        $stmt->execute([$nombre]);

        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }

    public function obtenerPorId($id)
    {
        $stmt = $this->conexion()->prepare("SELECT * FROM {$this->tabla} WHERE id = ?");
        $stmt->execute([$id]);

        $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $fila;
    }
}

?>