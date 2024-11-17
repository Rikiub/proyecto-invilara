<?php

require_once "librerias/dompdf/autoload.inc.php";
use Dompdf\Dompdf;

require_once "modelo/solicitud.php";
$modelo = new Solicitud();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Setters
    $modelo->set_id($_POST["id"]);

    if ($modelo->esGeneral()) {
        $modelo->set_cedula_solicitante($_POST['cedula_solicitante']);
    } elseif ($modelo->esInstitucional()) {
        $modelo->set_id_institucion($_POST['id_institucion']);
    }

    $modelo->set_id_gerencia($_POST['id_gerencia']);
    $modelo->set_id_comunidad($_POST['id_comunidad']);
    $modelo->set_fecha($_POST['fecha']);

    // Iniciar creacion
    $dompdf = new Dompdf();

    // Generar HTML
    $datos = $modelo->consultarFiltrado();

    ob_start();
    require_once "vista/componentes/encabezado_dompdf.php";
    require_once "vista/componentes/tabla_solicitud.php";
    $html = ob_get_clean();

    // Generar PDF
    $dompdf->loadHtml($html);
    $dompdf->setPaper("A4", "landscape");
    $dompdf->render();
    $dompdf->stream("reporte_invilara.pdf", array("Attachment" => 0));
} else {
    require_once "vista/reporte.php";
}

?>